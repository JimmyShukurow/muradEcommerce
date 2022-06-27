<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\ProductsRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        return 'ok';
    }

    public function edit(Product $product)
    {
        $categories = Category::select('id', 'name')->get();
        return Inertia::render('Admin/Products/Form', ['product'=> $product, 'categories' => $categories]);
    }

    public function update(Product $product, ProductsRequest $request)
    {

        $product->update($request->validated());
        

        return Redirect::route('admin.products')->setStatusCode(303)->with('success', 'Product was updated');
    }

    public function updloadImages(Request $request)
    {
        $product = Product::find(2);
        $product->addMediaFromRequest('image')->toMediaCollection('products');

        return $product;
    }
}
