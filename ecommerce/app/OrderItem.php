<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
      'category_id', 'product_id', 'user_order_id','weight', 'rate', 'price', 'discount', 'tax', 'making_cost', 'advance', 'grand_total','sub_total','price_after_discount'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product','product_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function user_order()
    {
        return $this->belongsTo('App\UserOrder');
    }
}
