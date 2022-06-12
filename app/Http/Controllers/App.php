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
        return Inertia::render('App', ['user' => Auth::user(), 'topmenus' => $topmenus ]);
    }
}
