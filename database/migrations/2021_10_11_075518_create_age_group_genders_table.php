<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgeGroupGendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('age_group_genders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('age_group_event_id')->unsigned();
            $table->foreign('age_group_event_id')->references('id')->on('age_group_event');
            $table->bigInteger('gender_id')->unsigned();
            $table->foreign('gender_id')->references('id')->on('genders');
            $table->bigInteger('judge_id')->nullable()->unsigned();
            $table->foreign('judge_id')->references('id')->on('users');
            $table->bigInteger('starter_id')->nullable()->unsigned();
            $table->foreign('starter_id')->references('id')->on('users');
            $table->bigInteger('venue_detail_id')->nullable()->unsigned();
            $table->foreign('venue_detail_id')->references('id')->on('venue_details');
            $table->boolean('status')->default(2);
            $table->time('time');
            $table->boolean('prize_given')->default(0);
            $table->date('heats_final_date')->nullable();
            $table->time('starting_time');
            $table->time('ending_time');
            $table->integer('field_events');
            $table->integer('track_events');
            $table->integer('total_events');
            $table->string('first_place')->nullable();
            $table->string('second_place')->nullable();
            $table->string('third_place')->nullable();
            $table->string('group_first_place')->nullable();
            $table->string('group_second_place')->nullable();
            $table->string('group_third_place')->nullable();
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
        Schema::dropIfExists('age_group_genders');
    }
}
