<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Spatie\Permission\Models\Role;
class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.add-roles.add-roles', compact('roles'));
    }

    public function saveRole(Request $request)
    {
        $request->validate([
            'role_name' => 'required|string|max:255|unique:roles,name',
        ]);

        Role::create([
            'name' => $request->role_name,
            'guard_name' => 'web',
        ]);

        return redirect()->route('roles')->with('success', 'Role created successfully.');
    }

    public function deleteRole($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('roles')->with('success', 'Role deleted successfully.');
    }
}
