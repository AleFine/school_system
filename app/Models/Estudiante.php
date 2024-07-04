<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;
    protected $table = 'estudiantes';
    protected $primaryKey = 'id_estudiante';
    public $timestamps=false;
    protected $fillable = [
        'nombre_estudiante', 'apellido_estudiante', 'fechaNacimiento', 'DNI',
        'genero', 'pais', 'region', 'ciudad', 'distrito', 'estado_civil', 'telefono'
    ];
}
