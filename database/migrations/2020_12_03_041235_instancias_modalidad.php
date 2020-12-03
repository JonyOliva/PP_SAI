<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InstanciasModalidad extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instancias_modalidad', function (Blueprint $table) {
            $table->string('inmo_id',10);
            $table->string('inmo_idinstancia',10);
            $table->string('inmo_idmodalidad',10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instancias_modalidad');
    }
}
