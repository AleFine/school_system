<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = 'departamentos';
    protected $primaryKey = 'id_departamento';

    protected $fillable = [
        'nombre_departamento',
        'descripcion',
    ];

    public function trabajadores()
    {
        return $this->hasMany(Personal::class, 'id_departamento');
    }
}
