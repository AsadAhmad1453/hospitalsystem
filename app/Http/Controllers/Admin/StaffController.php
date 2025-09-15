<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use App\Models\Staff;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function index(){
        $roles = Role::with('permissions')->get();
        
        
        $permissions = Permission::all();
        return view('admin.staff.staff', get_defined_vars());
    }

    public function savestaff(Request $request){
        $role = Role::create(['name' => $request->name]);
        return back()->with(['success', 'Staff Member Added Successfully']);
    }

    public function bulkUpdatePermissions(Request $request)
    {
        $data = $request->input('permissions', []);
    
        foreach ($data as $roleId => $permissionNames) {
            $role = Role::find($roleId);
            if ($role) {
                $role->syncPermissions($permissionNames); // Will update based on checked boxes
            }
        }
    
        return back()->with('success', 'Permissions updated successfully.');
    }

    public function delstaff($id){
        Staff::where('id', $id)->delete();
        
        return back()->with(['success', 'Staff Member is Deleted Successfully']);
    }

    // New admin panel methods
    public function indexNew()
    {
        $roles = Role::with('permissions')->get();
        
        
        $permissions = Permission::all();
        $users = \App\Models\User::with('roles')->get();
        $selectedRole = null; // Initialize selectedRole as null
        
        return view('admin-new.staff.staff', get_defined_vars());
    }

    public function selectRoleNew($id)
    {
        $roles = Role::with('permissions')->get();
        
        
        $permissions = Permission::all();
        $users = \App\Models\User::with('roles')->get();
        $selectedRole = Role::with('permissions')->findOrFail($id);
        
        return view('admin-new.staff.staff', get_defined_vars());
    }

    public function getRole($id)
    {
        $role = Role::with('permissions')->findOrFail($id);
        return response()->json($role);
    }

    public function getUserPermissions($id)
    {
        $user = \App\Models\User::with(['roles', 'permissions'])->findOrFail($id);
        return response()->json($user);
    }

    public function savestaffNew(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:roles,name',
                'description' => 'nullable|string|max:500'
            ]);

            $roleData = ['name' => $request->name];
            if ($request->has('description')) {
                $roleData['description'] = $request->description;
            }
            $role = Role::create($roleData);

            return response()->json([
                'success' => true, 
                'message' => 'Role created successfully!',
                'role' => $role
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false, 
                'message' => 'Error creating role: ' . $e->getMessage()
            ], 500);
        }
    }



    public function assignPermissionsNew(Request $request, $id)
    {
        try {
            $request->validate([
                'permissions' => 'required|array',
                'permissions.*' => 'exists:permissions,id'
            ]);

            $role = Role::findOrFail($id);
            $permissions = Permission::whereIn('id', $request->permissions)->get();
            $role->syncPermissions($permissions);

            return response()->json([
                'success' => true, 
                'message' => 'Permissions assigned successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false, 
                'message' => 'Error assigning permissions: ' . $e->getMessage()
            ], 500);
        }
    }

    public function assignRoleToUserNew(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required|exists:users,id',
                'role_id' => 'required|exists:roles,id'
            ]);

            $user = \App\Models\User::findOrFail($request->user_id);
            $role = Role::findOrFail($request->role_id);
            
            $user->assignRole($role);

            return response()->json([
                'success' => true, 
                'message' => 'Role assigned to user successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false, 
                'message' => 'Error assigning role: ' . $e->getMessage()
            ], 500);
        }
    }

    public function removeRoleFromUserNew(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required|exists:users,id',
                'role_id' => 'required|exists:roles,id'
            ]);

            $user = \App\Models\User::findOrFail($request->user_id);
            $role = Role::findOrFail($request->role_id);
            
            $user->removeRole($role);

            return response()->json([
                'success' => true, 
                'message' => 'Role removed from user successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false, 
                'message' => 'Error removing role: ' . $e->getMessage()
            ], 500);
        }
    }

    public function updateRoleNew(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:roles,name,' . $id,
                'description' => 'nullable|string|max:500'
            ]);

            $role = Role::findOrFail($id);
            $role->update([
                'name' => $request->name,
                'description' => $request->description
            ]);

            return response()->json([
                'success' => true, 
                'message' => 'Role updated successfully!',
                'role' => $role
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false, 
                'message' => 'Error updating role: ' . $e->getMessage()
            ], 500);
        }
    }

    public function deleteRoleNew($id)
    {
        try {
            $role = Role::findOrFail($id);
            
            // Check if role has users assigned
            $userCount = DB::table('model_has_roles')
                ->where('role_id', $id)
                ->where('model_type', 'App\Models\User')
                ->count();
            
            if ($userCount > 0) {
                return response()->json([
                    'success' => false, 
                    'message' => 'Cannot delete role. It has ' . $userCount . ' user(s) assigned. Please reassign users first.'
                ], 400);
            }
            
            $role->delete();

            return response()->json([
                'success' => true, 
                'message' => 'Role deleted successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false, 
                'message' => 'Error deleting role: ' . $e->getMessage()
            ], 500);
        }
    }
}
