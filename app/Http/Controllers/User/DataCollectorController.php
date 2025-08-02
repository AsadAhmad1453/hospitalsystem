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
        // Check if the form has any questions
        $questionsCount = Question::where('form_id', $id)->count();

        if ($questionsCount === 0) {
            // Optionally, you can redirect back or show an error message
            return redirect()->back()->with('error', 'This form does not have any questions.');
        }

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

        // Check if patient has submitted all forms that have at least one question
        // Get all unique form_ids that have at least one question (from questions table)
        $formIdsWithQuestions = \App\Models\Question::distinct()->pluck('form_id')->filter()->toArray();

        // Get all form_ids for which this patient has submitted answers
        $answeredFormIds = Answer::where('patient_id', $request->patient_id)
            ->whereIn('form_id', $formIdsWithQuestions)
            ->distinct()
            ->pluck('form_id')
            ->filter()
            ->toArray();

        $hasSubmittedAllForms = empty(array_diff($formIdsWithQuestions, $answeredFormIds));

        if ($hasSubmittedAllForms) {
            // Patient has submitted all forms with questions, set nursing_status to 1
            Round::where('patient_id', $request->patient_id)
                ->where('round_status', '1')
                ->update([
                    'nursing_status' => '1',
                ]);
        }

        return redirect()->route('patients-data-table', $request->patient_id);
    }
    public function uploadVoice(Request $request)
    {
        if ($request->hasFile('voice_recording')) {
            $file = $request->file('voice_recording');
            $path = $file->store('voice_recordings', 'public');
            return response()->json(['path' => $path]);
        }

        return response()->json(['error' => 'No audio file received'], 400);
    }
}
