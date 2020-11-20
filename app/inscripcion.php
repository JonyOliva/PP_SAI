<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inscripcion extends Model
{
    
    protected $table="datos_inscripcion";
    protected $primaryKey="insc_id";
    protected $fillable = [
        'id', 'fechaInscripcion', 'password', 'idCarrera','idAnexo' ,'idModalidad','legajo','idTurno','numPreInscripcion','idInstancia','numInscripcion','estado'
    ];
}
