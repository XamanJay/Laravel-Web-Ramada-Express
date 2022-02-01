<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmenidadesXCategoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amenidades_x_categoria', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categoria_habitacion_id')
                ->constrained('categorias_x_habitacion')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('amenidad_id')
                ->constrained('amenidades_x_cuarto')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('amenidades_x_categoria');
    }
}
