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
use App\Models\BloodInv;
use App\Models\Xray;
use App\Models\Ultrasound;
use App\Models\Ctscan;
use App\Models\Service;
use App\Models\AppointmentService;
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
            'complaint' => 'required|string',
            'symptoms' => 'required|string',
            'blood_pressure' => 'required|string',
            'provisional_diagnosis' => 'required|string',
            'final_diagnosis' => 'required|string',
            'recommended_medication' => 'required|string',
            'further_investigation' => 'required|string',
            'special_notes' => 'nullable|string',
            'appointment_services' => 'nullable|array',
            'appointment_services.*' => 'exists:services,id',
        ]);

        $appointment = null;
        if ($request->appointment_date != null) {
            $appointment = Appointment::create([
                'patient_id' => $request->patient_id,
                'appointment_date' => $request->appointment_date,
            ]);
            // Store services in appointment_services table
            if ($appointment && $request->has('appointment_services')) {
                foreach ($request->appointment_services as $service_id) {
                    AppointmentService::create([
                        'appointment_id' => $appointment->id,
                        'service_id' => $service_id,
                    ]);
                }
            }
        }

        // Update or create the medical record for the patient
        $patient = MedicalRecord::where('patient_id', $request->patient_id)->orderBy('created_at', 'desc')->first();
        $patient->update([
            'blood_pressure' => $request->blood_pressure,
            'symptoms' => $request->symptoms,
            'complaint' => $request->complaint,
            'provisional_diagnosis' => $request->provisional_diagnosis,
            'final_diagnosis' => $request->final_diagnosis,
            'recommended_medication' => $request->recommended_medication,
            'further_investigation' => $request->further_investigation,
            'special_notes' => $request->special_notes
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
            // Get all appointments with their patient and services
            $appointments = Appointment::with(['patient', 'services'])
                ->where('status', '0')
                ->get();
        
            // Get all services
            $services = Service::all();
        
            return view('user.patient-entry.appointment-requests', compact('appointments', 'services'));
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
                'name' => "Appointment: {$appointment->patient->name} ({$appointment->service->name})",
                'startDateTime' => Carbon::parse($appointment->appointment_date . ' ' . $appointment->appointment_time),
                'endDateTime' => Carbon::parse($appointment->appointment_date . ' ' . $appointment->appointment_time)->addMinutes(30),
                'description' => "Patient ID: {$appointment->patient_id}\nService: {$appointment->service->name}\nPhone: {$appointment->patient->phone}",
            ]);

            $appointment->update([
                'status' => '1'
            ]);

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
            $blood_tests = BloodInv::all();
            $xrays = Xray::all();
            $ultrasounds = Ultrasound::all();
            $ctscans = Ctscan::all();
            $services = Service::all();
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
            $blood_tests = BloodInv::all();
            $xrays = Xray::all();
            $ultrasounds = Ultrasound::all();
            $ctscans = Ctscan::all();
            $services = Service::all();
            return view('user.examine-patients.examine-patients', get_defined_vars());
        }

}
