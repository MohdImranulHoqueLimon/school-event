<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('role');
            $table->integer('batch');
            $table->string('country');
            $table->string('phone')->unique();
            $table->string('emergency_phone');
            $table->string('email')->unique();
            $table->string('address');
            $table->string('city')->nullable();
            $table->string('password')->nullable();
            $table->boolean('status')->default(1);
            $table->string('user_image')->nullable();
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
