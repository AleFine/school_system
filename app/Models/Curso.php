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
        'id_seccion',
        'id_trabajador',
    ];

    public function seccion()
    {
        return $this->belongsTo(Seccion::class, 'id_seccion');
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
        return $this->hasMany(Notas::class, 'id_curso', 'id_curso');
    }


}
