<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\User;
use App\OrderItem;
use App\UserOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserOrderController extends Controller
{

    public function index()
    {
        $product = Product::all();
        $order_items = OrderItem::join('products', 'products.id', '=', 'order_items.product_id')
            ->select('order_items.*', 'products.name')->get();
        $user_orders = UserOrder::all();
        return view('admin.userorder.index', compact('user_orders', 'order_items', 'product'))->with('id');
    }


    public function create()
    {
        $user_orders = UserOrder::all();
        $categories = Category::all();
        return view('admin.userorder.create', compact('categories', 'user_orders'));
    }

    public function store(Request $request)
    {
//        dd($request->all());
        $this->validate($request, [
            'customer_name' => 'required',
            'contact_number' => 'required',

        ]);
        $user_order = new UserOrder();
        $user_order->user_id = Auth::user()->id;
        $user_order->order_code = "JS" . generateProductCode(4);
        $user_order->customer_name = $request->customer_name;
        $user_order->contact_number = $request->contact_number;
        $user_order->save();
        foreach ($request->input('product_id') as $key => $value) {
            $order_items = new OrderItem;
            $order_items->user_order_id = $user_order->id;
            $order_items->product_id = collect($request->get('product_id')[$key])->implode(',');
            $order_items->category_id = collect($request->get('category_id')[$key])->implode(',');
            $order_items->weight = collect($request->get('weight')[$key])->implode(',');
            $order_items->rate = collect($request->get('rate')[$key])->implode(',');
            $order_items->making_cost = collect($request->get('making_cost')[$key])->implode(',');
            $order_items->advance = collect($request->get('advance')[$key])->implode(',');
            $order_items->price = collect($request->get('price')[$key])->implode(',');
            $order_items->sub_total = $request->sub_total;
            $order_items->discount = $request->discount;
            $order_items->price_after_discount = $request->price_after_discount;
            $order_items->tax = $request->tax;
            $order_items->grand_total = $request->grand_total;
            $order_items->save();
        }
        $notification = array(
            'message' => 'Order created Successfully',
            'alert-type' => "success"
        );
        return redirect()->route('user_orders.index')
            ->with($notification);


    }

    public function showOrder($id)
    {
        $user_order = UserOrder::where('id', $id)->with('order_items')->first();
        $category = Category::all();
        $product = Product::all();
        return view('admin.userorder.show', compact('product', 'category', 'user_order'));
    }


    public function edit(UserOrder $userOrder)
    {
        //
    }

    public function fetchProduct($category_id)
    {
        $products = Product::where('category_id', $category_id)->pluck('name', 'id');
        $list = '';
        foreach ($products as $key => $value) {
            $list .= "<option value='" . $key . "'>" . $value . "</option>";
        }
        return $list;

    }

    public function update(Request $request, UserOrder $userOrder)
    {
        //
    }


    public function deleteUserOrderAndItems($id)
    {
        $user_order = UserOrder::find($id);
        $user_order->order_items()->delete();
        $user_order->delete();
        $notification = array(
            'message' => 'Order Deleted Successfully',
            'alert-type' => "success"
        );
        return redirect()->route('user_orders.index')
            ->with($notification);


    }
}
