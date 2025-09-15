<?php

namespace App\Services\Admin;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class UserService
{
    /**
     * Get all users with their roles and pagination
     */
    public function getAllUsers($perPage = 15)
    {
        return User::with(['roles'])
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

    /**
     * Get users by role with eager loading
     */
    public function getUsersByRole($roleId, $perPage = 15)
    {
        $role = Role::findOrFail($roleId);
        
        return User::role($role->name)
            ->with(['roles'])
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

    /**
     * Create a new user
     */
    public function createUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|exists:roles,id',
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        // Handle profile picture upload
        if ($request->hasFile('profile_pic')) {
            $userData['profile_pic'] = $this->handleProfilePictureUpload($request->file('profile_pic'));
        }

        $user = User::create($userData);
        
        // Assign role
        $role = Role::findOrFail($request->role);
        $user->assignRole($role);

        Log::info('User created successfully', ['user_id' => $user->id, 'email' => $user->email]);

        return $user;
    }

    /**
     * Update an existing user
     */
    public function updateUser(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $userId,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|exists:roles,id',
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $userData = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        // Update password if provided
        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->password);
        }

        // Handle profile picture upload
        if ($request->hasFile('profile_pic')) {
            // Delete old profile picture
            if ($user->profile_pic) {
                Storage::disk('public')->delete($user->profile_pic);
            }
            $userData['profile_pic'] = $this->handleProfilePictureUpload($request->file('profile_pic'));
        }

        $user->update($userData);
        
        // Update role
        $role = Role::findOrFail($request->role);
        $user->syncRoles([$role]);

        Log::info('User updated successfully', ['user_id' => $user->id, 'email' => $user->email]);

        return $user;
    }

    /**
     * Delete a user
     */
    public function deleteUser($userId)
    {
        $user = User::findOrFail($userId);
        
        // Delete profile picture if exists
        if ($user->profile_pic) {
            Storage::disk('public')->delete($user->profile_pic);
        }
        
        $user->delete();

        Log::info('User deleted successfully', ['user_id' => $userId]);

        return true;
    }

    /**
     * Get user statistics
     */
    public function getUserStatistics()
    {
        return [
            'total_users' => User::count(),
            'doctors_count' => User::role('doctors')->count(),
            'nurses_count' => User::role('nurse')->count(),
            'data_collectors_count' => User::role('data collector')->count(),
            'recent_users' => User::where('created_at', '>=', now()->subDays(7))->count(),
        ];
    }

    /**
     * Handle profile picture upload
     */
    private function handleProfilePictureUpload($file)
    {
        $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('profile-pictures', $filename, 'public');
        
        return $path;
    }

    /**
     * Search users
     */
    public function searchUsers($query, $perPage = 15)
    {
        return User::with(['roles'])
            ->where('name', 'like', "%{$query}%")
            ->orWhere('email', 'like', "%{$query}%")
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }
}
