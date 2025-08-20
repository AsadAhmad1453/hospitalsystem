<?php

namespace App\Services;

use App\Models\Answer;
use App\Models\OpenAnswer;
use App\Models\Option;
use App\Models\Question;
use App\Models\Round;
use Illuminate\Http\Request;

class AnswerSubmissionService
{
    public function submit(Request $request, $form_id)
    {
        Answer::where('patient_id', $request->patient_id)
            ->where('form_id', $form_id)
            ->delete();

        foreach ($request->except(['_token', 'patient_id']) as $questionId => $answer) {
            $question = Question::find($questionId);
            $answerString = '';

            if ($question && in_array($question->question_type, [0, 1])) {
                if (is_array($answer)) {
                    $answerString = Option::whereIn('id', $answer)->pluck('option')->implode(', ');
                } else {
                    $answerString = Option::where('id', $answer)->value('option') ?? '';
                }
            } else {
                $answerString = is_array($answer) ? json_encode($answer) : $answer;
            }

            Answer::updateOrCreate([
                'patient_id' => $request->patient_id,
                'question' => $question ? $question->question : '',
                'form_id' => $form_id,
                'answer' => $answerString,
            ]);
        }

        $this->updateRoundStatusIfNeeded($request->patient_id);
    }

    public function openSubmit(Request $request, $form_id)
    {
        OpenAnswer::where('patient_id', $request->patient_id)
            ->where('form_id', $form_id)
            ->delete();

        foreach ($request->except(['_token', 'patient_id']) as $questionId => $answer) {
            $question = Question::find($questionId);
            $answerString = '';

            if ($question && in_array($question->question_type, [0, 1])) {
                if (is_array($answer)) {
                    $answerString = Option::whereIn('id', $answer)->pluck('option')->implode(', ');
                } else {
                    $answerString = Option::where('id', $answer)->value('option') ?? '';
                }
            } else {
                $answerString = is_array($answer) ? json_encode($answer) : $answer;
            }

            OpenAnswer::updateOrCreate([
                'patient_id' => $request->patient_id,
                'question' => $question ? $question->question : '',
                'form_id' => $form_id,
                'answer' => $answerString,
            ]);
        }
    }

    protected function updateRoundStatusIfNeeded($patientId)
    {
        $formIdsWithQuestions = Question::distinct()->pluck('form_id')->filter()->toArray();
        $answeredFormIds = Answer::where('patient_id', $patientId)
            ->whereIn('form_id', $formIdsWithQuestions)
            ->distinct()
            ->pluck('form_id')
            ->filter()
            ->toArray();

        $hasSubmittedAllForms = empty(array_diff($formIdsWithQuestions, $answeredFormIds));

        if ($hasSubmittedAllForms) {
            Round::where('patient_id', $patientId)
                ->where('round_status', '1')
                ->update(['nursing_status' => '1']);
        }
    }
}
