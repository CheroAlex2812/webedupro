<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentDocente extends Model
{
    use HasFactory;

    protected $table='document_docente';

    protected $primaryKey='id_doc';

    public $timestamps=false;

    protected $fillable =[
    	'id_docente',
        'titulo',
        'archivo',
        'fecha',
    ];

    protected $guarded =[
    ];
}
