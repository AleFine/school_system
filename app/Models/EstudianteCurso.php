<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstudianteCurso extends Model
{
    protected $table = 'estudiante_curso';
    protected $primaryKey = null;
    public $incrementing = false;

    protected $fillable = [
        'id_curso',
        'id_estudiante',
        'notaUnidad1',
        'notaUnidad2',
        'notaUnidad3',
    ];
}
