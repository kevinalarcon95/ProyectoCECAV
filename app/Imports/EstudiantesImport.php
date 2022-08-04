<?php

namespace App\Imports;

use App\Models\Estudiante_Oferta;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;

class EstudiantesImport implements ToCollection, WithHeadingRow
{

    public function collection(Collection $rows)
    {

        Validator::make($rows->toArray(), [
            '*.id_oferta' => 'required',
            '*.id_estudiante' => 'required',
            '*.referencia' => 'required',
            '*.estado' => 'required'
        ])->validate();

        foreach ($rows as $row) {
            Estudiante_Oferta::create([
                'id_oferta' => $row['id_oferta'],
                'id_estudiante' => $row['id_estudiante'],
                'estado' => $row['estado'],
                'referencia' => $row['referencia']
            ]);
        }
    }

     public function headingRow(): int
    {
        return 2;
    }
}
