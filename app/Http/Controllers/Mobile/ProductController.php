<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Models\Basket;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Favorite;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function products($category)
    {
        $products = Product::with('previewImage')->where('category_id', $category)->orderBY('created_at', 'DESC')->get();
        return Inertia::render('Mobile/Products/Products', ['products' => $products]);        
    }

    public function product(Product $product)
    {
        // $currentProduct = Product::where('id', $product)->first();
        $product->load('previewImage');
        return Inertia::render('Mobile/Products/Product', ['product' => $product]);
    }

    public function addToBAsket ($productId, Request $request)
    {
        $check = Basket::where('user_id', $request->user()->id)->where('product_id', $productId)->first();
        if($check){
            return Redirect::back()->withErrors(['error' => 'This product is already in the Basket!']);
            
        }
        Basket::create(['user_id' => $request->user()->id, 'product_id'=> $productId, 'quantity'=> 1 ]);

        return Redirect::back()->withSuccess('Product was added to Basket!');
    }

    public function removeItem($id)
    {
        $product = Basket::find($id);
        $product->delete();

        return Redirect::back()->setStatusCode(303)->withSuccess('Product was removed from Basket!');

    }

    public function addToFavorites($productID, Request $request)
    {
        $check = Favorite::where('user_id', $request->user()->id)->where('product_id', $productID)->first();
        if ($check) {
            return Redirect::back()->withErrors(['error'=>'Product is  already in Favorites']);
        }
        Favorite::create(['user_id' => $request->user()->id, 'product_id' => $productID]);

        return Redirect::back()->setStatusCode(303)->with('success', 'Product was added');

    }
}
