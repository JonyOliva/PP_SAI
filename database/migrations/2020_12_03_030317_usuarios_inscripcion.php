<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsuariosInscripcion extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_inscripcion', function (Blueprint $table) {
            $table->string('usin_id',10);
            $table->string('usin_idUsuario',10);
            $table->string('usin_idinscripcion',10);
        
        });
   
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
    {
        Schema::dropIfExists('usuarios_inscripcion');
    }
}
