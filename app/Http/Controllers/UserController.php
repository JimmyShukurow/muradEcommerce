<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        Auth::attempt([$request->username, $request->password], $request->remember);
        if (auth()){
            return auth()->user();
        }
        return 'error';
    }
}
