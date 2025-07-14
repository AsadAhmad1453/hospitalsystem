<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modesls\BioMarker;
use App\Models\Patient;
use App\Models\Round;
use App\Models\MedicalRecord;

class BioMarkerController extends Controller
{
    public function index()
    {
        $rounds = Round::where('nursing_status', '0')->with('patient')->get();
        return view('user.biomarker.biomarker',compact('rounds'));
    }

    public function addBiomarker($id)
    {
        $patient = Patient::findOrFail($id);
       return view('user.biomarker.add-biomarkers',compact('patient'));
    }

    public function editBiomarker($id)
    {
        $biomarker = BioMarker::findOrFail($id);
        return view('user.biomarker.edit', compact('biomarker'));
    }

    public function viewPatient($id)
    {
        $patient = Patient::where('id', $id)
        ->with(['medicalRecords' => function($query) {
            $query->orderBy('created_at', 'desc');
        }])
        ->first();
        return view('user.patient.view-patient', compact('patient'));
    }

    public function savetestreports(Request $request)
    {

        $request->validate([
            'weight' => 'required',
            'height' => 'required',
        ]);

        $filePath = null;
        if ($request->hasFile('reports')) {
            $file = $request->file('reports');
            $filePath = $file->store('uploads/reports', 'public'); // returns path like uploads/reports/filename.ext
        }
        MedicalRecord::create([
            'patient_id' => $request->patient_id,
            'weight' => $request->weight,
            'height' => $request->height,
            'pulse' => $request->pulse,
            'systolic_blood_pressure' => $request->systolic_blood_pressure,
            'diasystolic_blood_pressure' => $request->diastolic_blood_pressure,
            'temperature' => $request->temperature,
            'weather' => $request->weather,
            'report_file' => $filePath,
            'final_diagnosis' => null,
            'recommended_medication' => null,
            'further_investigation' => null,
        ]);
        $round = Round::where('patient_id', $request->patient_id)->where('round_status', '1')->first();
        $round->update([
            'nursing_status' => '1',
            'doctor_status' => '1',
        ]);


        return redirect()->route('biomarker')->with(['success', 'Test report saved successfully.']);
    }
}
