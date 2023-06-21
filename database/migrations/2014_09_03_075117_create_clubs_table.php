<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clubs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('club_name')->unique();
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('postal');
            $table->bigInteger('country_id')->nullable()->unsigned();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->integer('mobile');
            $table->integer('tpnumber')->nullable();
            $table->string('club_registation_num')->nullable();
            $table->string('club_email');
            $table->string('club_start_date')->nullable();
            $table->string('prefix');
            $table->boolean('is_approved')->default(2);
            $table->string('status')->nullable();
            $table->string('club_logo')->nullable();
            $table->bigInteger('season_id')->unsigned();
            $table->foreign('season_id')->references('id')->on('seasonss');
            $table->integer('user');
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
        Schema::dropIfExists('clubs');
    }
}
