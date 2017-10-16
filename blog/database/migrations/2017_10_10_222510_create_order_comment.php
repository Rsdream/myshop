<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderComment extends Migration
{
    /**
     * Run the migrations.
     *@author kjw <[kjwlaravel@163.com]>
     * @return void
     */
    public function up()
    {
        //订单评论
        Schema::create('orders_comment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gid')->unsigned();
            $table->integer('uid')->unsigned();
            $table->string('comment');
            $table->integer('number')->nullable();
            $table->string('setmeal')->nullable();
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
        Schema::dropIfExists('orders_comment');
    }
}
