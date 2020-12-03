<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CarrerasTurnos extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('carreras_turnos', function (Blueprint $table) {
            $table->string('catu_id',10);
            $table->string('catu_idinscripcion',10);
            $table->string('catu_idturno',10);
        });
    }
 
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carreras_turnos');
    }
}
