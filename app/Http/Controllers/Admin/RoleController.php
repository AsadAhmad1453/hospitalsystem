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
        return view('admin-new.staff.staff', compact('roles'));
    }

    public function saveRole(Request $request)
    {
        $roleName = strtolower(trim($request->input('role_name')));

        $request->validate([
            'role_name' => [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) {
                    if (Role::whereRaw('LOWER(name) = ?', [strtolower(trim($value))])->exists()) {
                        $fail('The role already exists.');
                    }
                },
            ],
        ]);

        Role::create([
            'name' => $roleName,
            'guard_name' => 'web',
        ]);

        return redirect()->route('admin-new.staff')->with('success', 'Role created successfully.');
    }


    public function deleteRole($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('admin-new.staff')->with('success', 'Role deleted successfully.');
    }
}
