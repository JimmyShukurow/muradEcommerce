<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index()
    {
        return Inertia::render('AdminPanel');
    }

    public function menus()
    {
        $categories = Category::with('parent')->orderBY('created_at', 'DESC')->get();
        return Inertia::render('Admin/Menus/Menus', ['categories' => $categories]);
    }

    public function slides()
    {
       return Inertia::render('Admin/Slides/Slides');
    }

    public function users()
    {
        $users = User::all();
       return Inertia::render('Admin/Users/Users', ['users'=> $users]);
    }

    public function products()
    {
        $products = Product::with('category','previewImage')->orderBY('created_at', 'DESC')->get();
        
        return Inertia::render('Admin/Products/Products', ['products' => $products]);
    }

    public function roles()
    {
        $roles = Role::all();

        return  Inertia::render('Admin/Roles/Roles', ['roles' => $roles]);
    }

    public function settings()
    {
        
        return Inertia::render('Admin/Settings/Settings', ['url' => config('app.url')]);
    }

}
