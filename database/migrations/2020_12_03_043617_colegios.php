<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Colegios extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('colegios', function (Blueprint $table) {
            $table->string('cole_id',10);
            $table->string('cole_descripcion',70);
            $table->string('cole_tipo',25);
            $table->string('cole_direccion',70);
            $table->string('cole_idlocalidad',10);
            $table->string('cole_telefono',30);
            $table->string('cole_email',50);
            $table->string('cole_codespecial',20);
            $table->string('cole_baja',1);
            $table->string('cole_nivel',20);
    
        });
    }
 
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colegios');
    }
}
