<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class BrandController extends Controller
{
    public function create()
    {
        return Inertia::render("Admin/Brands/Form");
    }

    public function store(Request $request)
    {
        Brand::create(['name' => $request->name]);

        return Redirect::to('/brands')->withSuccess('Brand was created');
    }

    public function edit(Brand $brand)
    {
        return Inertia::render('Admin/Brands/Form', ['brand' => $brand, 'edit' => true]);
    }

    public function update(Brand $brand, Request $request)
    {
        $brand->update(['name' => $request->name]);

        return Redirect::to('/brands')->setStatusCode(303)->withSuccess('Brand was updated');
    }

    public function destroy(Brand $brand)
    {
        if (Product::where('brand_id', $brand->id)->first()) {
            return Redirect::back()->setStatusCode(303)->withErrors(['error' =>'There is a Product with this Brand']);
        }

        $brand->delete();

        return Redirect::to('/brands')->setStatusCode(303)->withSuccess('Brand was deleted');
    }
}
