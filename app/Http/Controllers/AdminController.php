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
        $categories = Category::with('parent')->get();
        return Inertia::render('Admin/Menus/Menus', ['categories' => $categories]);
    }

    public function slides()
    {
       return Inertia::render('Admin/Slides/Slides');
    }

    public function users()
    {
       return Inertia::render('Admin/Users/Users');
    }

    public function products()
    {
        return Inertia::render('Admin/Products/Products');
    }

}
