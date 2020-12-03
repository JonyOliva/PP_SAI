<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InstanciaCursos extends Migration
{ /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
       Schema::create('instancia_cursos', function (Blueprint $table) {
           $table->string('incu_id',10);
           $table->string('incu_idinstancia',10);
           $table->string('incu_descripcion',100);
           $table->integer('incu_cupomax');
           $table->integer('incu_cupomin');
           $table->integer('incu_cantidad');
           $table->string('incu_estado',15);

       
       });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
       Schema::dropIfExists('instancia_cursos');
   }
}
