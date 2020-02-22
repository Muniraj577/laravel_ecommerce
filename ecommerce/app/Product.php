<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';
    protected $primaryKey='id';
    protected $fillable = [
      'code', 'name', 'price', 'description', 'image', 'qty', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function product_images()
    {
        return $this->hasMany('App\ProductImage', 'product_id', 'id');
    }

    public function user_order()
    {
        return $this->belongsTo('App\UserOrder');
    }

    public function order_items()
    {
        return $this->hasMany("App\OrderItem", 'product_id', 'id');
    }
}
