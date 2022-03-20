<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users  = User::latest()->paginate();
        $roles  = Role::all();
        return view('pages.admin.index', compact('users', 'roles'));
    }

    public function store(Request $request){
        $request->validate([
            "name"      => "required|min:3",
            "email"     => "required|unique:users,email",
            "password"  => "required|min:4",
            "role_id"   => "required"
        ]);

        $user   = new User();
        $user   -> name     = $request -> name;
        $user   -> email    = $request -> email;
        $user   -> password = Hash::make($request -> password);
        $user   -> role_id  = $request -> role_id;
        $user->save();
         return redirect()->back();
    }

    public function update(Request $request, User $user){
        // dd($user);
        $request->validate([
            "name"  => "required",
            "email" => "required",
            "role_id" => "required"
        ]);

        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->role_id  = $request->role_id;
        $user->update();
        return redirect()->back();
    }

    public function destroy(User $user){
        $user->delete();
        return redirect()->back();
    }
}
