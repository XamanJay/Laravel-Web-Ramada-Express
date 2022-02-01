<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHabitacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habitaciones', function (Blueprint $table) {
            $table->id();
            $table->boolean('isTarifaMagica')->default(FALSE);
            $table->boolean('incluye_alimentos')->default(FALSE);
            $table->boolean('pago_x_destino')->default(FALSE);
            $table->integer('porcentaje')->default(0);
            $table->bigInteger('stock');
            $table->double('total')->default(0);
            $table->double('precio_desayuno_adulto')->default(0);
            $table->double('precio_desayuno_infante')->default(0);
            $table->double('precio_adulto')->default(0);
            $table->double('precio_infante')->default(0);
            $table->foreignId('hotel_id')
                ->constrained('hoteles')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('plan_habitacion_id')
                ->constrained('planes_x_habitacion')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('categoria_habitacion_id')
                ->constrained('categorias_x_habitacion')
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
        Schema::dropIfExists('habitaciones');
    }
}
