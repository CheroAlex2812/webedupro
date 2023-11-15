<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grados extends Model
{
    use HasFactory;

    protected $table='grado';

    protected $primaryKey='id_grado';

    public $timestamps=false;

    protected $fillable =[
    	
    ];

    protected $guarded =[
    ];
}
