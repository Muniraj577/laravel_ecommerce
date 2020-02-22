<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $products = Product::all()->take(4);
         $categories = Category::all()->take(4);
        return view('home', compact('products','categories'))->with('id');
    }
}
