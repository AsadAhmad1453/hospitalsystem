<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\UserService;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UsersController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display users listing (old admin panel)
     */
    public function index()
    {
        $roles = Role::with('permissions')->get();
        $users = $this->userService->getAllUsers();
        
        $stats = $this->userService->getUserStatistics();
        $doctorsCount = $stats['doctors_count'];
        $nursesCount = $stats['nurses_count'];
        $dataCollectorsCount = $stats['data_collectors_count'];
        $totalUsersCount = $stats['total_users'];
        
        return view('admin.users.users', compact('roles', 'users', 'doctorsCount', 'nursesCount', 'dataCollectorsCount', 'totalUsersCount'));
    }

    /**
     * Save user (old admin panel)
     */
    public function saveuser(Request $request)
    {
        try {
            $this->userService->createUser($request);
            return back()->with('success', 'User Added Successfully');
        } catch (\Exception $e) {
            Log::error('Error creating user: ' . $e->getMessage());
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    /**
     * Delete user (old admin panel)
     */
    public function deluser($id)
    {
        try {
            $this->userService->deleteUser($id);
            return back()->with('success', 'User Deleted Successfully');
        } catch (\Exception $e) {
            Log::error('Error deleting user: ' . $e->getMessage());
            return back()->with('error', 'Error deleting user');
        }
    }

    /**
     * Show users by role (old admin panel)
     */
    public function rolestable($id)
    {
        $role = Role::findOrFail($id);
        $users = $this->userService->getUsersByRole($id);
        
        return view('admin.roles.rolestable', compact('role', 'users'));
    }

    /**
     * Display users listing (new admin panel)
     */
    public function indexNew()
    {
        $roles = Role::with('permissions')->get();
        $users = $this->userService->getAllUsers();
        
        $stats = $this->userService->getUserStatistics();
        $doctorsCount = $stats['doctors_count'];
        $nursesCount = $stats['nurses_count'];
        $dataCollectorsCount = $stats['data_collectors_count'];
        $totalUsersCount = $stats['total_users'];
        
        return view('admin-new.users.users', compact('roles', 'users', 'doctorsCount', 'nursesCount', 'dataCollectorsCount', 'totalUsersCount'));
    }

    /**
     * Save user (new admin panel)
     */
    public function saveuserNew(Request $request)
    {
        try {
            $this->userService->createUser($request);
            return redirect()->route('admin-new.users')->with('success', 'User Added Successfully');
        } catch (\Exception $e) {
            Log::error('Error creating user: ' . $e->getMessage());
            return redirect()->route('admin-new.users')->with('error', 'Error: ' . $e->getMessage());
        }
    }

    /**
     * Delete user (new admin panel)
     */
    public function deluserNew($id)
    {
        try {
            $this->userService->deleteUser($id);
            return response()->json([
                'success' => true, 
                'message' => 'User Deleted Successfully'
            ]);
        } catch (\Exception $e) {
            Log::error('Error deleting user: ' . $e->getMessage());
            return response()->json([
                'success' => false, 
                'message' => 'Error deleting user'
            ]);
        }
    }

    /**
     * Show users by role (new admin panel)
     */
    public function rolestableNew($id)
    {
        $role = Role::findOrFail($id);
        $users = $this->userService->getUsersByRole($id);
        
        return view('admin-new.users.roles-table', compact('role', 'users'));
    }

    /**
     * Show user details (new admin panel)
     */
    public function showNew($id)
    {
        try {
            $user = $this->userService->getAllUsers()->find($id);
            
            if (!$user) {
                return response()->json([
                    'success' => false, 
                    'message' => 'User not found'
                ], 404);
            }

            $userData = $user->toArray();
            $userData['role_id'] = $user->role_id;
            $userData['role'] = $user->roles->first() ? $user->roles->first()->name : 'No Role';
            
            return response()->json($userData);
        } catch (\Exception $e) {
            Log::error('Error fetching user: ' . $e->getMessage());
            return response()->json([
                'success' => false, 
                'message' => 'Error fetching user details'
            ]);
        }
    }

    /**
     * Update user (new admin panel)
     */
    public function updateNew(Request $request, $id)
    {
        try {
            $this->userService->updateUser($request, $id);
            return response()->json([
                'success' => true, 
                'message' => 'User updated successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false, 
                'message' => 'Error updating user: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Show add user form (new admin panel)
     */
    public function addUserNew()
    {
        $roles = Role::all();
        return view('admin-new.users.add-user', compact('roles'));
    }

    /**
     * Show edit user form (new admin panel)
     */
    public function editUserNew($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin-new.users.edit-user', compact('user', 'roles'));
    }
}