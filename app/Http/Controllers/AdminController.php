<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Model;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\Slide;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();
        $orderDetails = OrderDetails::with('product:id,name')->get();
        $products_count = Product::all()->count();
        $total_sell = Order::sum('total_price');

        return Inertia::render('AdminPanel', 
            [
                'orderDetails' => $orderDetails,
                'users' => $users, 'users_count' => $users->count(),
                'products_count' => $products_count,
                'total_sell' => $total_sell
            ]
        );
    }

    public function menus()
    {
        $categories = Category::with('parent')->orderBY('created_at', 'DESC')->get();
        return Inertia::render('Admin/Menus/Menus', ['categories' => $categories]);
    }

    public function slides()
    {
        $categories = Category::select('id', 'name')->get();
        $slides = Slide::with('previewImage')->get();
       return Inertia::render('Admin/Slides/Slides', ['slides'=> $slides, 'categories' => $categories]);
    }

    public function users()
    {
        $users = User::all();
       return Inertia::render('Admin/Users/Users', ['users'=> $users]);
    }

    public function products()
    {
        $products = Product::with('category','previewImage', 'brand:id,name', 'model:id,name')->orderBY('created_at', 'DESC')->get();
        
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
    
    public function models()
    {
        $models = Model::all();
        return Inertia::render('Admin/Models/Models', ['models' => $models]);
    }

    public function brands()
    {
        $brands = Brand::all();
        return Inertia::render('Admin/Brands/Brands', ['brands' => $brands]);
    }
}
