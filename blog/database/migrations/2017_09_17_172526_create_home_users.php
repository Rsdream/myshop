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
            $table->integer('phone');
            $table->string('email');
            $table->string('address')->nullable()->index('address');
            $table->integer('score')->default(0);
            $table->smallInteger('status')->default(1);
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
