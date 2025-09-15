<?php

namespace App\Services\Admin;

use App\Models\Patient;
use App\Models\User;
use App\Models\MedicalRecord;
use App\Models\BloodInv;
use App\Models\Appointment;
use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class PatientService
{
    /**
     * Get all patients with eager loading
     */
    public function getAllPatients($perPage = 15)
    {
        return Patient::with(['user'])
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

    /**
     * Get patient by ID with all related data
     */
    public function getPatientById($id)
    {
        return Patient::with(['user'])
            ->findOrFail($id);
    }

    /**
     * Get comprehensive patient report data
     */
    public function getPatientFullReport($id)
    {
        $patient = Patient::with(['user'])->findOrFail($id);
        
        // Get medical records with doctor information
        $medicalRecords = MedicalRecord::with(['user'])
            ->where('patient_id', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        // Get blood investigations with doctor information
        $bloodInvestigations = BloodInv::with(['user'])
            ->where('patient_id', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        // Get appointments if table exists
        $appointments = collect();
        if (Schema::hasColumn('appointments', 'patient_id')) {
            $appointments = Appointment::with(['user'])
                ->where('patient_id', $id)
                ->orderBy('created_at', 'desc')
                ->get();
        }

        // Get data collection responses
        $dataCollectionResponses = Answer::with(['question', 'question.section'])
            ->where('patient_id', $id)
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy('question.section.name');

        // Calculate statistics
        $statistics = $this->calculatePatientStatistics($id, $medicalRecords, $bloodInvestigations, $appointments);

        return [
            'patient' => $patient,
            'medical_records' => $medicalRecords,
            'blood_investigations' => $bloodInvestigations,
            'appointments' => $appointments,
            'data_collection_responses' => $dataCollectionResponses,
            'statistics' => $statistics,
            'xrays' => collect(), // Empty collections for lookup tables
            'ultrasounds' => collect(),
            'ctscans' => collect(),
        ];
    }

    /**
     * Search patients
     */
    public function searchPatients($query, $perPage = 15)
    {
        return Patient::with(['user'])
            ->where('name', 'like', "%{$query}%")
            ->orWhere('phone', 'like', "%{$query}%")
            ->orWhere('email', 'like', "%{$query}%")
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

    /**
     * Get patient statistics
     */
    public function getPatientStatistics()
    {
        return [
            'total_patients' => Patient::count(),
            'recent_patients' => Patient::where('created_at', '>=', now()->subDays(7))->count(),
            'male_patients' => Patient::where('sex', 'male')->count(),
            'female_patients' => Patient::where('sex', 'female')->count(),
            'active_patients' => Patient::where('patient_status', '1')->count(),
            'inactive_patients' => Patient::where('patient_status', '0')->count(),
        ];
    }

    /**
     * Calculate patient statistics
     */
    private function calculatePatientStatistics($patientId, $medicalRecords, $bloodInvestigations, $appointments)
    {
        return [
            'total_visits' => $medicalRecords->count(),
            'total_blood_tests' => $bloodInvestigations->count(),
            'total_appointments' => $appointments->count(),
            'last_visit' => $medicalRecords->first()?->created_at,
            'first_visit' => $medicalRecords->last()?->created_at,
        ];
    }

    /**
     * Get patients by doctor
     */
    public function getPatientsByDoctor($doctorId, $perPage = 15)
    {
        return Patient::with(['user'])
            ->whereHas('medicalRecords', function ($query) use ($doctorId) {
                $query->where('user_id', $doctorId);
            })
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

    /**
     * Get recent patients
     */
    public function getRecentPatients($limit = 10)
    {
        return Patient::with(['user'])
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
    }

    /**
     * Delete a patient
     */
    public function deletePatient($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();
        
        Log::info('Patient deleted successfully', ['patient_id' => $id]);
        return true;
    }

    /**
     * Delete all patients
     */
    public function deleteAllPatients()
    {
        Patient::query()->delete();
        
        Log::info('All patients deleted successfully');
        return true;
    }
}
