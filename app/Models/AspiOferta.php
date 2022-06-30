<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AspiOferta extends Model
{
    use HasFactory;
    protected $table = 'aspi_oferta';
    protected $fillable  = [
        'id_oferta',
        'nombre',
        'apellido',
        'tipo_identificacion',
        'identificacion',
        'direccion_residencia',
        'telefono',
        'tipo_inscripcion',
        'tipo_vinculacion',
        'profesion',
        'programa',
        'entidad',
        'nit_entidad',
        'id_user'
    ];
}
