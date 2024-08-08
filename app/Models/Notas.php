<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{
    use HasFactory;

    // Especificar la tabla si el nombre no sigue la convención
    protected $table = 'notas';

    // Especificar la clave primaria si no sigue la convención (opcional)
    protected $primaryKey = 'id_nota';

    // Indicar que la clave primaria es un entero
    protected $keyType = 'int';

    // Deshabilitar los timestamps si no los usas (opcional)
    public $timestamps = true;

    // Definir los atributos que son asignables en masa
    protected $fillable = [
        'id_curso',
        'id_estudiante',
        'notaUnidad1',
        'notaUnidad2',
        'notaUnidad3',
    ];

    // Definir la relación con el modelo Curso
    public function curso()
    {
        return $this->belongsTo(Curso::class, 'id_curso');
    }

    // Definir la relación con el modelo Estudiante
    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'id_estudiante');
    }
}
