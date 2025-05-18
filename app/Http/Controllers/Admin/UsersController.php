<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Hash;
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

    public function saveuser(Request $request){
        // dd($request->role_id);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'role_id' => $request->role_id,
        ]); 
        return back()->with(['success', 'User Added']);
    }

    public function deluser($id){
        User::where('id', $id)->delete();
        return back()->with(['success', 'User Deleted']);
    }

    public function rolestable($id){
        $role = Role::where('id', $id)->first();
        $users = User::where('role_id', $id)->with('roles')->get();
        return view('admin.roles.rolestable', get_defined_vars( ));
    }
}
