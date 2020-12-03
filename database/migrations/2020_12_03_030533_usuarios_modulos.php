<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsuariosModulos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_modulos', function (Blueprint $table) {
            $table->string('usmo_id',10);
            $table->string('usmo_idusuario',10);
            $table->string('usmo_idmodulo',10);
            $table->string('usmo_alta',1);
            $table->string('usmo_baja',1);
            $table->string('usmo_modificacion',1);
            $table->string('usmo_lectura',1);
          
        });
   
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
    {
        Schema::dropIfExists('usuarios_modulos');
    }
}
