<?php

namespace App\Http\Controllers;

use App\Models\Brand;
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
}
