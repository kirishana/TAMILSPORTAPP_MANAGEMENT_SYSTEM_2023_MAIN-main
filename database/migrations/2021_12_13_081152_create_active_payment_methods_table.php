<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivePaymentMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('active_payment_methods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('organization_id')->unsigned()->nullable();
            $table->foreign('organization_id')->references('id')->on('organizations');
            $table->boolean('status')->nullable();
            $table->bigInteger('bank_transfer_id')->unsigned()->nullable();
            $table->foreign('bank_transfer_id')->references('id')->on('bank_transfer');
            $table->bigInteger('vipps_id')->unsigned()->nullable();
            $table->foreign('vipps_id')->references('id')->on('vipps');
            $table->bigInteger('stripe_id')->unsigned()->nullable();
            $table->foreign('stripe_id')->references('id')->on('stripe');
            $table->bigInteger('qr_payment_id')->unsigned()->nullable();
            $table->foreign('qr_payment_id')->references('id')->on('qr_payments');
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
        Schema::dropIfExists('active_payment_methods');
    }
}
