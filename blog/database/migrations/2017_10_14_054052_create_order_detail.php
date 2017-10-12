<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetail extends Migration
{
    /**
     * Run the migrations.
     *@author kjw <[kjwlaravel@163.com]>
     * @return void
     */
    public function up()
    {
        //订单表
        Schema::create('orders_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number')->unique();
            $table->integer('uid');
            $table->string('address');
            $table->integer('addtime')->unsigned();
            $table->integer('tpeicr')->unsigned();
            $table->string('name');
            $table->string('phone');
            $table->string('text')->nullable();
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
        Schema::dropIfExists('orders_detail');
    }
}
