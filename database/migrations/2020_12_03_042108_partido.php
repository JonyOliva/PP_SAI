<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Partido extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
       Schema::create('partido', function (Blueprint $table) {
           $table->string('part_id',10);
           $table->string('part_descripcion',70);
           $table->string('part_baja',1);
           $table->string('part_idprovincia',10);
       });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
       Schema::dropIfExists('partido');
   }
}
