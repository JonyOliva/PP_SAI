<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InstanciasAnexos extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instancias_anexos', function (Blueprint $table) {
            $table->string('inan_id',10);
            $table->string('inan_idinstancia',10);
            $table->string('inan_idanexo',10);
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instancias_anexos');
    }
}
