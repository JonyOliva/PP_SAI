<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Instancias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instancias', function (Blueprint $table) {
            $table->string('inst_id',10);
            $table->string('inst_idinscripcion',10);
            $table->string('inst_descripcion',70);
            $table->string('inst_anio',4);
            $table->string('inst_nroinscripcion',5);
            $table->string('inst_estado',20);
            $table->date('inst_fechainicio');
            $table->date('inst_fechafin');
         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instancias');
    }
}
