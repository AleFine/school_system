<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;
    protected $table = 'personals';
    protected $primaryKey = 'id_trabajador';
    public $timestamps = false;

    protected $fillable = [
        'nombre_trabajador',
        'apellido_trabajador',
        'DNI',
        'direccion',
        'fechaIngreso',
        'fechaNacimiento',
        'telefono',
        'id_departamento'
    ];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'id_departamento', 'id_departamento');
    }
}
