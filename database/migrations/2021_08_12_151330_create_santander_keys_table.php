<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSantanderKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('santander_keys', function (Blueprint $table) {
            $table->id();
            $table->longText('id_company');
            $table->longText('id_sucursal');
            $table->longText('user');
            $table->longText('pass_user');
            $table->longText('semilla_xml');
            $table->longText('llave_comercial');
            $table->string('ambiente');
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
        Schema::dropIfExists('santander_keys');
    }
}
