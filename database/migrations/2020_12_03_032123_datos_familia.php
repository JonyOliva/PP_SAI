<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DatosFamilia extends Migration
{
       /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_familia', function (Blueprint $table) {
            $table->string('dafa_idinscripcion',10);
            $table->string('dafa_padre',2);
            $table->string('dafa_padreestudios',20);
            $table->string('dafa_padreocupacion',70);
            $table->string('dafa_madre',2);
            $table->string('dafa_madreestudios',20);
            $table->string('dafa_madreocupacion',70);
            $table->string('dafa_conyugeestudios',20);
            $table->string('dafa_conyugeocupacion',70);

         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datos_familia');
    }
}
