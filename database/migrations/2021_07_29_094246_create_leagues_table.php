<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaguesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leagues', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('sports_category_id')->unsigned();
            $table->foreign('sports_category_id')->references('id')->on('sports_categories');
            $table->bigInteger('venue_id')->unsigned();
            $table->foreign('venue_id')->references('id')->on('venues');
            $table->bigInteger('organization_id')->unsigned();
            $table->foreign('organization_id')->references('id')->on('organizations');
            $table->bigInteger('season_id')->unsigned();
            $table->foreign('season_id')->references('id')->on('seasonss');
            $table->date('from_date');
            $table->date('to_date');
            $table->date('reg_start_date');
            $table->date('reg_end_date');
            $table->boolean('champions')->nullable();
            $table->integer('tracks')->nullable();
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
        Schema::dropIfExists('leagues');
    }
}
