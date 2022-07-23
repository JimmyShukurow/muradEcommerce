<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Order;
use App\Models\Product;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $order = Order::create([
            'user_id' => $request->user()->id,
            'total_price' => $request->total_price,
            'address' => $request->address,
        ]);
        
        $wallet = Wallet::where('user_id', $order->user_id)->first();
        $old_wallet = $wallet->quantity;
        $wallet->update(['quantity' => $old_wallet - $order->total_price]);

        foreach($request->basket as $basket){
            $order->details()->create([
                'product_id' => $basket['product_id'],
                'quantity' => $basket['quantity'],
                'current_price' => $basket['product']['price'],
                'total_price' =>  $basket['quantity']* $basket['product']['price'],
            ]);

            $product = Product::find($basket['product_id']);

            $newQuantity = $product->quantity - $basket['quantity'];
            $product->update(['quantity' => $newQuantity]);
        }

        $basket = Basket::where('user_id', $request->user()->id)->delete();

        return Redirect::back()->withSuccess('Order Accepted');
    }
}
