<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanesXHabitacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planes_x_habitacion', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_es');
            $table->string('nombre_en');
            $table->longText('desc_es')->nullable();
            $table->longText('desc_en')->nullable();
            $table->double('desayuno_adulto')->default(0);
            $table->double('desayuno_infante')->default(0);
            $table->boolean('isDesayuno')->default(FALSE);
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
        Schema::dropIfExists('planes_x_habitacion');
    }
}
