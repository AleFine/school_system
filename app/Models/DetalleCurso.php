<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCurso extends Model
{
    use HasFactory;

    protected $table = 'detalle_cursos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_curso',
        'id_competencia',
        'nro_orden',
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'id_curso');
    }

    public function competencia()
    {
        return $this->belongsTo(Competencia::class, 'id_competencia');
    }
}
