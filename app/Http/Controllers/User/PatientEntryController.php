<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePatientRequest;
use App\Models\Patient;
use App\Models\User;
use App\Models\Round;
use Illuminate\Support\Facades\Auth;

class PatientEntryController extends Controller
{
    public function index()
    {
        $patients = Patient::all();
        return view('user.patient-entry.patient-entry', compact('patients'));
    }
    public function addPatient()
    {
        $users = User::where('role_id','6')->get();
        return view('user.patient-entry.add-patient',compact('users'));
    }
    public function savepatient(StorePatientRequest $request)
    {
        $validatedData = $request->validated();
        $patient = Patient::create($validatedData);
        Round::create([
            'patient_id' => $patient->id,
            'visit_number' => 1,
        ]);

        return redirect()->route('patient-entry')->with('success', 'Patient added successfully.');
    }
    public function patientStatusToggle(Request $request)
    {
        $patient = Patient::findOrFail($request->id);
        $patient->patient_status = $request->status; 
        $patient->save();
        if($patient->patient_status == '1') {
            Round::create([
                'patient_id' => $patient->id,
                'visit_number' => 1,
            ]);
        } else {
           $round = Round::where('patient_id', $patient->id)->first();
            if ($round) {
                $round->delete();
            }
        }
       
        return response()->json([
            'success' => true,
            'message' => 'Patient status updated successfully.',
            'patient_status' => $patient->patient_status
        ]);
    }
    public function editPatient($id)
    {
        $patient = Patient::findOrFail($id);
        $users = User::where('role_id','6')->get();
        return view('user.patient-entry.edit-patient', compact('patient', 'users'));
    }
    public function updatePatient(StorePatientRequest $request)
    {
        $patient = Patient::findOrFail($request->id);
        $patient->Name = $request->name;
        $patient->Email = $request->email;
        $patient->Phone = $request->phone;
        $patient->Address = $request->address;
        $patient->DateOfBirth = $request->dateofbirth;
        $patient->user_id = $request->user_id;
        $patient->cnic = $request->cnic;
        $patient->unique_number = $request->unique_number;
        $patient->patient_status = $request->patient_status;
        $patient->save();

        return redirect()->route('patient-entry')->with('success', 'Patient updated successfully.');
    }
    public function viewPatient($id)
    {
        $patient = Patient::findOrFail($id);
        return view('user.patient-entry.view-patient', compact('patient'));
    }
    public function deletePatient($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();
        return redirect()->route('patient-entry')->with('success', 'Patient deleted successfully.');
    }
}
