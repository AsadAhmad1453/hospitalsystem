<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Section;
use App\Models\Option;
use App\Models\Form;

class QuestionsController extends Controller
{
    public function index()
    {
        $sections = Section::all();
        return view('admin.questions.sections', get_defined_vars());
    }



    public function saveSection(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            Section::create([
                'name' => $request->name,
            ]);

            return redirect()->back()->with('success', 'Section created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create section. Please try again.');
        }
    }


    public function deleteSection($id)
    {
        $section = Section::findOrFail($id);
        $section->delete();

        return redirect()->back()->with('success', 'Section deleted successfully.');
    }

    public function question()
    {
        $sections = Section::all();
        $questions = Question::with('section')->orderBy('position')->get();
        return view('admin.questions.questions', get_defined_vars());
    }

    public function addQuestion()
    {
        $sections = Section::all();
        $questions = Question::with('options')->get();
        $forms = Form::all();

        return view('admin.questions.question-add', get_defined_vars());
    }

    public function saveQuestion(Request $request)
    {
        $request->validate([
            'section_id' => 'required',
            'question' => 'required|string|max:1000',
            'question_type' => 'required|integer',
            'form_id' => 'required|exists:forms,id',
        ]);

        if($request->question_type == 0 || $request->question_type == 1) {

            $request->validate([
                'options' => 'required|array|min:2',
            ]);
        }
        $maxPosition = Question::max('position') ?? 0;
        $question = Question::create([
            'section_id' => $request->section_id,
            'question' => $request->question,
            'question_type' => $request->question_type,
            'form_id' => $request->form_id,
            'priority' => $request->priority,
            'position' => $maxPosition + 1,
        ]);
        if($request->question_type == 0 || $request->question_type == 1) {

            foreach ($request->options as $option) {
                Option::create([
                    'question_id' => $question->id,
                    'option' => $option,
                ]);
            }
        }

        return redirect()->route('questions')->with('success', 'Question saved successfully.');
    }

    public function deleteQuestion($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return redirect()->back()->with('success', 'Question deleted successfully.');
    }

    public function delAllQuestions()
    {
        try {
            \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            // Dependency::truncate();
            Option::truncate();
            Question::truncate();
            \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            return redirect()->back()->with('success', 'All questions deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete all questions: ' . $e->getMessage());
        }
    }

    public function updateQuestionOrder(Request $request)
    {
        try {
            foreach ($request->order as $item) {
                Question::where('id', $item['id'])->update(['position' => $item['position']]);
            }
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }
}
