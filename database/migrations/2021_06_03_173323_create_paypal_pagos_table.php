<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaypalPagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paypal_pagos', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->integer('item_number');
            $table->string('payment_amount');
            $table->string('payment_currency');
            $table->string('txn_id');
            $table->string('receiver_email');
            $table->string('payer_email');
            $table->dateTime('fecha_pago');
            $table->longText('full_response');
            $table->string('idaff');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paypal_pagos');
    }
}
