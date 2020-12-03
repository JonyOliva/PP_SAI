<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsuariosCarrera extends Migration
{
  /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('usuarios_carrera', function (Blueprint $table) {
            $table->string('usca_id',10);
            $table->string('usca_idusuario',10);
            $table->string('usca_idcarrera',10);
        });
    }
 
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios_carrera');
    }
}
