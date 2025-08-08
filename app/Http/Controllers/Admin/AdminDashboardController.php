<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(){
        $doctorscount = User::role('Doctor')->count();
        $patientscount = Patient::count();
        return view('admin.dashboard.dashboard',get_defined_vars());
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
