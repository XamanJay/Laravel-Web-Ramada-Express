<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaquetesTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paquetes_transfers', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_es');
            $table->string('nombre_en');
            $table->longText('desc_es');
            $table->longText('desc_en');
            $table->double('tarifa_x_adulto_usd');
            $table->double('tarifa_x_infante_usd');
            $table->string('tag_paquete_transfer');
            $table->foreignId('hotel_id')
                ->constrained('hoteles')
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
        Schema::dropIfExists('paquetes_transfers');
    }
}
