<?php

namespace App\Exports;

use App\Models\AspiOferta;
use Maatwebsite\Excel\Concerns\FromCollection;

class aspiOfertaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return AspiOferta::all();
        return AspiOferta::join('oferta','aspi_oferta.id_oferta','=','oferta.id')  
       ->select(
           'aspi_oferta.id_oferta',
           'oferta.nombre as nomOferta',
           'aspi_oferta.nombre',
           'aspi_oferta.apellido',    
           'aspi_oferta.tipo_identificacion',
           'aspi_oferta.identificacion',
           'aspi_oferta.direccion_residencia',
           'aspi_oferta.telefono',
           'aspi_oferta.tipo_inscripcion',
           'aspi_oferta.tipo_vinculacion',
           'aspi_oferta.codigo_universitario',
           'aspi_oferta.profesion',
           'aspi_oferta.programa',
           'aspi_oferta.entidad',
           'aspi_oferta.nit_entidad',
           'aspi_oferta.id_user',
           'aspi_oferta.created_at'                  
               
       )       
       ->get();
    }
}
