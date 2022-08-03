<?php

namespace App\Imports;

use App\Models\Estudiante;
use App\Models\Estudiante_oferta;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class EstudiantesImport implements ToCollection, WithHeadingRow, WithValidation
{  
     /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $data = [
                'id_oferta' => $row['id_oferta'],
                'id_estudiante' => $row['id_estudiante'],
                'referencia' => $row['referencia'],
                'estado' => $row['estado'],

            ];
            EstudiantePrueba::create($data);
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