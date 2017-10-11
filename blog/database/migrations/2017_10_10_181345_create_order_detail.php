<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //地址表
        Schema::create('orders_address', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid')->unsigned();
            $table->string('comment');
            $table->string('pro', '11');
            $table->string('city', '11');
            $table->string('area', '11');
            $table->string('name');
            $table->string('phone', '11');
            $table->timestamps();
        });

        
        //订单表
        Schema::create('orders_detail', function (Blueprint $table) {
            $table->increments('id');            
            $table->integer('number')->unique();            
            $table->integer('uid');            
            $table->string('address');
            $table->integer('addtime')->unsigned();
            $table->string('name');
            $table->string('phone');
            $table->string('comment')->nullable();
            $table->integer('status')->unsigned()->default(0);
            $table->integer('back_status')->unsigned()->default(0);
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
        //
    }
}
