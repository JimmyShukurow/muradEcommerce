<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            return auth()->user();
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
}
