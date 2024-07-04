<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;

    protected $table = 'personal';
    protected $primaryKey = 'id_trabajador';

    protected $fillable = [
        'nombre_trabajador',
        'apellido_trabajador',
        'DNI',
        'direccion',
        'fechaIngreso',
        'fechaNacimiento',
        'telefono',
        'id_departamento',
    ];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'id_departamento');
    }

    public function cursos()
    {
        return $this->hasMany(Curso::class, 'id_trabajador');
    }
}
