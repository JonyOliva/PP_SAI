<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Carreras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carreras', function (Blueprint $table) {
            $table->string('carr_id',10);
            $table->string('carr_idtipocarrera',10);
            $table->string('carr_codigointerno',10);
            $table->string('carr_descripcion',50);
            $table->string('carr_idinscripcion',10);
            $table->string('carr_baja',1);
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carreras');
    }
}
