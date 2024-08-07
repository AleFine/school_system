<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'cursos';
    protected $primaryKey = 'id_curso';

    protected $fillable = [
        'nombre_curso',
        'id_grado',
        'id_trabajador',
    ];

    public function grado()
    {
        return $this->belongsTo(Grado::class, 'id_grado');
    }

    public function trabajador()
    {
        return $this->belongsTo(Personal::class, 'id_trabajador');
    }

    public function detalleCursos()
    {
        return $this->hasMany(DetalleCurso::class, 'id_curso');
    }

    public function estudiantes()
    {
        return $this->belongsToMany(Estudiante::class, 'estudiante_curso', 'id_curso', 'id_estudiante')
                    ->withPivot('notaUnidad1', 'notaUnidad2', 'notaUnidad3');
    }

    public function Competencia()
    {
        return $this->belongsToMany(Competencia::class, 'detalle_cursos', 'id_curso', 'id_competencia');
    }
}
