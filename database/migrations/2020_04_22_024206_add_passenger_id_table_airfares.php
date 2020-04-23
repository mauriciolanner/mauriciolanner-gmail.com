<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPassengerIdTableAirfares extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('airfares', function (Blueprint $table) {
            $table->unsignedBigInteger('passenger_id')->nullable()->after('checkin');
            $table->foreign('passenger_id')->references('id')->on('passengers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('airfares', function (Blueprint $table) {
            $table->unsignedBigInteger('passenger_id');
        });
    }
}
