<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInquariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('organization_id')->nullable()->unsigned();
            $table->foreign('organization_id')->references('id')->on('organizations');
            $table->bigInteger('club_id')->nullable()->unsigned();
            $table->foreign('club_id')->references('id')->on('clubs');
            $table->boolean('status')->nullable();
            $table->boolean('leave_or_delete')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inquaries');
    }
}
