<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travels', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('flights_id');
            $table->foreign('flights_id')->references('id')->on('flights');
            $table->unsignedBigInteger('airplane_id');
            $table->foreign('airplane_id')->references('id')->on('airplanes');
            $table->dateTime('date');
            $table->decimal('price_economics', 8, 2);
            $table->decimal('price_first_class', 8, 2);
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
        Schema::dropIfExists('travels');
    }
}
