<?php

// App/Models/DetalleCurso.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleCurso extends Model
{
    protected $table = 'detalle_cursos';
    protected $fillable = ['id_curso', 'id_competencia', 'nro_orden'];

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'id_curso', 'id_curso');
    }

    public function competencia()
    {
        return $this->belongsTo(Competencia::class, 'id_competencia', 'id_competencia');
    }
}

