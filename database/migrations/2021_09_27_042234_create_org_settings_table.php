<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrgSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('org_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('organization_id')->unsigned();
            $table->foreign('organization_id')->references('id')->on('organizations');
            $table->string('org_logo')->nullable();
            $table->string('header')->nullable();
            $table->longText('footer', 4000000000)->nullable();
            $table->string('player_number_logo')->nullable();
            $table->string('invoice_logo')->nullable();
            $table->string('staff_id')->nullable();
            $table->string('extra_question')->nullable();
            $table->longText('yes',4000000000)->nullable();
            $table->longText('no',4000000000)->nullable();
            $table->boolean('active')->default(0);
            $table->longText('terms_conditions',4000000000)->nullable();
            $table->integer('discount');
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
        Schema::dropIfExists('org_settings');
    }
}
