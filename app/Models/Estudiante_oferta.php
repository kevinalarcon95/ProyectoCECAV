<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante_oferta extends Model
{
    use HasFactory;
    protected $guard = 'estudiante_oferta';

    protected $table = 'estudiante_oferta';

    protected $fillable = [
        'id_oferta',
        'id_estudiante',
        'estado',
        'referencia'
    ];
    
    
}
