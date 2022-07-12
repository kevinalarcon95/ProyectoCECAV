<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;
use Brian2694\Toastr\Facades\Toastr;

use Throwable;


class FuncionarioController extends Controller
{
    public function index()
    {
        $objFuncionario = Funcionario::all();
        return view('funcionarios.index')->with('objFuncionario', $objFuncionario);
    }

    public function create()
    {
        return view('funcionarios.inscripcionFuncionario');
    }

    public function store(Request $request)
    {
        try {
            $Funcionario = Funcionario::create([
                'nombre' => $request->nombreFunc,
                'cargo' => $request->cargoFunc,
                'telefono' => $request->telefonoFunc,
                'extension' => $request->extensionFunc,
                'correo' => $request->correoFunc,
            ]);
            Toastr::success('¡Su registro fue exitoso!', 'Exito', ["positionClass" => "toast-top-right"]);
            return redirect('/admin/Funcionario');
        } catch (Throwable $e) {
            dd($e);
            Toastr::error('¡Error al crear su registro!', 'Error', ["positionClass" => "toast-top-right"]);
            return redirect('/admin/createFuncionario');
        }
    }

    public function show($id)
    {
        $objFuncionario = Funcionario::findOrFail($id);
        return view('funcionarios.detallePreIcfes')->with('objFuncionario', $objFuncionario);
    }

}
