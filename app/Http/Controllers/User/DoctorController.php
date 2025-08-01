<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Round;
use App\Models\Patient;
use App\Models\MedicalRecord;
use App\Models\Appointment;
use App\Models\Medicine;
use App\Models\Dose;
use Spatie\GoogleCalendar\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class DoctorController extends Controller
{
    public function index()
    {
        $rounds = Round::where('doctor_status', '1')
            ->where('round_status', '1')
            ->whereHas('patient', function ($query) {
                $query->where('doctor_id', Auth::user()->id);
            })
            ->with('patient')
            ->get();
        
        return view('user.doctor.doctor-form', get_defined_vars());
    }

    public function addDoctor($id)
    {
        $patient = Patient::with([
            'medicalRecords' => function($query) {
                $query->orderBy('created_at', 'desc');
            },
            'answers'
        ])->findOrFail($id);
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
        $originalFilename = null;
        if ($request->hasFile('reports')) {
            $file = $request->file('reports');
            $originalFilename = $file->getClientOriginalName(); // Get original filename
            $filePath = $file->store('uploads/reports', 'public'); // returns path like uploads/reports/filename.ext
        }

        // Update or create the medical record for the patient
        $patient = MedicalRecord::where('patient_id', $request->patient_id)->orderBy('created_at', 'desc')->first();
        $patient->update([
            'blood_pressure' => $request->blood_pressure,
            'symptoms' => $request->symptoms,
            'complaint' => $request->complaint,
            'final_diagnosis' => $request->final_diagnosis,
            'recommended_medication' => $request->recommended_medication,
            'further_investigation' => $request->further_investigation,
            'report_file' => $filePath,
            'original_filename' => $originalFilename,
        ]);

        Patient::where('id', $request->patient_id)->update([
            'patient_status' => '0',
        ]);
        $round = Round::where('patient_id', $request->patient_id)->where('round_status', '1')->first();
        $round->update([
            'doctor_status' => '0',
            'round_status' => '0',
        ]);
        return redirect()->route('examine-patients')->with('success', 'Doctor report saved successfully.');
    }

        public function prescription($patient_id)
        {
            $patient = Patient::with('latestMedicalRecord')->findOrFail($patient_id);

            return view('user.doctor.prescription', get_defined_vars());
        }

        public function appos()
        {
            $appointments = Appointment::with('patient')->get();

            return view('user.patient-entry.appointment-requests', get_defined_vars());
        }

        public function reqApp(Request $request, $patient_id)
        {

            Appointment::Create([
                'patient_id' => $patient_id,
                'appointment_date' => $request->appointment_date,
            ]);

            return redirect()->back()->with('success', 'Appointment scheduled successfully.');
        }

        public function updateApp(Request $request, $id)
        {
            $appointment = Appointment::where('id', $id)->first();
            $appointment->update([
                'appointment_date' => $request->appointment_date
            ]);

            return back();
        }


        public function saveApp($patient_id)
        {

            $appointment = Appointment::where('patient_id', (int)$patient_id)->first();
            // dd(storage_path('app/google-calendar/service-account-credentials.json'));
            $appointmentDate = Carbon::createFromFormat('Y-m-d', $appointment->appointment_date);

             $event = Event::create([
                'name' => 'All-Day Appointment',
                'startDate' => $appointmentDate,                 // Pass Carbon instance
                'endDate' => $appointmentDate->copy()->addDay(), // Pass Carbon instance
            ]);

            $appointment->delete();

            return redirect()->route('appointments');
        }

        public function delApp($id)
        {
            Appointment::where('id', $id)->delete();

            return back();
        }

        public function examinePatients()
        {
            $round = Round::where('doctor_status', '1')
                ->where('round_status', '1')
                ->orderBy('token', 'asc')
                ->whereHas('patient', function ($query) {
                    $query->where('doctor_id', Auth::user()->id);
                })
                ->with(['patient' => function ($query) {
                    $query->with([
                        'medicalRecords' => function ($q) {
                            $q->orderBy('created_at', 'desc');
                        },
                        'answers'
                    ]);
                }])
                ->first();
            if (!$round) {
                    return redirect()->route('doctor-form');
                }

            $patient = $round->patient;
            $medicalRecord = $patient?->medicalRecords->first();
            $medicines = Medicine::all();
            $dosage = Dose::all(); 

            return view('user.examine-patients.examine-patients', get_defined_vars());
        }

        public function examinePatient($id)
        {
            $round = Round::where('doctor_status', '1')
                ->where('round_status', '1')
                ->where('patient_id', $id)
                ->orderBy('token', 'asc')
                ->with(['patient' => function ($query) {
                    $query->with([
                        'medicalRecords' => function ($q) {
                            $q->orderBy('created_at', 'desc');
                        },
                        'answers'
                    ]);
                }])
                ->first();
            if (!$round) {
                    return redirect()->route('doctor-form');
                }

            $patient = $round->patient;
            $medicalRecord = $patient?->medicalRecords->first();
            $medicines = Medicine::all();
            $dosage = Dose::all();        

            return view('user.examine-patients.examine-patients', get_defined_vars());
        }

}
