<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use App\Models\Staff;

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
}
