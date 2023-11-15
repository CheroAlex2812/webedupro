<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Padres extends Model
{
    use HasFactory;

    protected $table='padres';

    protected $primaryKey='id_padre';

    public $timestamps=false;

    protected $fillable =[
    	'nombre_tutor',
        'apellidos_tutor',
        'nombre_padre',
        'nombre_madre',
        'profesion_padre',
        'profesion_madre',
        'email',
        'telefono',
        'direccion',
        'fecha_creacion',
        'dni',
        'password',
        'imagen',
        'estado',
    ];

    protected $guarded =[
    ];
}
