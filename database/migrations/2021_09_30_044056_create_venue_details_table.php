<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVenueDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venue_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('venue_id')->unsigned();
            $table->foreign('venue_id')->references('id')->on('venues');
            $table->string('track_event_name');
            $table->string('max_length')->nullable();          
            $table->integer('track_event_count');
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
        Schema::dropIfExists('venue_details');
    }
}
