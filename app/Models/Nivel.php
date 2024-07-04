<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    use HasFactory;

    protected $table = 'niveles';
    protected $primaryKey = 'id_nivel';

    protected $fillable = [
        'turno',
        'nombre_nivel',
    ];

    public function grados()
    {
        return $this->hasMany(Grado::class, 'id_nivel');
    }
}
