<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\DashboardService;
use App\Models\Role;
use App\Models\BloodInv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminDashboardController extends Controller
{
    protected $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    /**
     * Display dashboard (old admin panel)
     */
    public function index()
    {
        $stats = $this->dashboardService->getDashboardStatistics();
        
        return view('admin.dashboard.dashboard', $stats);
    }

    /**
     * Display profile (old admin panel)
     */
    public function profile()
    {
        $user = Auth::user();
        return view('admin.profile.profile', compact('user'));
    }

    /**
     * Update profile (old admin panel)
     */
    public function updateProfile(Request $request)
    {
        try {
            $this->updateUserProfile($request, Auth::user());
            return redirect()->back()->with('status', 'Profile updated successfully.');
        } catch (\Exception $e) {
            Log::error('Profile update error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error updating profile.');
        }
    }

    /**
     * Display dashboard (new admin panel)
     */
    public function indexNew()
    {
        $stats = $this->dashboardService->getDashboardStatistics();
        
        // Additional data for new dashboard
        $roles = Role::all();
        $bloodTests = BloodInv::with(['patient', 'user'])
            ->latest()
            ->take(10)
            ->get();
        
        $completedTests = BloodInv::where('status', 'completed')->count();
        $pendingTests = BloodInv::where('status', 'pending')->count();
        $abnormalResults = BloodInv::where('is_abnormal', true)->count();
        
        return view('admin-new.dashboard.dashboard', array_merge($stats, compact(
            'roles', 
            'bloodTests', 
            'completedTests', 
            'pendingTests', 
            'abnormalResults'
        )));
    }

    /**
     * Display profile (new admin panel)
     */
    public function profileNew()
    {
        $user = Auth::user();
        $userStats = [
            'totalLogins' => 0, // Implement based on login tracking
            'lastLogin' => $user->last_login_at ?? 'Never'
        ];
        
        return view('admin-new.profile.profile', compact('user', 'userStats'));
    }

    /**
     * Update profile (new admin panel)
     */
    public function updateProfileNew(Request $request)
    {
        try {
            $this->updateUserProfile($request, Auth::user());
            return response()->json([
                'success' => true, 
                'message' => 'Profile updated successfully.'
            ]);
        } catch (\Exception $e) {
            Log::error('Profile update error: ' . $e->getMessage());
            return response()->json([
                'success' => false, 
                'message' => 'Error updating profile.'
            ]);
        }
    }

    /**
     * Change password
     */
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        try {
            $user = Auth::user();
            
            if (!Hash::check($request->current_password, $user->password)) {
                return response()->json([
                    'success' => false, 
                    'message' => 'Current password is incorrect.'
                ]);
            }

            $user->password = Hash::make($request->new_password);
            $user->save();

            return response()->json([
                'success' => true, 
                'message' => 'Password changed successfully.'
            ]);
        } catch (\Exception $e) {
            Log::error('Password change error: ' . $e->getMessage());
            return response()->json([
                'success' => false, 
                'message' => 'Error changing password.'
            ]);
        }
    }

    /**
     * Upload profile image
     */
    public function uploadProfileImage(Request $request)
    {
        $request->validate([
            'profile_pic' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            $user = Auth::user();
            
            if ($request->hasFile('profile_pic')) {
                // Delete old profile picture
                if ($user->profile_pic) {
                    Storage::disk('public')->delete($user->profile_pic);
                }
                
                $file = $request->file('profile_pic');
                $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('profile_pics', $filename, 'public');
                
                $user->profile_pic = $path;
                $user->save();
                
                return response()->json([
                    'success' => true, 
                    'image_url' => asset('storage/' . $path)
                ]);
            }

            return response()->json([
                'success' => false, 
                'message' => 'No image uploaded.'
            ]);
        } catch (\Exception $e) {
            Log::error('Profile image upload error: ' . $e->getMessage());
            return response()->json([
                'success' => false, 
                'message' => 'Error uploading image.'
            ]);
        }
    }

    /**
     * Get real-time statistics
     */
    public function getRealTimeStats()
    {
        try {
            $stats = $this->dashboardService->getRealTimeStatistics();
            return response()->json($stats);
        } catch (\Exception $e) {
            Log::error('Real-time stats error: ' . $e->getMessage());
            return response()->json(['error' => 'Error fetching statistics'], 500);
        }
    }

    /**
     * Update user profile (private helper method)
     */
    private function updateUserProfile(Request $request, $user)
    {
        $data = [];

        if ($request->has('name') && $request->name !== $user->name) {
            $data['name'] = $request->name;
        }

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('profile_pic')) {
            // Delete old profile picture
            if ($user->profile_pic) {
                Storage::disk('public')->delete($user->profile_pic);
            }
            
            $file = $request->file('profile_pic');
            $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('profile_pics', $filename, 'public');
            $data['profile_pic'] = $path;
        }

        if (!empty($data)) {
            $user->fill($data);
            $user->save();
        }
    }
}