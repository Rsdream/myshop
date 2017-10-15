<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionTable extends Migration
{
    /**
     * Run the migrations.
     *@author kjw <[kjwlaravel@163.com]>
     * @return void
     */
    public function up()
    {
        //订单评论
        Schema::create('collection_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gid')->unsigned();
            $table->string('gname');
            $table->string('gpic');
            $table->integer('workoff')->unsigned();
            $table->integer('status')->unsigned();
            $table->integer('uid')->nullable();
            $table->integer('price')->nullable();
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
