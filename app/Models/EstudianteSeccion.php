<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstudianteSeccion extends Model
{
    use HasFactory;

    protected $table = 'estudiante_seccion';
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'id_estudiante',
        'id_seccion',
    ];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'id_estudiante');
    }

    public function seccion()
    {
        return $this->belongsTo(Seccion::class, 'id_seccion');
    }
}
