<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AspiOferta extends Model
{
    use HasFactory;
    protected $table = 'aspi_oferta';

    public function scopeFechaInicioConsulta($query,$fechaInicioConsulta){
        if($fechaInicioConsulta)
            return $query->where('aspi_oferta.created_at','=',"%$fechaInicioConsulta%");
    }
}
