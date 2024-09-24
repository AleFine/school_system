<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $table = 'regiones';

    protected $fillable = ['nombre', 'pais_id'];

    /**
     * Relación uno a muchos inversa con la tabla paises.
     * Una región pertenece a un país.
     */
    public function pais()
    {
        return $this->belongsTo(Pais::class);
    }

    /**
     * Relación uno a muchos con la tabla ciudades.
     * Una región tiene muchas ciudades.
     */
    public function ciudades()
    {
        return $this->hasMany(Ciudad::class);
    }
}
