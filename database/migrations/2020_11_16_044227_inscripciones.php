<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Inscripciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Inscripciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fechaInscripcion');
            $table->string('password');
            $table->string('idCarrera');
            $table->string('idAnexo');
            $table->string('idModalidad');
            $table->string('legajo');
            $table->string('idTurno');
            $table->string('numPreInscripcion');
            $table->string('idInstancia');
            $table->string('numInscripcion');
            $table->string('estado');
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
        Schema::dropIfExists('Inscripciones');
    }
}
