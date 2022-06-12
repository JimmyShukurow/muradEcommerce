<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function index()
    {
        return Inertia::render('AdminPanel');
    }

    public function menus()
    {
        $categories = Category::all();
        return Inertia::render('Admin/Menus', ['categories' => $categories]);
    }
}
