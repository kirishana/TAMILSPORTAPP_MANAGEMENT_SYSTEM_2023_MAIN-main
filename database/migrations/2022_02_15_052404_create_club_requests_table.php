<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClubRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');  
            $table->bigInteger('old_club_id')->unsigned();
            $table->foreign('old_club_id')->references('id')->on('clubs');  
            $table->bigInteger('new_club_id')->unsigned();
            $table->foreign('new_club_id')->references('id')->on('clubs');  
            $table->boolean('status')->default(0);
            $table->string('userIds');
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
        Schema::dropIfExists('club_requests');
    }
}
