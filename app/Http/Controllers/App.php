<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class App extends Controller
{
    public function index()
    {
        return Inertia::render('App');
    }
}
