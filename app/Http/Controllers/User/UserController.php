<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Round;
use App\Models\Role;

class UserController extends Controller
{
    public function index(){

        $doctorRounds = Round::where('doctor_status' , '1')->count();
        $nurseRounds = Round::where('nursing_status' , '0')->count();
        $roles = Role::all();
        $round = Round::where('doctor_status', '1')->orderBy('token', 'asc')->first();
        return view('user.dashboard.dashboard', get_defined_vars());
    }
}
