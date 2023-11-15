<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docentes extends Model
{
    use HasFactory;

    protected $table='docente';

    protected $primaryKey='id_docente';

    public $timestamps=false;

    protected $fillable =[
    	
    ];

    protected $guarded =[
    ];
}
