<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->time('time_from', 0);
            $table->time('time_to', 0);
            $table->unsignedBigInteger('from');
            $table->foreign('from')->references('id')->on('airport');
            $table->unsignedBigInteger('to');
            $table->foreign('to')->references('id')->on('airport');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flights');
    }
}
