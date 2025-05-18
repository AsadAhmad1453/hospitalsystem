<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;

class PatientController extends Controller
{
    public function index(){
        $roles = Role::with('permissions')->get();
        $users = User::with('roles')->get();
        return view('admin.patients.patients', get_defined_vars());
    }
}
