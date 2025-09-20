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
        
        // Flatten the statistics for the view
        $dashboardData = [
            'doctorscount' => $stats['users']['doctors'] ?? 0,
            'patientscount' => $stats['patients']['total'] ?? 0,
            'nursescount' => $stats['users']['nurses'] ?? 0,
            'formscount' => $stats['forms']['total'] ?? 0,
            'medicinescount' => $stats['medical']['medicines'] ?? 0,
            'bloodinvcount' => $stats['medical']['blood_tests'] ?? 0,
            'xrayscount' => $stats['medical']['xrays'] ?? 0,
            'ultrasoundscount' => $stats['medical']['ultrasounds'] ?? 0,
            'ctscanscount' => $stats['medical']['ctscans'] ?? 0,
            'dosagecount' => $stats['medical']['doses'] ?? 0,
            'bankscount' => $stats['medical']['banks'] ?? 0,
            'relationscount' => $stats['forms']['questions'] ?? 0,
        ];
        
        return view('admin.dashboard.dashboard', $dashboardData);
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
        
        // Flatten the statistics for the new dashboard view
        $dashboardData = array_merge($stats, [
            'doctorscount' => $stats['users']['doctors'] ?? 0,
            'patientscount' => $stats['patients']['total'] ?? 0,
            'nursescount' => $stats['users']['nurses'] ?? 0,
            'formscount' => $stats['forms']['total'] ?? 0,
            'medicinescount' => $stats['medical']['medicines'] ?? 0,
            'bloodinvcount' => $stats['medical']['blood_tests'] ?? 0,
            'xrayscount' => $stats['medical']['xrays'] ?? 0,
            'ultrasoundscount' => $stats['medical']['ultrasounds'] ?? 0,
            'ctscanscount' => $stats['medical']['ctscans'] ?? 0,
            'dosagecount' => $stats['medical']['doses'] ?? 0,
            'bankscount' => $stats['medical']['banks'] ?? 0,
            'relationscount' => $stats['forms']['questions'] ?? 0,
        ], compact(
            'roles', 
            'bloodTests', 
            'completedTests', 
            'pendingTests', 
            'abnormalResults'
        ));
        
        return view('admin-new.dashboard.dashboard', $dashboardData);
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
     * Clear dashboard cache
     */
    public function clearCache()
    {
        try {
            $this->dashboardService->clearCache();
            return response()->json(['success' => true, 'message' => 'Cache cleared successfully']);
        } catch (\Exception $e) {
            Log::error('Cache clear error: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Error clearing cache'], 500);
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