<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uid', 120)->unique('uid');
            $table->string('pass');
            $table->string('name')->nullable()->index('name');
            $table->smallInteger('sex')->nullable()->default(1);
            $table->string('phone', '11');
            $table->string('email')->nullable();
            $table->integer('score')->default(0);
            $table->smallInteger('status')->default(1);
            $table->integer('growth')->default(0);
            $table->integer('addtime')->nullable();
            $table->integer('lasttime');
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
        Schema::dropIfExists('home_user');
    }
}
