<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lenguaje_Programacion extends Model
{
    protected $table='lenguaje_programacion';
    public $timestamps=false;
    protected $fillable=[
        'id_lenguaje', 'descripcion_lp'
    ];

    protected $primaryKey='id_lenguaje';
}
