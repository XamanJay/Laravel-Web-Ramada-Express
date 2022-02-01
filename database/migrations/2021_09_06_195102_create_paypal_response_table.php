<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaypalResponseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paypal_response', function (Blueprint $table) {
            $table->id();
            $table->string('paymentId');
            $table->string('payerId');
            $table->string('token');
            $table->string('state');
            $table->string('cart');
            $table->string('payer_email');
            $table->string('payer_name');
            $table->string('payer_lastname');
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
        Schema::dropIfExists('paypal_response');
    }
}
