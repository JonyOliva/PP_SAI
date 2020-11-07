<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class alumno extends Model
{
    protected $fillable = [
        'nombre', 'apellido', 'password', 'mail', 'telefono', 'celular', 'localidad','calle','numeroDireccion','carrera','numInscripcion',
    ];
}
