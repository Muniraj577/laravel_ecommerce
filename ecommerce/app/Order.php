<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='orders';
    protected $primaryKey='id';
    protected $fillable = [
        'user_id', 'user_email', 'total_price', 'user_name', 'city', 'state', 'country', 'phone_number'
    ];
}
