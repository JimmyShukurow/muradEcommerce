<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        return 'ok';
    }

    public function edit(Product $product)
    {
        return Inertia::render('Admin/Products/Form', ['product'=> $product]);
    }
}
