<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NrosInscripcion extends Migration
{
  /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('nros_inscripcion', function (Blueprint $table) {
            $table->string('nrin_id',10);
            $table->string('nrin_idinscripcion',10);
            $table->integer('nrin_anio');
            $table->integer('nrin_nroinscripcion');
            $table->string('nrin_estado',10);
            $table->string('nrin_descripcion',70);

        });
    }
 
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nros_inscripcion');
    }
}
