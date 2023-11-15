<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentPadre extends Model
{
    use HasFactory;

    protected $table='document_padre';

    protected $primaryKey='id_doc';

    public $timestamps=false;

    protected $fillable =[
    	'id_padre',
        'titulo',
        'archivo',
        'fecha',
    ];

    protected $guarded =[
    ];
}
