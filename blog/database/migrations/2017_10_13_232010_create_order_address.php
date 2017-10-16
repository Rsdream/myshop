<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderAddress extends Migration
{
    /**
     * Run the migrations.
     *@author kjw <[kjwlaravel@163.com]>
     * @return void
     */
    public function up()
    {
        //地址表
        Schema::create('orders_address', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid')->unsigned();
            $table->integer('status')->default(0);
            $table->string('comment');
            $table->string('pro', '11');
            $table->string('city', '11');
            $table->string('area', '11');
            $table->string('name');
            $table->string('phone', '11');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_address');    
    }
}
