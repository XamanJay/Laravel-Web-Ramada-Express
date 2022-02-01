<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriasXHabitacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias_x_habitacion', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_es');
            $table->string('nombre_en');
            $table->longText('desc_es')->nullable();
            $table->longText('desc_en')->nullable();
            $table->double('plus_tarifa_base');
            $table->double('plus_x_pax');
            $table->enum('modificador',['USD','%']);
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
        Schema::dropIfExists('categorias_x_habitacion');
    }
}
