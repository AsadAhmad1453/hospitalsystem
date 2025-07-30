<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Dependency;
use App\Models\Section;
use App\Models\Patient;
use App\Models\Answer;
use App\Models\Option;
use App\Models\Round;
use App\Models\Form;
class DataCollectorController extends Controller
{
    public function patients($id){
        $rounds = Round::where('nursing_status' , '0')->where('round_status', '1')->with('patient')->get();
        $form = Form::where('id', $id)->first();
        
        // Check which patients have already submitted this form
        $submittedPatients = [];
        if ($form) {
            $submittedPatients = Answer::where('form_id', $id)
                ->distinct()
                ->pluck('patient_id')
                ->toArray();
        }
        
        return view('user.data-collector.patients-data-table', get_defined_vars());
    }

    public function showCollectorForm($id, $patientId)
    {
        $patientId = $patientId;
        $questions = Question::where('form_id', $id)->with(['options', 'section'])->orderBy('position')->get();
        $dependencies = Dependency::all();
        $sections = $questions
            ->pluck('section')
            ->filter() 
            ->unique('id')
            ->values();


        // Pass to view
        return view('user.data-collector.data-collector', get_defined_vars());
    }

    public function submitAnswers(Request $request, $form_id)
    {
        // Delete previous answers for this patient and form
        Answer::where('patient_id', $request->patient_id)->where('form_id', $form_id)->delete();

        // Save new answers
        foreach ($request->except(['_token', 'patient_id']) as $questionId => $answer) {
            $question = Question::find($questionId);

            // Default: store as string
            $answerString = '';

            if ($question && in_array($question->question_type, [0, 1])) {
                // Single or multi-select: convert option IDs to text
                if (is_array($answer)) {
                    // Multi-select: array of IDs
                    $optionTexts = Option::whereIn('id', $answer)->pluck('option')->toArray();
                    $answerString = implode(', ', $optionTexts);
                } else {
                    // Single-select: single ID
                    $optionText = Option::where('id', $answer)->value('option');
                    $answerString = $optionText ?? '';
                }
            } else {
                // Text or date: store as is

                $answerString = is_array($answer) ? json_encode($answer) : $answer;
            }


            Answer::updateOrCreate(
                [
                    'patient_id' => $request->patient_id,
                    'question' => $question ? $question->question : '',
                    'form_id' => $form_id,
                    'answer' => $answerString,
                ],
            );
        }

        // Check if patient has submitted all forms
        $allFormIds = Form::pluck('id')->toArray();
        $answeredFormIds = Answer::where('patient_id', $request->patient_id)
            ->distinct()
            ->pluck('form_id')
            ->filter() // remove nulls
            ->toArray();

        $hasSubmittedAllForms = empty(array_diff($allFormIds, $answeredFormIds));

        if ($hasSubmittedAllForms) {
            // Patient has submitted all forms, set nursing_status to 1
            Round::where('patient_id', $request->patient_id)
                ->where('round_status', '1')
                ->update([
                    'nursing_status' => '1',
                ]);
        }

        return redirect()->route('patients-data-table', $request->patient_id);
    }
}
