<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function products($category)
    {
        $products = Product::with('previewImage')->where('category_id', $category)->orderBY('created_at', 'DESC')->get();
        return Inertia::render('Mobile/Products/Products', ['products' => $products]);        
    }

    public function product($product)
    {
        $currentProduct = Product::where('id', $product)->first();
        return Inertia::render('Mobile/Products/Product', ['product' => $currentProduct]);
    }
}
