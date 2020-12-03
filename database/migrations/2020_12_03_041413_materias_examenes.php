<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MateriasExamenes extends Migration
{ /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
       Schema::create('materias_examenes', function (Blueprint $table) {
           $table->string('maex_idinstanciacurso',10);
           $table->string('maex_idmateria',10);
           $table->string('maex_idexamen',10);
           $table->string('maex_descripcion',100);
           $table->string('maex_descripcioncorta',10);
           $table->string('maex_tipoexamen',30);
           $table->string('maex_calificacion',15);
           $table->string('maex_aprobacion',15);
           $table->date('maex_fecha');
           $table->string('maex_recupera',10);
           $table->string('maex_recuperacual',10);
           $table->integer('maex_orden');
           $table->string('maex_estado',15);
       });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
       Schema::dropIfExists('materias_examenes');
   }
}
