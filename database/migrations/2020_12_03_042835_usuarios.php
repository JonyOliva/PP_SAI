<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Usuarios extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->string('usua_id',10);
            $table->string('usua_user',20);
            $table->string('usua_apellido',70);
            $table->string('usua_nombre',50);
            $table->string('usua_password',50);
            $table->string('usua_baja',1);
        });
    }
 
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
