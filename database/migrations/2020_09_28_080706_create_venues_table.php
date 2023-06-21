<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venues', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('location');
            // $table->integer('tracks');
            $table->string('email');
            $table->string('city');
            $table->integer('tp')->nullable();
            $table->integer('mobile');
            $table->string('map')->nullable();
            $table->float('latitude')->nullable();
            $table->float('longitude')->nullable(); 
            $table->string('state')->nullable(); 
            $table->bigInteger('organization_id')->nullable()->unsigned();
            $table->foreign('organization_id')->references('id')->on('organizations');
            $table->bigInteger('season_id')->nullable()->unsigned();
            $table->foreign('season_id')->references('id')->on('seasonss');
            $table->string('person_name');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('venues');
    }
}
