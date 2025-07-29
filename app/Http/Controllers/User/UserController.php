<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Round;
use App\Models\Patient;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class UserController extends Controller
{

    public function index()
    {
        $userId = Auth::id();
        $userRoleId = Auth::user()->role_id;

        $totalToken = Round::latest()->first();
        
        $doctors = User::role('Doctor')->with('latestActiveRound')->get();

        // Active token for the logged-in doctor
        $activeToken = Round::where('doctor_status', '1')
            ->where('round_status', '1')
            ->orderBy('token', 'asc')
            ->with('patient')
            ->first();
        // Count of doctor-reviewed rounds
        $doctorRounds = Round::where('doctor_status', '1')->count();

        // Count of rounds pending for nurses
        $nurseRounds = Round::where('nursing_status', '1')
        ->where('doctor_status', '0')
        ->get();

        // Fetch all roles
        $roles = Role::all();

        // Get all users with doctor role (role_id = 4)

        // Calculate total revenue from all rounds
        $cost = Round::sum('cost');

        // Count of rounds in queue for current user’s patients
        $queue = Round::where('doctor_status', '1')
            ->where('round_status', '1')
            ->whereHas('patient', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->count();

        // Get the next patient in queue for current user's patients
        // $round = Round::where('doctor_status', '1')
        //     ->where('round_status', '1')
        //     ->whereHas('patient', function ($query) use ($userId) {
        //         $query->where('user_id', $userId);
        //     })
        //     ->orderBy('token', 'asc')
        //     ->with('patient')
        //     ->first();

        return view('user.dashboard.dashboard', get_defined_vars());
    }


    public function delPatient($id) {
        Patient::where('id', $id)->delete();
        return back()->with('success', 'Patient has been deleted successfully');
    }
}
