<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmenidadesXHotelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amenidades_x_hotel', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_es');
            $table->string('nombre_en');
            $table->longText('desc_es')->nullable();
            $table->longText('desc_en')->nullable();
            $table->string('apertura');
            $table->string('cierre');
            $table->string('dias_laborales');
            $table->json('galeria');
            $table->string('tag_es');
            $table->string('tag_en');
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
        Schema::dropIfExists('amenidades_x_hotel');
    }
}
