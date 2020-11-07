<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class carrera extends Model
{


    protected $table="carreras";
    protected $fillable = [
        'id', 'idTipo', 'codigoInterno', 'descripcion','idInscripcion'
    ];
}
