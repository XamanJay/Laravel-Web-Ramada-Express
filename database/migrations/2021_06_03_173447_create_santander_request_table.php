<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSantanderRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('santander_request', function (Blueprint $table) {
            $table->id();
            $table->longText('xml_raw');
            $table->longText('xml_encrypted');

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
        Schema::dropIfExists('santander_request');
    }
}
