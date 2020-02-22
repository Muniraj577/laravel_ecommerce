<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
      'order_id', 'product_id', 'product_name', 'product_code', 'product_price', 'qty', 'user_email'
    ];

    public $items = [];
    public $totalQty;
    public $totalPrice;

    public function __construct($cart = null)
    {
        if ($cart)
        {
            $this->items = $cart->items;
            $this->totalQty = $cart->totalQty;
            $this->totalPrice = $cart->totalPrice;
        }
        else{
            $this->items = [];
            $this->totalQty = 0;
            $this->totalPrice = 0;
        }
    }

    public function add($product)
    {
        $item = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'code' => $product->code,
            'qty' => 0,
            'image' => $product->image,
        ];

        if (!array_key_exists($product->id, $this->items))
        {
            $this->items[$product->id] = $item;
            $this->totalQty +=1;
            $this->totalPrice += $product->price;
        }
        else{
            $this->totalQty +=1;
            $this->totalPrice += $product->price;
        }
        $this->items[$product->id]['qty'] +=1;
    }

    public function remove($id)
    {
        if (array_key_exists($id, $this->items))
        {
            $this->totalQty -= $this->items[$id]['qty'];
            $this->totalPrice -= $this->items[$id]['qty'] * $this->items[$id]['price'];
            unset($this->items[$id]);
        }
    }

    public function updateQty($id, $qty)
    {
        $price = [];
        $new_qty = [];

        foreach($this->items as $item) {
            if($id == $item['id']) {
                $price[] = $item['price'] * $qty;
                $new_qty[] = $qty;
                $this->items[$id]['qty'] = $qty;
            } else {
                $price[] = $item['price'] * $item['qty'];
                $new_qty[] = $item['qty'];
            }
        }

        $this->totalPrice = array_sum($price);
        $this->totalQty = array_sum($new_qty);

    }
}
