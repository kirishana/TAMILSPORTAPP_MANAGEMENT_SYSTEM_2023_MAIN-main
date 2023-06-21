<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('organization_id')->unsigned();
            $table->foreign('organization_id')->references('id')->on('organizations');
            $table->bigInteger('season_id')->unsigned();
            $table->foreign('season_id')->references('id')->on('seasonss');
            $table->bigInteger('league_id')->unsigned();
            $table->foreign('league_id')->references('id')->on('leagues');
            $table->integer('gender');
            $table->integer('self_reg');
            $table->integer('inv_no');
            $table->integer('is_approved');
            $table->integer('payment_method');
            $table->float('totalfee');
            $table->integer('discount')->default(0);
            $table->boolean('status')->default(0);
            $table->string('trans_id');
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
        Schema::dropIfExists('registrations');
    }
}
