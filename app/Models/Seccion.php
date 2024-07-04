<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_seccion';

    protected $fillable = [
        'numero_aula',
        'aforo',
        'id_grado',
    ];

    public function grado()
    {
        return $this->belongsTo(Grado::class, 'id_grado');
    }
}
