<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CarrerasAnexo extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carreras_anexo', function (Blueprint $table) {
            $table->string('caan_id',10);
            $table->string('caan_idinscripcion',10);
            $table->string('caan_idanexo',10);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carreras_anexo');
    }
}
