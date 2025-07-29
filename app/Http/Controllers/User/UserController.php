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

        $doctors = User::role('Doctor')->with('latestActiveRoundAsDoctor')->get();
        $nurses = User::role('Nurse')->with('latestActiveRoundAsNurse')->get();
        $dcs = User::role('Data Collector')->with('latestActiveRoundAsDC')->get();

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
        // Determine the logged-in user's role and show their queue patients accordingly
        $user = Auth::user();
        $queue = 0;

        // Optimize: Only eager load what is needed, and use role_id for performance
        if ($user->hasRole('Doctor')) {
            // For doctors, show patients where doctor_id matches and round is active for doctor
            $queue = Round::where('doctor_status', '1')
                ->where('round_status', '1')
                ->whereHas('patient', function ($query) use ($user) {
                    $query->where('doctor_id', $user->id);
                })
                ->count();
        } elseif ($user->hasRole('Nurse')) {
            // For nurses, show patients where nurse_id matches and round is active for nurse
            $queue = Round::where('nursing_status', '1')
                ->where('round_status', '1')
                ->whereHas('patient', function ($query) use ($user) {
                    $query->where('nurse_id', $user->id);
                })
                ->count();
        } 

        

        return view('user.dashboard.dashboard', get_defined_vars());
    }


    public function delPatient($id) {
        Patient::where('id', $id)->delete();
        return back()->with('success', 'Patient has been deleted successfully');
    }
}
