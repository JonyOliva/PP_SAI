<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CursosMaterias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos_materias', function (Blueprint $table) {
            $table->string('cuma_idinstanciacurso',10);
            $table->string('cuma_idmateria',10);
            $table->string('cuma_aprobacion',30);
            $table->integer('cuma_cantexamenes');
            $table->string('cuma_estado',15);

     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos_materias');
    }
}
