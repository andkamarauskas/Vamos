<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePassengersTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passengers_trips', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('passenger_id')->unsigned();
            $table->string('departure_city');
            $table->string('departure_address');
            $table->string('arrival_city');
            $table->string('arrival_address');
            $table->date('departure_date');
            $table->time('departure_time_from');
            $table->time('departure_time_to');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('passenger_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('passengers_trips');
    }
}
