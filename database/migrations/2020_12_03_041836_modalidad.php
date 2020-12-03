<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Modalidad extends Migration
{
  /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('modalidad', function (Blueprint $table) {
            $table->string('moda_id',10);
            $table->string('moda_descripcion',50);
            $table->string('moda_baja',1);
        });
    }
 
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modalidad');
    }
}
