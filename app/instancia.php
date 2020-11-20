<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class instancia extends Model
{
    protected $primaryKey="inst_id";
    protected $fillable = [
        'inst_id', 'idInscripcion', 'descripcion', 'anio','numInscripcion' ,'estado','fechaInicio','fechaFin'
    ];
}
