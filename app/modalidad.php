<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modalidad extends Model
{
    protected $table="modalidad";
    protected $primaryKey="moda_id";
    protected $fillable = [
        'id', 'descripcion'
    ];
}
