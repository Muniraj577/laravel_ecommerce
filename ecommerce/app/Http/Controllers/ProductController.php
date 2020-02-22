<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'))->with('id');
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'qty' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:10000'
        ]);
        $image = $request->file('image');
        if (isset($image)) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            if (!file_exists('images/product')) {
                mkdir('images/product', 0777, true);
            }
            $image->move('images/product', $imageName);
        }
        $product = new Product();
        $product->code = "JW#" . generateProductCode(4);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->description = $request->description;
        $product->image = $imageName;
        $product->save();
        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    public function show($id)
    {
//        $products = Product::all();
        $product = Product::where('id', $id)->with('product_images')->first();
        return view('admin.products.show', compact('product', 'product', $product, $product));
    }

    public function addMultipleImage(Product $product)
    {
        $products = Product::all();
        $categories = Category::all();
        return view('admin.product_image.create', compact('product', 'products','categories', $product, $products, $categories));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('categories', 'product'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'qty' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:10000'
        ]);
        $product = Product::find($id);
        $image = $request->file('image');
        if (isset($image)){
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            if (!file_exists('images/product')){
                mkdir('images/product', 0777,true);
            }
            unlink('images/product/'.$product->image);
            $image->move('images/product', $imageName);
        }
        $product->code = "JW#" . generateProductCode(4);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->description = $request->description;
        $product->image = $imageName;
        $product->save();
        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        if (file_exists('images/product/'.$product->image)){
            unlink('images/product/'.$product->image);
        }
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }

    public function viewProductImages(Request $request, $id)
    {
        $product = Product::where('id', $id)->with('product_images')->first();
        return view('products.viewproduct', compact('product', 'request'));
    }
}
