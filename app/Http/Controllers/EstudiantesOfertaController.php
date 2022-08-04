<?php

namespace App\Http\Controllers;

use App\Imports\EstudiantesImport;
use App\Models\Estudiante_oferta;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EstudiantesOfertaController extends Controller
{
    public function index(){
        $estudiantes = Estudiante_oferta::all();
        return view('inscritos.listInscritosCursos',compact('estudiantes'));
    }
    public function import(Request $req){
        try {
             if (!$req->hasFile('student_file')) {
                throw new \Exception('archivo no existe');
             }
             Excel::import(new EstudiantesImport,$req->file('student_file'));
             return back()->with('message','Importación de estudiantes completada');
        } catch (\Throwable $th) {
            return back()->with('message','Error No se Importo los registros');
        }
       
    }
}
