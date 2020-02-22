<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categories';
    protected $primaryKey='id';
    protected $fillable = [
      'name', 'image',
    ];

    public function products()
    {
        return $this->hasMany('App\Product', 'category_id', 'id');
    }

    public function order_items()
    {
        return $this->hasMany('App\OrderItem');
    }
}
