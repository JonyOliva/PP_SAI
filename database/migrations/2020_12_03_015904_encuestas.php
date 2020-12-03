<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Encuestas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_encuestas', function (Blueprint $table) {
            $table->string('daen_idinscripcion',10);
            $table->string('daen_tipoenc',25);
            $table->string('daen_selecenc',25);
            $table->string('daen_otroenc',100);
           
        });
      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
    {
        Schema::dropIfExists('datos_encuestas');
    }
}
