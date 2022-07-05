<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AspiIcfes extends Model
{
    use HasFactory;
    protected $table = 'aspi_icfes';

    protected $fillable  = [
        'tipo_identificacion',
        'identificacion',
        'nombre_apellido',
        'direccion_residencia',
        'telefono',
        'correo',
        'colegio',
        'departamento_colegio',
        'municipio_colegio',
        'nombre_apellido_acudiente',
        'correo_acudiente',
        'tipo_curso',
        'pregrado',
        'horario',
        'id_icfes',
        'id_user'
    ];

}
