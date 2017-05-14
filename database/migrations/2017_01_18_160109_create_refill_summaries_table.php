<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefillSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refill_summaries', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('total_refill')->default(0);
            $table->unsignedSmallInteger('week');
            $table->unsignedSmallInteger('month');
            $table->unsignedSmallInteger('year');
            $table->date('refill_date');
            $table->unsignedInteger('user_id');
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
        Schema::dropIfExists('refill_summaries');
    }
}
