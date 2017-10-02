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
            $table->timestamps();             
        });        

        //订单商品表
        Schema::create('orders_goods', function (Blueprint $table) {
            $table->increments('id');            
            $table->integer('oid');            
            $table->string('gid');
            $table->string('gname');
            $table->string('gpic');
            $table->integer('gnum');
            $table->integer('gprice');
            $table->timestamps();             
        });


        //订单评论表
        Schema::create('orders_comment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orders_id')->unsigned();
            $table->string('comment');
            $table->timestamps();

            $table->foreign('orders_id')
                  ->references('id')->on('orders_comment')
                  ->onUpdate('cascade')->onDelete('cascade');
        });
        
        

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::drop('orders_comment');
        Schema::drop('orders_detail');        
        Schema::drop('orders_address');
    }
}
