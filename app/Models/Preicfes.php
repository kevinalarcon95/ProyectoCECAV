<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preicfes extends Model
{
    use HasFactory;
    protected $table = 'preicfes';

    protected $fillable = [
        'nombre',
        'descripcion',
        'imagen',
        'fecha_inicio',
        'fecha_fin',
        'fecha_inicio_inscripcion',
        'fecha_fin_inscripcion',
        'duracion',
        'valor',
        'tipo_curso',
        'poblacion_objetivo',
        'estructura',
        'pasos_inscripcion',
    ];
}
