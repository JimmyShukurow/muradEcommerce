<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return Inertia::render("Admin/Menus/Form", ['categories' => $categories, 'edit' => false]);
    }

    public function store(CategoryRequest $request)
    {

        Category::create($request->validated());

        return Redirect::route('admin.menus')->setStatusCode(303)->with('success', 'Menu was saved');

    }

    public function edit($menu)
    {
        $categories = Category::all();
        $menu = $categories->where('id', $menu)->first();
        return Inertia::render('Admin/Menus/Form', ['menu' => $menu, 'categories' => $categories, 'edit' => true]);
    }

    public function update(Category $menu)
    {
        return Redirect::route('admin.menus')->setStatusCode(303)->with('success', 'Menu was updated');
    }

    public function delete(Category $menu)
    {
        if(Product::where('category_id', $menu->id)->first()){
            return back();

        }
        $menu->delete();
        return Redirect::route('admin.menus')->setStatusCode(303)->with('success', 'Menu was deleted');
        
    }
}
