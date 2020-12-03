<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlumnosMaterias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos_materias', function (Blueprint $table) {
            $table->string('alma_idinstanciaalumno',10);
            $table->string('alma_idinstanciacurso',10);
            $table->string('alma_idmateria',10);
            $table->integer('alma_cantpres');
            $table->integer('alma_cantaus');
            $table->integer('alma_canttotal');
            $table->integer('alma_asistenciaporc');
            $table->string('alma_estado',20);
            $table->string('alma_cursado',20);
            $table->integer('alma_notafinal');
      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos_materias');
    }
}
