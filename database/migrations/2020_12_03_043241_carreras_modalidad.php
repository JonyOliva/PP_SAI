<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CarrerasModalidad extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
       Schema::create('carreras_modalidad', function (Blueprint $table) {
           $table->string('camo_id',10);
           $table->string('camo_idinscripcion',10);
           $table->string('camo_idmodalidad',10);
       });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
       Schema::dropIfExists('carreras_modalidad');
   }
}
