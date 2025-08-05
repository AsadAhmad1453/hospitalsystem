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
use App\Services\AnswerSubmissionService;


class DataCollectorController extends Controller
{
    public function patients($id){
        $rounds = Round::where('nursing_status' , '0')->where('round_status', '1')->with('patient')->get();
        $form = Form::where('id', $id)->first();
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

    public function submitAnswers(Request $request, $form_id,AnswerSubmissionService $answerService)
    {
        $answerService->submit($request, $form_id);

        return redirect()->route('patients-data-table', $form_id);
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
