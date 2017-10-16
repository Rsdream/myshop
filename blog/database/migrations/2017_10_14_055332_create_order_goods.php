<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderGoods extends Migration
{
    /**
     * Run the migrations.
     *@author kjw <[kjwlaravel@163.com]>
     * @return void
     */
    public function up()
    {
        //订单商品表
        Schema::create('orders_goods', function (Blueprint $table) {
            $table->increments('id');            
            $table->integer('oid');            
            $table->string('gid');
            $table->string('gname');
            $table->string('gpic');
            $table->string('setmeal')->nullable();
            $table->integer('gnum');
            $table->integer('gprice');
            $table->integer('status')->default(0);
            $table->integer('back_status')->default(0);
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
        Schema::dropIfExists('orders_goods');
    }
}
