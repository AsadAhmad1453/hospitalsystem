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
}
