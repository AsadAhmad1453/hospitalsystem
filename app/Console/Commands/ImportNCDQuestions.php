<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\Form;
use App\Models\Section;
use App\Models\Question;
use App\Models\Option;
use App\Models\Dependency;
use Illuminate\Support\Facades\DB;

class ImportNCDQuestions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:ncd-questions {--section= : Process specific section only} {--skip-confirm : Skip confirmation for each section}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import questions from NCD Phase 2 Codebook.xlsx';

    protected $form;
    protected $questionKeyMap = []; // Maps question keys to question IDs
    protected $currentSectionIndex = 0;
    protected $sections = [];
    protected $pendingDependencies = []; // Store dependencies to process later

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $filePath = public_path('NCD Phase 2 Codebook.xlsx');
        
        if (!file_exists($filePath)) {
            $this->error("File not found: {$filePath}");
            return 1;
        }

        // Find or get the form
        $this->form = Form::where('name', 'Data Collector')->first();
        
        if (!$this->form) {
            $this->error("Form 'Data Collector' not found in database!");
            return 1;
        }

        $this->info("Found form: {$this->form->name} (ID: {$this->form->id})");

        try {
            // Load the spreadsheet
            $spreadsheet = IOFactory::load($filePath);
            $sheetNames = $spreadsheet->getSheetNames();
            
            $this->info("Found " . count($sheetNames) . " sheets (sections) in the file.");
            
            // Process each sheet
            foreach ($sheetNames as $index => $sheetName) {
                $this->sections[] = $sheetName;
                
                // Check if we should process this section
                if ($this->option('section') && $this->option('section') != $sheetName) {
                    continue;
                }

                $this->currentSectionIndex = $index;
                
                // Ask for confirmation unless --skip-confirm is used
                if (!$this->option('skip-confirm')) {
                    if (!$this->confirm("Process section: '{$sheetName}'? (Yes/No)", true)) {
                        $this->info("Skipping section: {$sheetName}");
                        continue;
                    }
                }

                $this->processSection($spreadsheet, $sheetName, $index);
            }

            $this->info("\n✅ Import completed successfully!");
            return 0;

        } catch (\Exception $e) {
            $this->error("Error: " . $e->getMessage());
            $this->error("Stack trace: " . $e->getTraceAsString());
            return 1;
        }
    }

    protected function processSection($spreadsheet, $sheetName, $sectionIndex)
    {
        $this->info("\n📋 Processing Section: {$sheetName}");
        
        // Get or create section
        $section = Section::firstOrCreate(['name' => $sheetName]);
        $this->info("Section ID: {$section->id}");

        // Load the worksheet
        $worksheet = $spreadsheet->setActiveSheetIndex($sectionIndex);
        $highestRow = $worksheet->getHighestRow();
        $highestColumn = $worksheet->getHighestColumn();
        
        $this->info("Total rows: {$highestRow}");

        // Find header row (assuming first row is headers)
        $headers = [];
        $headerRow = 1;
        
        for ($col = 'A'; $col <= $highestColumn; $col++) {
            $cellValue = $worksheet->getCell($col . $headerRow)->getValue();
            $headers[$col] = strtolower(trim($cellValue ?? ''));
        }

        $this->info("Headers found: " . implode(', ', array_filter($headers)));

        // Find column indices
        $keyCol = $this->findColumn($headers, ['key', 'question key', 'qkey']);
        $questionCol = $this->findColumn($headers, ['question', 'questions', 'question text']);
        $responseCol = $this->findColumn($headers, ['response', 'responses', 'response type', 'type']);
        $multipleCol = $this->findColumn($headers, ['multiple', 'multiple selection', 'multi select', 'multiple select']);
        $skipLogicCol = $this->findColumn($headers, ['skip logic', 'skiplogic', 'skip', 'logic']);
        $optionsCol = $this->findColumn($headers, ['options', 'option', 'choices', 'values']);

        if (!$keyCol || !$questionCol) {
            $this->error("Required columns (Key, Question) not found in section: {$sheetName}");
            return;
        }

        $this->info("Key column: {$keyCol}, Question column: {$questionCol}");
        if ($responseCol) $this->info("Response column: {$responseCol}");
        if ($multipleCol) $this->info("Multiple selection column: {$multipleCol}");
        if ($skipLogicCol) $this->info("Skip logic column: {$skipLogicCol}");

        $startRow = 2; // Start from row 2 (assuming row 1 is headers)
        $questionsProcessed = 0;
        $skippedCount = 0;
        $sectionPendingDeps = []; // Dependencies for this section

        // For first section, skip first 3 questions and start from "House No"
        if ($sectionIndex === 0) {
            $this->info("First section detected - will skip first 3 questions and start from 'House No'");
            $foundHouseNo = false;
            
            for ($row = $startRow; $row <= $highestRow; $row++) {
                $keyValue = trim($worksheet->getCell($keyCol . $row)->getValue() ?? '');
                $questionValue = trim($worksheet->getCell($questionCol . $row)->getValue() ?? '');
                
                // Skip first 3 non-empty rows
                if ($skippedCount < 3 && !empty($keyValue)) {
                    $skippedCount++;
                    $this->info("Skipping row {$row}: {$keyValue}");
                    continue;
                }
                
                // Look for "House No" in question or key
                if (!$foundHouseNo && (stripos($questionValue, 'House No') !== false || stripos($keyValue, 'House No') !== false || stripos($keyValue, 'houseno') !== false)) {
                    $foundHouseNo = true;
                    $startRow = $row;
                    $this->info("Found 'House No' at row {$row} - starting from here");
                    break;
                }
            }
        }

        // Process questions
        for ($row = $startRow; $row <= $highestRow; $row++) {
            $keyValue = trim($worksheet->getCell($keyCol . $row)->getValue() ?? '');
            $questionValue = trim($worksheet->getCell($questionCol . $row)->getValue() ?? '');
            
            // Skip empty rows
            if (empty($keyValue) && empty($questionValue)) {
                continue;
            }

            // Skip if no question text
            if (empty($questionValue)) {
                $this->warn("Row {$row}: Key '{$keyValue}' has no question text - skipping");
                continue;
            }

            // Get response type
            $responseType = $responseCol ? trim($worksheet->getCell($responseCol . $row)->getValue() ?? '') : '';
            $multipleSelection = $multipleCol ? strtoupper(trim($worksheet->getCell($multipleCol . $row)->getValue() ?? '')) : 'N';
            $skipLogic = $skipLogicCol ? trim($worksheet->getCell($skipLogicCol . $row)->getValue() ?? '') : '';
            $optionsText = $optionsCol ? trim($worksheet->getCell($optionsCol . $row)->getValue() ?? '') : '';

            // Determine question type
            $questionType = $this->determineQuestionType($responseType, $multipleSelection, $optionsText);

            // Create question
            $position = Question::where('form_id', $this->form->id)->max('position') ?? 0;
            $position++;

            $question = Question::create([
                'question' => $questionValue,
                'section_id' => $section->id,
                'form_id' => $this->form->id,
                'question_type' => $questionType,
                'position' => $position,
                'priority' => '0', // Default to optional, can be updated later
            ]);

            // Store mapping
            if (!empty($keyValue)) {
                $this->questionKeyMap[$keyValue] = $question->id;
            }

            $this->info("  ✓ Created question [{$keyValue}]: {$questionValue} (Type: {$questionType})");

            // Create options if needed
            if ($questionType == '0' || $questionType == '1') {
                // Get options from options column, or from response column if options column is empty
                $optionsToParse = !empty($optionsText) ? $optionsText : $responseType;
                $options = $this->parseOptions($optionsToParse, $responseType);
                
                if (empty($options)) {
                    $this->warn("    ⚠ Question type is select but no options found - converting to text input");
                    $question->update(['question_type' => '2']);
                } else {
                    foreach ($options as $optionIndex => $optionText) {
                        $option = Option::create([
                            'question_id' => $question->id,
                            'option' => trim($optionText),
                        ]);

                        // Store skip logic to process later (after all questions are created)
                        // Skip logic might be per option or per question - we'll associate it with each option
                        if (!empty($skipLogic)) {
                            $sectionPendingDeps[] = [
                                'question_id' => $question->id,
                                'option_id' => $option->id,
                                'skip_logic' => $skipLogic,
                                'current_key' => $keyValue,
                            ];
                        }
                    }
                    
                    $this->info("    → Created " . count($options) . " options");
                }
            }

            $questionsProcessed++;
        }

        // Process dependencies now that all questions in section are created
        $this->info("\nProcessing dependencies for section '{$sheetName}'...");
        $depsCreated = 0;
        foreach ($sectionPendingDeps as $dep) {
            $created = $this->parseSkipLogic($dep['question_id'], $dep['option_id'], $dep['skip_logic'], $dep['current_key']);
            if ($created > 0) {
                $depsCreated += $created;
            }
        }
        $this->info("Created {$depsCreated} dependencies");

        // Link section to form if not already linked
        if (!$this->form->sections()->where('section_id', $section->id)->exists()) {
            $sortOrder = $this->form->sections()->max('sort_order') ?? 0;
            $this->form->sections()->attach($section->id, ['sort_order' => $sortOrder + 1]);
        }

        $this->info("\n✅ Section '{$sheetName}' completed: {$questionsProcessed} questions processed, {$depsCreated} dependencies created");
    }

    protected function findColumn($headers, $searchTerms)
    {
        foreach ($headers as $col => $header) {
            foreach ($searchTerms as $term) {
                if (stripos($header, $term) !== false) {
                    return $col;
                }
            }
        }
        return null;
    }

    protected function determineQuestionType($responseType, $multipleSelection, $optionsText)
    {
        $responseType = strtolower(trim($responseType));
        
        // If response type is text, date, or number
        if (stripos($responseType, 'text') !== false) {
            return '2'; // Text Input
        }
        
        if (stripos($responseType, 'date') !== false) {
            return '3'; // Date Input
        }
        
        if (stripos($responseType, 'number') !== false || stripos($responseType, 'numeric') !== false) {
            return '2'; // Text Input (for number, we'll use text type)
        }
        
        // If there are options or response type suggests options
        if (!empty($optionsText) || stripos($responseType, 'select') !== false || stripos($responseType, 'choice') !== false) {
            return $multipleSelection === 'Y' ? '1' : '0'; // Multiple Select : Single Select
        }
        
        // Default to single select if unclear
        return '0';
    }

    protected function parseOptions($optionsText, $responseType)
    {
        if (empty($optionsText)) {
            return [];
        }

        // Try different delimiters
        $delimiters = ['|', ',', ';', "\n", "\r\n"];
        
        foreach ($delimiters as $delimiter) {
            if (strpos($optionsText, $delimiter) !== false) {
                $options = explode($delimiter, $optionsText);
                return array_filter(array_map('trim', $options));
            }
        }
        
        // If no delimiter found, return as single option
        return [trim($optionsText)];
    }

    protected function parseSkipLogic($questionId, $optionId, $skipLogic, $currentKey)
    {
        // Skip logic format might be like: "if option=X then jump to KEY_Y"
        // Or: "KEY_Y" (meaning jump to this key when this option is selected)
        // Or: "option1->KEY_Y, option2->KEY_Z"
        // Or: "Q1" or "HOUSENO" etc.
        
        $created = 0;
        $targetKeys = [];
        
        // Try different parsing strategies
        
        // Strategy 1: Look for direct key references (most common)
        // Extract keys (assuming keys are in format like "Q1", "Q2", "HOUSENO", etc.)
        preg_match_all('/\b([A-Z0-9_]+)\b/i', $skipLogic, $matches);
        
        if (!empty($matches[1])) {
            foreach ($matches[1] as $potentialKey) {
                $upperKey = strtoupper(trim($potentialKey));
                
                // Skip common words and current key
                $skipWords = ['IF', 'THEN', 'JUMP', 'TO', 'SELECTED', 'OPTION', 'AND', 'OR', 'YES', 'NO', 'GO', 'SKIP', 'NEXT'];
                if (in_array($upperKey, $skipWords) || $upperKey === strtoupper($currentKey)) {
                    continue;
                }
                
                // Check if it looks like a question key (alphanumeric, might have underscores)
                if (preg_match('/^[A-Z0-9_]+$/i', $potentialKey) && strlen($potentialKey) > 0) {
                    $targetKeys[] = $potentialKey;
                }
            }
        }
        
        // Strategy 2: Look for patterns like "->KEY" or "KEY<-"
        preg_match_all('/(?:->|<-|=>|<=)\s*([A-Z0-9_]+)/i', $skipLogic, $arrowMatches);
        if (!empty($arrowMatches[1])) {
            foreach ($arrowMatches[1] as $key) {
                $targetKeys[] = trim($key);
            }
        }
        
        // Remove duplicates
        $targetKeys = array_unique($targetKeys);
        
        // Create dependencies for found target keys
        foreach ($targetKeys as $targetKey) {
            // Try exact match first
            if (isset($this->questionKeyMap[$targetKey])) {
                Dependency::create([
                    'question_id' => $questionId,
                    'option_id' => $optionId,
                    'dependent_question_id' => $this->questionKeyMap[$targetKey],
                ]);
                $created++;
                $this->info("    → Created dependency: Option triggers question key '{$targetKey}'");
            } else {
                // Try case-insensitive match
                $found = false;
                foreach ($this->questionKeyMap as $key => $qid) {
                    if (strcasecmp($key, $targetKey) === 0) {
                        Dependency::create([
                            'question_id' => $questionId,
                            'option_id' => $optionId,
                            'dependent_question_id' => $qid,
                        ]);
                        $created++;
                        $found = true;
                        $this->info("    → Created dependency: Option triggers question key '{$key}' (matched '{$targetKey}')");
                        break;
                    }
                }
                
                if (!$found) {
                    $this->warn("    ⚠ Dependency target '{$targetKey}' not found in question keys");
                }
            }
        }
        
        return $created;
    }
}
