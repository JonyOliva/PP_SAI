<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Instancias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Instancias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('idInscripcion');
            $table->string('descripcion');
            $table->string('anio');
            $table->string('numInscripcion');
            $table->string('estado');
            $table->string('fechaInicio');
            $table->string('fechaFin');
            $table->rememberToken();
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
        Schema::dropIfExists('Instancias');
    }
}
