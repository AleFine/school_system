<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class EstudianteCurso extends Pivot
{
    protected $table = 'estudiante_curso';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_curso',
        'id_estudiante',
        'notaUnidad1',
        'notaUnidad2',
        'notaUnidad3',
    ];

    // Si deseas definir la clave primaria compuesta, puedes hacer lo siguiente:
    protected $primaryKey = ['id_curso', 'id_estudiante'];

    // Método para obtener el estudiante relacionado
    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'id_estudiante');
    }

    // Método para obtener el curso relacionado
    public function curso()
    {
        return $this->belongsTo(Curso::class, 'id_curso');
    }
}
