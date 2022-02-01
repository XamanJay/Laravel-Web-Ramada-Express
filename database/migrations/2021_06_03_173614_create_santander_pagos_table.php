<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSantanderPagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('santander_pagos', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->string('estatus');
            $table->string('folio');
            $table->string('auth');
            $table->string('cd_response');
            $table->string('cd_error');
            $table->string('hora');
            $table->dateTime('fecha');
            $table->string('merchant');
            $table->string('cc_type');
            $table->string('tp_operation');
            $table->string('cc_number');
            $table->double('amount');
            $table->string('id_url');
            $table->string('email');
            $table->string('name');
            $table->longText('encrypted_xml');
            $table->longText('xml_response');

            $table->foreignId('huesped_id')
                ->constrained('huespedes')
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
        Schema::dropIfExists('santander_pagos');
    }
}
