<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    use HasFactory;

    protected $table = 'oferta';

    protected $fillable = [
        'nombre',
        'descripcion',
        'tipo_pago',
        'unidad_academica',
        'imagen',
        'poblacion_objetivo',
        'id_categoria',
        'costo',
        'fecha_inicio',
        'resolucion',
        'intensidad_horario',
        'limite_cupos',
        'fecha_fin',
        'tipo_curso',
        'fecha_cierre_inscripcion',
        'id_certificado',
    ];
    
}
