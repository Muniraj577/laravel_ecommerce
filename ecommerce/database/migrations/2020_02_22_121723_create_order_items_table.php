<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{

    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category_id');
            $table->string('product_id');
            $table->bigInteger('user_order_id');
            $table->string('weight');
            $table->string('rate');
            $table->decimal('price',10,'2');
            $table->decimal('discount','10','2');
            $table->decimal('tax','10','2');
            $table->decimal('making_cost','10','2');
            $table->decimal('advance','10','2');
            $table->decimal('grand_total','10','2');
            $table->decimal('sub_total','10','2');
            $table->decimal('price_after_discount','10','2')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
