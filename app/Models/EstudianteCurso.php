<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstudianteCurso extends Model
{
    protected $table = 'estudiante_curso'; // Nombre de la tabla
    protected $fillable = ['id_curso', 'id_estudiante', 'notaUnidad1', 'notaUnidad2', 'notaUnidad3'];

    public $incrementing = false; // Indica que no hay una columna auto-incremental

    protected $primaryKey = ['id_curso', 'id_estudiante']; // Define las claves primarias si son compuestas

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'id_estudiante');
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'id_curso');
    }
}


