<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Titulos extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('titulos', function (Blueprint $table) {
            $table->string('titu_id',10);
            $table->string('titu_descripcion',70);
            $table->string('titu_nivel',20);
            $table->string('titu_baja',1);
        });
    }
 
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('titulos');
    }
}
