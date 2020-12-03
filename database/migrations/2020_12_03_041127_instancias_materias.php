<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InstanciasMaterias extends Migration
{ /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
       Schema::create('instancias_materias', function (Blueprint $table) {
           $table->string('inma_id',10);
           $table->string('inma_idinstancia',10);
           $table->string('inma_idmateria',10);
       });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
       Schema::dropIfExists('instancias_materias');
   }
}
