<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Localidad extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localidad', function (Blueprint $table) {
            $table->string('loca_id',10);
            $table->string('loca_idprovincia',10);
            $table->string('loca_idpartido',10);
            $table->string('loca_descripcion',70);
            $table->string('loca_cp',20);
            $table->string('loca_baja',1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('localidad');
    }
}
