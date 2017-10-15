<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderBack extends Migration
{
    /**
     * Run the migrations.
     *@author kjw <[kjwlaravel@163.com]>
     * @return void
     */
    public function up()
    {
        //订单评论
        Schema::create('orders_back', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bid')->unsigned();           
            $table->string('comment');
            $table->integer('number')->nullable();
            $table->integer('status')->default(0);
            $table->integer('addtime')->nullable();
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
        Schema::dropIfExists('collection');
    }
}