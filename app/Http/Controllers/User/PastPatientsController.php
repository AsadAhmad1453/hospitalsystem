<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;

class PastPatientsController extends Controller
{
    public function index()
    {
        $patients = Patient::where('patient_status', '0')->get(); // Assuming 'status' is a field that indicates past patients
        return view('user.past-patients.past-patients', get_defined_vars());
    }
}
