<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modalidad extends Model
{
    protected $table="modalidad";
    protected $fillable = [
        'id', 'descripcion'
    ];
}
