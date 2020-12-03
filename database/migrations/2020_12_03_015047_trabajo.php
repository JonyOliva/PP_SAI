<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Trabajo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_trabajo', function (Blueprint $table) {
            $table->string('datr_idinscripcion',10);
            $table->string('datr_trabaja',2);
            $table->string('datr_ocupacion',100);
            $table->string('datr_horassemanales',15);
            $table->string('datr_relacion',20);
            $table->string('datr_empresa',70);
            $table->string('datr_cargo',70);
     
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
    {
        Schema::dropIfExists('datos_trabajo');
    }
}
