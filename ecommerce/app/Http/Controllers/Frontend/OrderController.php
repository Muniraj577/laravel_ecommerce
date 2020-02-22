<?php

namespace App\Http\Controllers\Frontend;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function store(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->user_name = Auth::user()->name;
        $order->user_email = Auth::user()->email;
        $order->city = $request->city;
        $order->state = $request->state;
        $order->country = $request->country;
        $order->total_price = $request->cart_total;
        $order->phone_number = $request->phone_number;
        $order->save();
        foreach (json_decode($request->cart_data) as $item) {
            $cart_item = new Cart();
            $cart_item->order_id = $order->id;
            $cart_item->product_id = $item->id;
            $cart_item->product_name = $item->name;
            $cart_item->product_code = $item->code;
            $cart_item->product_price = $item->price;
            $cart_item->user_email = Auth::user()->email;
            $cart_item->qty = $item->qty;
            $cart_item->save();

//            reduce from stock
            $product = Product::find($item->id);
            $old_qty = $product->quantity;
            $product->qty = $old_qty - $item->qty;
            $product->save();
            $request->session()->forget('cart');
            return redirect()->route('cart.show');
        }
    }
}
