<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_convenio');
            $table->longText('empresa');
            $table->string('codigo_reserva');
            $table->integer('habitaciones_disponibles')->default(1);
            $table->dateTime('window_open');
            $table->dateTime('window_close');
            $table->dateTime('startDate');
            $table->dateTime('endDate');
            $table->double('tarifa');
            $table->double('tarifa_x_pax');
            $table->double('desayuno_adulto')->nullable();
            $table->double('desayuno_infante')->nullable();
            $table->boolean('incluye_alimentos');
            $table->boolean('pago_destino');

            $table->foreignId('hotel_id')
                ->constrained('hoteles')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('habitacion_id')
                ->constrained('habitaciones')
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
        Schema::dropIfExists('grupos');
    }
}
