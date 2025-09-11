<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\Patient;
use App\Models\Form;
use App\Models\Service;
use App\Models\Medicine;
use App\Models\BloodInv;
use App\Models\Xray;
use App\Models\Ultrasound;
use App\Models\Ctscan;
use App\Models\Dose;
use App\Models\Bank;
use App\Models\Question;
use App\Models\Section;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(){
        // User Statistics
        $doctorscount = User::role('Doctor')->count();
        $nursescount = User::role('Nurse')->count();
        $patientscount = Patient::count();
        
        // System Components
        $formscount = Form::count();
        $servicescount = Service::count();
        $questionscount = Question::count();
        $sectionscount = Section::count();
        
        // Medical Services
        $medicinescount = Medicine::count();
        $bloodinvcount = BloodInv::count();
        $xrayscount = Xray::count();
        $ultrasoundscount = Ultrasound::count();
        $ctscanscount = Ctscan::count();
        $dosagecount = Dose::count();
        $bankscount = Bank::count();
        $relationscount = 0; // This would need to be calculated based on your relations logic
        
        // Recent Activity (last 7 days)
        $recentPatients = Patient::where('created_at', '>=', now()->subDays(7))->count();
        $recentUsers = User::where('created_at', '>=', now()->subDays(7))->count();
        
        return view('admin.dashboard.dashboard', get_defined_vars());
    }

    public function profile(){
        $user = Auth::user();
        return view('admin.profile.profile', get_defined_vars());
    }

    public function updateProfile(Request $request) {
        $user = User::where('id', Auth::user()->id)->first();
        $data = [];

        if ($request->has('name') && $request->name !== $user->name) {
            $data['name'] = $request->name;
        }

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        if ($request->hasFile('profile_pic')) {
            // Handle file upload
            $file = $request->file('profile_pic');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('profile_pics', $filename, 'public');
            // Ensure only the relative path is stored in the database
            $data['profile_pic'] = $path;
        }
        if (!empty($data)) {
            // Use fill() and save() to ensure model events are triggered and attributes are set correctly
            $user->fill($data);
            $user->save();
        }

        return redirect()->back()->with('status', 'Profile updated successfully.');
    }
}
