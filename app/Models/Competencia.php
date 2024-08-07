<?php

// App/Models/Competencia.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Competencia extends Model
{
    protected $primaryKey = 'id_competencia';
    protected $fillable = ['descripcion'];

    public function detalleCursos()
    {
        return $this->hasMany(DetalleCurso::class, 'id_competencia', 'id_competencia');
    }

    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'detalle_cursos', 'id_competencia', 'id_curso');
    }
}

