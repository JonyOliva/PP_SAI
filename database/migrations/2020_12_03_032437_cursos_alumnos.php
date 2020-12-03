<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CursosAlumnos extends Migration
{
       /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos_alumnos', function (Blueprint $table) {
            $table->string('cual_idinscripcion',10);
            $table->string('cual_estudioscursados',25);
            $table->string('cual_idtitulo',10);
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos_alumnos');
    }
}
