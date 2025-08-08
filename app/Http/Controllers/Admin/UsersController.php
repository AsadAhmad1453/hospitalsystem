<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
class UsersController extends Controller
{
    public function index(){
        $roles = Role::with('permissions')->get();
        $users = User::with('roles')->get();
        return view('admin.users.users', get_defined_vars());
    }

    public function saveuser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role_id' => 'required|exists:roles,id',
        ]);

        DB::beginTransaction();

        try {
            // Double-check email existence in case of race condition
            if (User::where('email', $request->email)->exists()) {
                return back()->with('error', 'User with this email already exists.');
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => $request->role_id,
                'role' => '1'
            ]);

            $role = Role::find($request->role_id);
            $user->assignRole($role->name);

            DB::commit();
            return back()->with('success', 'User Added');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function deluser($id){
        User::where('id', $id)->delete();
        return back()->with(['success', 'User Deleted']);
    }

    public function rolestable($id)
    {
        $role = Role::findOrFail($id);
        $users = User::role($role->name)->with('roles')->get();
        return view('admin.roles.rolestable', compact('role', 'users'));
    }
}
