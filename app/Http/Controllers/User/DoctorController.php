<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Round;
use App\Models\Patient;
use App\Models\MedicalRecord;


class DoctorController extends Controller
{
    public function index()
    {
        $rounds = Round::where('doctor_status' , '1')->with('patient')->get();
        return view('user.doctor.doctor-form', compact('rounds'));
    }

    public function addDoctor($id)
    {
        $patient = Patient::with(['medicalRecords' => function($query) {
            $query->orderBy('created_at', 'desc');
        }])->findOrFail($id);
        $medicalRecord = $patient->medicalRecords->first();
        return view('user.doctor.doctor-add',compact('patient', 'medicalRecord'));
    }

    public function savedoctorreports(Request $request)
    {
        
        $request->validate([
            'final_diagnosis' => 'required|string|max:255',
            'recommended_medication' => 'required|string|max:255',
            'further_investigation' => 'required|string|max:255',
            'reports' => 'nullable'
        ]);

        $filePath = null;
        if ($request->hasFile('reports')) {
            $file = $request->file('reports');
            $filePath = $file->store('uploads/reports', 'public'); // returns path like uploads/reports/filename.ext
        }
        
        // Update or create the medical record for the patient
        $patient = MedicalRecord::where('patient_id', $request->patient_id)->orderBy('created_at', 'desc')->first();
        $patient->update([
            'final_diagnosis' => $request->final_diagnosis,
            'recommended_medication' => $request->recommended_medication,
            'further_investigation' => $request->further_investigation,
            'report_file' => $filePath,
        ]);
        
        Patient::where('id', $request->patient_id)->update([
            'patient_status' => '0',
        ]);
        $round = Round::where('patient_id', $request->patient_id)->delete();

        return redirect()->route('doctor-form')->with('success', 'Doctor report saved successfully.');
    }
}
