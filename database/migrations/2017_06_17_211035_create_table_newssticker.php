<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNewssticker extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newssticker', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title ');
            $table->text('description');
            $table->boolean('is_active')->default(1);
            $table->boolean('is_active_global')->default(0);
            $table->integer('created_by')->unsigned()->default(0);
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
        Schema::drop('newssticker');
    }
}
