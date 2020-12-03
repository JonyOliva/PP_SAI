<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InstanciasTurnos extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instancias_turnos', function (Blueprint $table) {
            $table->string('intu_id',10);
            $table->string('intu_idinstancia',10);
            $table->string('intu_idturno',10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instancias_turnos');
    }
}
