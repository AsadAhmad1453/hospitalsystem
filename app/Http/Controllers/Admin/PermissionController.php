<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.permissions', get_defined_vars());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name|string|max:255'
        ]);

        Permission::create(['name' => $request->name]);

        return back()->with('success', 'Permission created successfully.');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return back()->with('success', 'Permission deleted.');
    }
}
