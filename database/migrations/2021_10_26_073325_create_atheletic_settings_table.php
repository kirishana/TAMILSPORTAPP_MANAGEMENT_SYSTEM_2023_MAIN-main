<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtheleticSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atheletic_settings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('organization_id')->unsigned();
            $table->foreign('organization_id')->references('id')->on('organizations');
            $table->integer('field_events');
            $table->integer('track_events');
            $table->integer('total_events');
            $table->string('first_place')->nullable();
            $table->string('second_place')->nullable();
            $table->string('third_place')->nullable();
            $table->string('group_first_place')->nullable();
            $table->string('group_second_place')->nullable();
            $table->string('group_third_place')->nullable();
            $table->boolean('track_event_method')->nullable();
            $table->boolean('heat_method')->nullable();
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
        Schema::dropIfExists('atheletic_settings');
    }
}
