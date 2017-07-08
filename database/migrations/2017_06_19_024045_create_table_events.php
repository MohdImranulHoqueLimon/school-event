<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title');
            $table->text('description');
            $table->integer('amount');
            $table->boolean('fixed_amount')->default(true);
            $table->integer('guest_amount')->nullable();
            $table->boolean('guest_allow')->default(false);
            $table->integer('created_by')->unsigned()->default(0);
            $table->boolean('status')->default(false);
            $table->dateTime('event_date');
            $table->dateTime('last_registration_date');
            $table->timestamps();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('events');
    }
}
