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
        $rounds = Round::where('nursing_status', '1')->where('doctor_status', '0')->where('round_status', '1')->with('patient')->get();
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
            'pulse' => 'required',
            'systolic_blood_pressure' => 'required',
            'diastolic_blood_pressure' => 'required',
            'temperature' => 'required',
            'weather' => 'required',
            'reports' => 'required|file|max:2048',
        ]);

        $filePath = null;
        $originalFilename = null;
        if ($request->hasFile('reports')) {
            $file = $request->file('reports');
            $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        
            // Define destination path in the public folder
            $destinationPath = public_path('uploads/reports');
        
            // Create the folder if it doesn't exist
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
        
            // Move the file to the public/uploads/reports directory
            $file->move($destinationPath, $originalFilename);
        
            // If you want to store the relative path (e.g., in DB)
            $filePath = 'uploads/reports/' . $originalFilename;
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
            'original_filename' => $originalFilename,
            'final_diagnosis' => null,
            'recommended_medication' => null,
            'further_investigation' => null,
        ]);

        Round::where('patient_id', $request->patient_id)->where('round_status', '1')->update([
            'nursing_status' => '1',
            'doctor_status' => '1',
        ]);

        return redirect()->route('biomarker')->with(['success', 'Test report saved successfully.']);
    }
}
