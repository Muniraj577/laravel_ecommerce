<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserOrdersTable extends Migration
{

    public function up()
    {
        Schema::create('user_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->string('customer_number')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('order_code')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('user_orders');
    }
}
