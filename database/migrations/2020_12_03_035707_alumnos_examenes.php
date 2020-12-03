<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlumnosExamenes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos_examenes', function (Blueprint $table) {
            $table->string('alex_idinstanciaalumno',10);
            $table->string('alex_idinstanciacurso',10);
            $table->string('alex_idmateria',10);
            $table->string('alex_idexamen',10);
            $table->integer('alex_calificacion');
      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos_examenes');
    }
}
