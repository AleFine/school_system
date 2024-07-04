<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    use HasFactory;

    protected $table = 'grados';
    protected $primaryKey = 'id_grado';
    protected $fillable = [
        'nombre_grado',
        'id_nivel',
    ];

    public function nivel()
    {
        return $this->belongsTo(Nivel::class, 'id_nivel');
    }
}
