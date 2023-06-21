<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('userId')->nullable();
            $table->date('dob');
            $table->boolean('is_approved')->default(2);
            $table->bigInteger('country_id')->nullable()->unsigned();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->bigInteger('organization_id')->nullable()->unsigned();
            $table->foreign('organization_id')->references('id')->on('organizations');
            $table->bigInteger('club_id')->nullable()->unsigned();
            $table->foreign('club_id')->references('id')->on('clubs');
            $table->bigInteger('season_id')->nullable()->unsigned();
            $table->foreign('season_id')->references('id')->on('seasonss');
            $table->string('email')->unique()->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('guardian_mail')->nullable();
            $table->string('guardian_number')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('gender')->nullable();
            $table->string('tel_number')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('postal')->nullable();
            $table->string('password')->nullable();
            $table->string('profile_pic')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('users');
            $table->boolean('first_login')->default(0);
            $table->boolean('member_or_not')->default(0);
            $table->integer('status')->default(1);
            $table->date('membership_updated_year');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
