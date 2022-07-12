<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;

class FuncionarioController extends Controller
{
    public function index()
    {

    }

    public function create(Request $request)
    {
        $Funcionario = Funcionario::create([
            'nombre'=> $request->nombreFunc,
            'cargo'=> $request->cargoFunc,
            'telefono'=> $request->telefonoFunc,
            'extension'=> $request->extensionFunc,
            'correo'=> $request->correoFunc,
        ]);
    }
}
