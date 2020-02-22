<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductImageController extends Controller
{

    public function getProducts(Request $request)
    {
        $products = DB::table('products')
            ->where("category_id", $request->category_id)->pluck('name', 'id');
        return response()->json($products);
    }

    public function create(Product $product, Category $category)
    {
        $categories = Category::all();
        $products = Product::all();
        return view('productImage.create', compact('categories', 'products', 'product', 'category', $category));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,gif,jpg|max:10000',
        ]);
        $images = array();
        if ($files = $request->file('image')) {
            foreach ($files as $file) {
                $name = time() . '.' . $file->getClientOriginalName();
                $destinationPath = public_path('/images/products');
                if ($file->move($destinationPath, $name)) {
                    $images[] = $name;

                    ProductImage::create(['image' => $name,
                        'product_id' => $request->product_id,
                        'category_id' => $request->category_id,
                        'product_code' => $request->product_code,
                        'product_name' => $request->product_name,
                    ]);
                }
            }
        }
        $notification = array(
            'message' => 'Image created Successfully',
            'alert-type' => "success"
        );

        return redirect()->back()
            ->with($notification);
    }

    public function edit(ProductImage $productImage)
    {
        $product = Product::all();
        return view('admin.product_image.edit', compact('productImage', 'product'));
    }


    public function update(Request $request, $id)
    {
        $product_image = ProductImage::find($id);
        if ($request->hasFile('image')) {
            $productImage = public_path('images/products' . $product_image->image);
            if (File::exists($productImage)) {
                unlink($productImage);
            }
        }
        $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('/images/products/'), $imageName);
        $input['image'] = $imageName;
        $product_image->image = $imageName;
        $product_image->save();

        $notification = array(
            'message' => 'Image updated Successfully',
            'alert-type' => "success"
        );

        return redirect()->route('products.index')
            ->with($notification);


    }


    public function destroy(ProductImage $productImage)
    {
        $productImage->delete();

        $notification = array(
            'message' => 'Image Deleted Successfully',
            'alert-type' => "success"
        );
        return redirect()->back()
            ->with($notification);
    }
}
