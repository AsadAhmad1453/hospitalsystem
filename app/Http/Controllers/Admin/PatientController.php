<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\PatientService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PatientController extends Controller
{
    protected $patientService;

    public function __construct(PatientService $patientService)
    {
        $this->patientService = $patientService;
    }

    /**
     * Display patients listing (old admin panel)
     */
    public function index()
    {
        $patients = $this->patientService->getAllPatients();
        return view('admin.patients.patients', compact('patients'));
    }

    /**
     * Show patient info (old admin panel)
     */
    public function patientInfo($id)
    {
        $patient = $this->patientService->getPatientById($id);
        return view('admin.patients.patient-info', compact('patient'));
    }

    /**
     * Delete patient (old admin panel)
     */
    public function delPatient($id)
    {
        try {
            $this->patientService->deletePatient($id);
            return redirect()->back()->with('success', 'Patient deleted successfully');
        } catch (\Exception $e) {
            Log::error('Error deleting patient: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error deleting patient');
        }
    }

    /**
     * Delete all patients (old admin panel)
     */
    public function delALL()
    {
        try {
            $this->patientService->deleteAllPatients();
            return redirect()->back()->with('success', 'All patients deleted successfully');
        } catch (\Exception $e) {
            Log::error('Error deleting all patients: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error deleting all patients');
        }
    }

    /**
     * Display patients listing (new admin panel)
     */
    public function indexNew()
    {
        $patients = $this->patientService->getAllPatients();
        $doctors = User::role('doctors')->get();
        
        return view('admin-new.patients.patients', compact('patients', 'doctors'));
    }

    /**
     * Show patient info (new admin panel)
     */
    public function patientInfoNew($id)
    {
        $patient = $this->patientService->getPatientById($id);
        $medicalRecords = $patient->medicalRecords ?? collect();
        
        return view('admin-new.patients.patient-info', compact('patient', 'medicalRecords'));
    }

    /**
     * Delete patient (new admin panel)
     */
    public function delPatientNew($id)
    {
        try {
            $this->patientService->deletePatient($id);
            return response()->json([
                'success' => true, 
                'message' => 'Patient deleted successfully'
            ]);
        } catch (\Exception $e) {
            Log::error('Error deleting patient: ' . $e->getMessage());
            return response()->json([
                'success' => false, 
                'message' => 'Error deleting patient'
            ]);
        }
    }

    /**
     * Delete all patients (new admin panel)
     */
    public function delAllNew()
    {
        try {
            $this->patientService->deleteAllPatients();
            return response()->json([
                'success' => true, 
                'message' => 'All patients deleted successfully'
            ]);
        } catch (\Exception $e) {
            Log::error('Error deleting all patients: ' . $e->getMessage());
            return response()->json([
                'success' => false, 
                'message' => 'Error deleting all patients'
            ]);
        }
    }

    /**
     * Show patient full report (new admin panel)
     */
    public function patientFullReport($id)
    {
        try {
            $reportData = $this->patientService->getPatientFullReport($id);
            
            return view('admin-new.patients.patient-full-report', $reportData);
        } catch (\Exception $e) {
            Log::error('Patient Full Report Error: ' . $e->getMessage());
            return back()->withErrors([
                'message' => 'Error loading patient report: ' . $e->getMessage()
            ]);
        }
    }
}