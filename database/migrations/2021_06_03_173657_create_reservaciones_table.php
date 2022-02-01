<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservaciones', function (Blueprint $table) {
            $table->id();
            $table->boolean('pago_x_destino')->default(FALSE);
            $table->dateTime('checkIn');
            $table->dateTime('checkOut');
            $table->enum('plataforma',['whatsapp','web','iOS','android']);
            $table->integer('noches');
            $table->integer('habitaciones');
            $table->integer('adultos');
            $table->integer('infantes');
            $table->double('precio');
            $table->string('currency');
            $table->enum('estatus',['pendiente','aprobada','denegada','cancelada']);
            $table->longText('comentarios')->nullable();
            $table->string('metodo_pago')->default('pago_destino');
            $table->string('folio');

            $table->foreignId('huesped_id')
                ->constrained('huespedes')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('paypal_pago_id')
                ->nullable()
                ->constrained('paypal_pagos')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('santander_pago_id')
                ->nullable()
                ->constrained('santander_pagos')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('habitacion_id')
                ->constrained('habitaciones')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('user_id')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('transfer_id')
                ->nullable()
                ->constrained('transfers')
                ->onUpdate('cascade')
                ->onDelete('cascade');   

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
        Schema::dropIfExists('reservaciones');
    }
}
