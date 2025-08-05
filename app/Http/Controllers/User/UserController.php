<?php

namespace App\Http\Controllers\User;

use Illuminate\Database\Eloquent\ModelNotFoundException;
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
        try {
            $user = Auth::user();
            $userId = $user->id;
            $userRoleId = $user->role_id;

            $totalToken = Round::latest()->first();
            $activeToken = Round::where('round_status', '1')->first();

            $dcs = User::role('Data Collector')->with('latestActiveRoundAsDC')->get();
            $doctors = User::role('Doctor')->with('latestActiveRoundAsDoctor')->get();
            $nurses = User::role('Nurse')->with('latestActiveRoundAsNurse')->get();

            return view('user.dashboard.dashboard', get_defined_vars());
            
        } catch (\Exception $e) {
            \Log::error('Dashboard index error: ' . $e->getMessage());
            return back()->withErrors(['message' => 'Unable to load dashboard. Please try again later.']);
        }
    }


    public function delPatient($id) {
         try {
            $patient = Patient::findOrFail($id);
            $patient->delete();
            return back()->with('success', 'Patient has been deleted successfully.');
        } catch (\Exception $e) {
            \Log::error('Error deleting patient: ' . $e->getMessage());
            return back()->withErrors(['message' => 'An error occurred while deleting the patient.']);
        }
    }
}
