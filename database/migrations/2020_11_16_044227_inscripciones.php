<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Inscripciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_inscripcion', function (Blueprint $table) {
            $table->string('dain_id',10);
            $table->date('dain_fechainscripcion',);
            $table->string('dain_idcarrera',10);
            $table->string('dain_idanexo',10);
            $table->string('dain_idodalidad',10);
            $table->string('dain_legajo',15);
            $table->string('dain_idturno',255);
            $table->string('dain_nropreinscripcion',50);
            $table->string('dain_idinstancia',10);
            $table->integer('dain_nroinscripcion');
            $table->string('dain_estado',20);
 
        });
       
    }
 
    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
    {
        Schema::dropIfExists('datos_inscripcion');
    }
}
