<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class App extends Controller
{
    public function index()
    {
        $topmenus = Category::get()->pluck('name');
        $user = Auth::user();
        if($user != null && $user->roles->contains('name', 'admin')){
            $user['roles'] = $user->roles;
        };
        return Inertia::render('App', ['user' => Auth::user(), 'topmenus' => $topmenus]);
    }
}
