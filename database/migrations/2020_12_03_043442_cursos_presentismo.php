<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CursosPresentismo extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
       Schema::create('cursos_presentismo', function (Blueprint $table) {
           $table->string('cupr_idinstanciaalumno',10);
           $table->string('cupr_idinstanciacurso',10);
           $table->date('cupr_fecha');
           $table->string('cupr_presentismo',1);
           $table->string('cupr_idmateria',10);
       });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
       Schema::dropIfExists('cursos_presentismo');
   }
}
