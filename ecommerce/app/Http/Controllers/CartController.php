<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Product $product)
    {
        if (session()->has('cart')) {
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = new Cart();
        }
        $cart->add($product);
        session()->put('cart', $cart);
        return redirect()->route('frontend.index')->with('sucess', 'Product added successfully.');
    }

    public function showCart()
    {
        if (session()->has('cart')) {
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = null;
        }
        return view('frontend.cart', compact('cart'));
    }

    public function destroy(Product $product)
    {
        $cart = new Cart(session()->get('cart'));
        $cart->remove($product->id);

        if ($cart->totalQty <= 0) {
            session()->forget('cart');
        } else {
            session()->put('cart', $cart);
        }
        return redirect()->route('cart.show')->with('success', 'Product is removed.');
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'qty' => 'required|numeric'
        ]);
        $cart = new Cart(session()->get('cart'));
        $cart->updateQty($product->id, $request->qty);
        session()->put('cart', $cart);
        return redirect()->route('cart.show');
    }
}
