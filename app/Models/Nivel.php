<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    use HasFactory;

    // Si el nombre de la tabla no sigue la convención de pluralización
    protected $table = 'nivels';

    // Si el nombre de la clave primaria no es "id"
    protected $primaryKey = 'id_nivel';

    // Definir los atributos que se pueden asignar en masa
    protected $fillable = [
        'turno',
        'nombre_nivel',
    ];
}
