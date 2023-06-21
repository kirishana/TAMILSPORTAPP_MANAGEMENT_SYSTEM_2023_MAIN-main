<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgeGroupGenderUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('age_group_gender_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('age_group_gender_id')->unsigned();
            $table->foreign('age_group_gender_id')->references('id')->on('age_group_genders');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('league_id')->unsigned();
            $table->foreign('league_id')->references('id')->on('leagues');
            $table->string('time');
            $table->string('one')->nullable();
            $table->string('two')->nullable();
            $table->string('third')->nullable();
            $table->string('marks')->nullable();
            $table->boolean('prize_given')->default(0);
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
        Schema::dropIfExists('age_group_gender_user');
    }
}
