<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable =['category_id','product_id', 'product_name', 'product_code','image'];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
