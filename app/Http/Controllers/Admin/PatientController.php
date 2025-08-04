<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Patient;

class PatientController extends Controller
{
    public function index(){
        $patients = Patient::all();
        return view('admin.patients.patients', get_defined_vars());
    }

    public function patientInfo($id){
        $patient = Patient::findOrFail($id)->with('medicalRecords')->first();
        return view('admin.patients.patient-info', get_defined_vars());
    }

    public function delPatient($id){
        $patient = Patient::findOrFail($id);
        $patient->delete();
        return redirect()->back()->with('success', 'Patient deleted successfully');
    }

    public function delALL(){
        Patient::query()->delete();
        return redirect()->back()->with('success', 'All patients deleted successfully');
    }
}
