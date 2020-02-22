<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
    protected $fillable = ['user_id', 'customer_name', 'contact_number', 'order_code'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function order_items()
    {
        return $this->hasMany("App\OrderItem", "user_order_id", 'id');
    }
}
