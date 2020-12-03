<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DatosEstudios extends Migration
{
      /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_estudios', function (Blueprint $table) {
            $table->string('daes_idinscripcion',10);
            $table->string('daes_estudioscursados',25);
            $table->string('daes_idtitulo',10);
            $table->string('daes_dependencia',25);
            $table->string('daes_anioegreso',4);
            $table->string('daes_idcolegio',10);
            $table->string('daes_cantanios',2);
            $table->string('daes_otrosestudios',15);
            $table->string('daes_otroscarrera',70);
            $table->string('daes_otrosestablecimiento',70);
            $table->string('daes_otrosestado',10);
            $table->string('daes_informatica',2);
            $table->string('daes_idioma',2);
            $table->string('daes_cual',50);
            $table->string('daes_idorientacion',10);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datos_estudios');
    }
}
