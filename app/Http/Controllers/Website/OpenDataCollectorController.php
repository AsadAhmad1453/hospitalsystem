<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePatientRequest;
use App\Models\Question;
use App\Models\Dependency;
use App\Models\Form;
use App\Models\OpenPatient;
use App\Models\OpenAnswer;
use App\Models\User;
use App\Services\AnswerSubmissionService;

use Illuminate\Http\Request;

class OpenDataCollectorController extends Controller
{
    public function dataCollectorForms($patient_id)
    {
        $forms = Form::whereHas('questions')->get();
        $patient_id;
        return view('website.data-collector.forms', get_defined_vars());
    }

    public function showCollectorForm($form_id, $patient_id)
    {
        // Check if the form has any questions
        $questionsCount = Question::where('form_id', $form_id)->count();
        
        if ($questionsCount === 0) {
            
            return redirect()->back()->with('error', 'This form does not have any questions.');
        }

        $questions = Question::where('form_id', $form_id)->with(['options', 'section'])->orderBy('position')->get();
        $dependencies = Dependency::all();
        $sections = $questions
            ->pluck('section')
            ->filter()
            ->unique('id')
            ->values();

        $patient_id;
        // Pass to view
        return view('website.data-collector.data-collector', get_defined_vars());
    }

    public function submitAnswers(Request $request, $form_id, AnswerSubmissionService $answerService)
    {
        $answerService->openSubmit($request, $form_id);

        // Get all form IDs that have at least one question
        $formIdsWithQuestions = Question::distinct()->pluck('form_id')->filter()->toArray();

        // Get all form IDs this patient has answered (in open_answers)
        $answeredFormIds = OpenAnswer::where('patient_id', $request->patient_id)
            ->whereIn('form_id', $formIdsWithQuestions)
            ->distinct()
            ->pluck('form_id')
            ->filter()
            ->toArray();

        // If the patient has filled all forms with questions, redirect to open-patients
        $hasSubmittedAllForms = empty(array_diff($formIdsWithQuestions, $answeredFormIds));
        if ($hasSubmittedAllForms) {
            return redirect()->route('open-patients');
        }

        return redirect()->route('dc-forms', $request->patient_id);
    }

    public function addPatient()
    {   
        return view('website.data-collector.patient-info', get_defined_vars());
    }

    public function savePatient(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:open_patients,email',
            'phone' => 'required|string|max:20',
            'age' => 'required|string|max:20',
            'sex' => 'required|string|max:20',
            'city' => 'required|string|max:50',
            'address' => 'required|string|max:255',
            'dateofbirth' => 'required|date|before_or_equal:today',
            'cnic' => 'required|string|max:20|unique:open_patients,cnic',
            'unique_number' => 'required|string|max:255|unique:open_patients,unique_number',
        ]);
        $patient = OpenPatient::create($validatedData);
        return redirect()->route('dc-forms', $patient->id);
    }
}
