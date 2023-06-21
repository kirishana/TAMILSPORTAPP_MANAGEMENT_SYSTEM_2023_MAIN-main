<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_registrations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('club_id')->unsigned();
            $table->foreign('club_id')->references('id')->on('clubs');
            $table->bigInteger('event_id')->unsigned();
            $table->foreign('event_id')->references('id')->on('events');
            $table->bigInteger('organization_id')->unsigned();
            $table->foreign('organization_id')->references('id')->on('organizations');
            $table->bigInteger('season_id')->unsigned();
            $table->foreign('season_id')->references('id')->on('seasonss');
            $table->bigInteger('league_id')->unsigned();
            $table->foreign('league_id')->references('id')->on('leagues');
            $table->bigInteger('age_group_gender_id')->unsigned();
            $table->foreign('age_group_gender_id')->references('id')->on('age_group_genders');
            $table->float('totalfee');
            $table->boolean('status')->default(0);
            $table->string('trans_id')->deafult(0);
            $table->integer('payment_method');
            $table->integer('inv_no');
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
        Schema::dropIfExists('group_registrations');
    }
}
