<?php

namespace App\Imports;

use App\Models\Estudiante_oferta;
use Maatwebsite\Excel\Concerns\ToModel;

class EstudiantesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Estudiante_oferta([
            //
        ]);
    }
}
