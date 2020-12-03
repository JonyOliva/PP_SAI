<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DatosPersonales extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_personales', function (Blueprint $table) {
            $table->string('dape_idinscripcion',10);
            $table->string('dape_apellido',70);
            $table->string('dape_nombre',50);
            $table->string('dape_tipodoc',10);
            $table->string('dape_nrodoc',8);
            $table->string('dape_calle',50);
            $table->string('dape_nrocalle',5);
            $table->string('dape_piso',2);
            $table->string('dape_dpto',10);
            $table->string('dape_idlocalidad',10);
            $table->string('dape_telparticular',15);
            $table->string('dape_celular',15);
            $table->string('dape_email',50);
            $table->date('dape_fechanac');
            $table->string('dape_idlocalidadnac',70);
            $table->string('dape_sexo',10);
            $table->string('dape_nacionalidad',15);
            $table->string('dape_pais',10);
            $table->string('dape_estadocivil',20);
            $table->string('dape_hijos',2);
            $table->string('dape_cantidadhijos',2);
            $table->string('dape_edades',50);
            $table->string('dape_cuil',12);
            $table->string('dape_grupo',5);
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datos_personales');
    }
}
