<?php

namespace App\Http\Controllers\Frontend;

use App\Cart;
use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index()
    {
        $categories = Category::with('products')->get();
        $products = Product::all();
        return view('frontend.index', compact('products', 'categories'));
    }

    public function shop($id = null)
    {
        $categories = Category::all();
        if (is_null($id)) {
            $products = Product::all();
        } else {
            $products = Category::find($id)->products;
        }
        return view('frontend.shop', compact('categories', 'products'));
    }

    public function product_detail($id)
    {
        $products = Product::all();
        $product = Product::where('id',$id)->with('product_images')->first();
        return view('frontend.product_detail', compact('products','product', $product));
    }

    public function checkout()
    {
        if (session()->has('cart')) {
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = null;
        }
        if (Auth::check()){
            return view('frontend.checkout', compact('cart'));
        } else {
            return redirect()->route('login');
        }
    }

    public function user_register()
    {
        return view('frontend.auth.user-register');
    }
    public function user_login()
    {
        return view('frontend.auth.user-login');
    }
}
