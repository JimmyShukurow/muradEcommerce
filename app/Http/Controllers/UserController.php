<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $user = Auth::attempt($credentials);
        if ($user){
            return Redirect::route('home');
        }
        return response()->json('error');
    }
    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }

    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->firstname.' '.$request->lastname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'address' => $request->address,
            'phone' => $request->phone
        ]);
        if(User::all()->count() == 1){
            $user->assignRole('admin');
        }
        else{
            $user->assignRole('user');
        }
        Auth::login($user);
        $user['roles'] = $user->roles;
        return $user;
    }

    public function profile()
    {
        return Inertia::render('Mobile/Profile/Profile');
    }

    public function quick()
    {
        return true;
    }

    public function favorites()
    {
        return true;
    }

    public function basket()
    {
        return true;
    }

    public function mobileLogin()
    {
        return Inertia::render('Mobile/Login/Login');
    }

    public function loginMobile(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $user = Auth::attempt($credentials);
        if ($user){
            return Redirect::route('home');
        }
        return response()->json('error');
    }

    public function edit(User $user)
    {
        $roles = Role::select('id', 'name')->get();
        $user->load('roles:id,name');
        return Inertia::render('Admin/Users/Form', ['user'=> $user, 'roles' => $roles]);
    }
    public function updateRole(User $user, Request $request)
    {
        $user->syncRoles($request->role);
        
        // return'ok';
        
        return ['success'=>'Role was updated'];
    }
}
