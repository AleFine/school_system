<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;

    protected $table = 'paises';

    protected $fillable = ['nombre', 'codigo_iso'];

    /**
     * Relación uno a muchos con la tabla regiones.
     * Un país tiene muchas regiones.
     */
    public function regiones()
    {
        return $this->hasMany(Region::class);
    }
}
