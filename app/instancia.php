<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class instancia extends Model
{
    protected $table="instancias";
    protected $fillable = [
        'id', 'idInscripcion', 'descripcion', 'anio','numInscripcion' ,'estado','fechaInicio','fechaFin'
    ];
}
