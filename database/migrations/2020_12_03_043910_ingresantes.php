<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ingresantes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingresantes', function (Blueprint $table) {
            $table->integer('dain_nroinscripcion');
            $table->string('dape_apellido',70);
            $table->string('dape_nombre',50);
            $table->string('dape_tipodoc',10);
            $table->string('dape_nrodoc',8);
            $table->string('dape_calle',50);
            $table->string('dape_nrocalle',5);
            $table->string('dape_piso',2);
            $table->string('dape_dpto',10);
            $table->string('loca_descripcion',70);
            $table->string('prov_descripcion',50);
            $table->string('part_descripcion',70);
            $table->string('pais_descripcion',70);
            $table->string('dape_telparticular',15);
            $table->string('dape_celular',15);
            $table->string('dape_email',50);
            $table->date('dape_fechanac');
            $table->string('dape_idlocalidadnac',70);
            $table->string('dape_sexo',10);
            $table->string('dape_nacionalidad',15);
            $table->string('dape_estadocivil',20);
            $table->string('dape_hijos',2);
            $table->string('dape_cantidadhijos',2);
            $table->string('dape_edades',50);
            $table->string('dape_pais',10);
            $table->string('moda_descripcion',50);
            $table->string('carr_descripcion',50);
            $table->string('daes_estudioscursados',25);
            $table->string('titu_descripcion',70);
            $table->string('daes_dependencia',25);
            $table->string('daes_anioegreso',4);
            $table->string('cole_descripcion',70);
            $table->string('cole_direccion',70);
            $table->string('cole_telefono',30);
            $table->string('cole_email',50);
            $table->string('daes_cantanios',2);
            $table->string('daes_otrosestudios',15);
            $table->string('daes_otroscarrera',70);
            $table->string('daes_otrosestablecimiento',70);
            $table->string('daes_otrosestado',10);
            $table->string('daes_informatica',2);
            $table->string('daes_idioma',2);
            $table->string('daes_cual',50);
            $table->string('orie_descripcion',100);
            $table->string('datr_trabaja',2);
            $table->string('datr_ocupacion',100);
            $table->string('datr_horassemanales',15);
            $table->string('datr_relacion',20);
            $table->string('datr_empresa',70);
            $table->string('datr_cargo',70);
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
        Schema::dropIfExists('ingresantes');
    }
}
