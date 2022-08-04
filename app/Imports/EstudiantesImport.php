<?php

namespace App\Imports;

use App\Models\EstudiantesOferta;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class EstudiantesImport implements ToCollection, WithHeadingRow, WithValidation
{  
     /**
    * @param Collection $collection
    */
    //Recibe filas del excel para mandarlas a la BD
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $data = [
                'id_oferta' => $row['id_oferta'],
                'id_estudiante' => $row['id_estudiante'],
                'estado' => $row['estado'],
                'referencia' => $row['referencia']           

            ];
            EstudiantesOferta::create($data);
        }
    }

    public function rules(): array
    {
        return [
            'id_oferta' => 'required',
            'id_estudiante' => 'required',
            'referencia' => 'required',
            'estado' => 'required'
        ];
    }
}