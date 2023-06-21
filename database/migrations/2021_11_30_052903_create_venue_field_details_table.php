<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVenueFieldDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venue_field_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('venue_id')->unsigned();
            $table->foreign('venue_id')->references('id')->on('venues');
            $table->string('field_event_name');
           
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
        Schema::dropIfExists('venue_field_details');
    }
}
