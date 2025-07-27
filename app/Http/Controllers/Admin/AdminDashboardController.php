<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(){
        $role = Role::where('name','Doctor')->first();
        $patientrole = Role::where('name','Patient')->first();
        $doctorscount = User::where('role_id', $role->id)->count();
        $patientscount = User::where('role_id', $patientrole->id)->count();
        return view('admin.dashboard.dashboard',get_defined_vars());
    }
}
