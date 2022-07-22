<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;


use Throwable;


class FuncionarioController extends Controller
{
    public function list()
    {
        $objFuncionario = Funcionario::all();
        return view('funcionarios.list')->with('objFuncionario', $objFuncionario);
    }

    public function create()
    {
        return view('funcionarios.inscripcionFuncionario');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombreFunc' => 'required|string',
            'cargoFunc' => 'required|string',
            'telefonoFunc' => 'required|numeric',
            'extensionFunc' => 'required|numeric',
            'correoFunc' => 'required|string',
        ]);

        $nombreFunc = $request->input('nombreFunc');
        $cargoFunc = $request->input('cargoFunc');
        $telefonoFunc = $request->input('telefonoFunc');
        $extensionFunc = $request->input('extensionFunc');
        $correoFunc = $request->input('correoFunc');

        try {
            $Funcionario = Funcionario::create([
                'nombre' => $request->nombreFunc,
                'cargo' => strtoupper($request->cargoFunc),
                'telefono' => $request->telefonoFunc,
                'extension' => $request->extensionFunc,
                'correo' => $request->correoFunc,
            ]);
            Toastr::success('¡Su registro fue exitoso!', 'Exito', ["positionClass" => "toast-top-right"]);
            return redirect('/admin/listFuncionario');
        } catch (Throwable $e) {
            Toastr::error('¡Error al crear su registro!', 'Error', ["positionClass" => "toast-top-right"]);
            return redirect('/admin/listFuncionario');
        }
    }

    public function show($id)
    {
        $objFuncionario = Funcionario::findOrFail($id);
        return view('funcionarios.detallePreIcfes')->with('objFuncionario', $objFuncionario);
    }

    public function edit($id)
    {
        $objFuncionario = Funcionario::findOrFail($id);
        return view('funcionarios.edit')->with('objFuncionario', $objFuncionario);
    }

    public function update(Request $request, $id)
    {

        $updateData = Funcionario::findOrFail($id);

        $request->validate([
            'nombreFunc' => 'required|string',
            'cargoFunc' => 'required|string',
            'telefonoFunc' => 'required|numeric',
            'extensionFunc' => 'required|numeric',
            'correoFunc' => 'required|string',
        ]);

        $nombreFunc = $request->input('nombreFunc');
        $cargoFunc = $request->input('cargoFunc');
        $telefonoFunc = $request->input('telefonoFunc');
        $extensionFunc = $request->input('extensionFunc');
        $correoFunc = $request->input('correoFunc');

        try {
            $updateData->nombre=$nombreFunc;
            $updateData->cargo=strtoupper($cargoFunc);
            $updateData->telefono=$telefonoFunc;
            $updateData->extension=$extensionFunc;
            $updateData->correo=$correoFunc;
            $updateData->save();
            Toastr::success('¡Su registro fue editado exitosamente!', 'Exito', ["positionClass" => "toast-top-right"]);
            return redirect('/admin/listFuncionario');
        } catch (Throwable $e) {
            Toastr::error('¡Error al editar su registro!', 'Error', ["positionClass" => "toast-top-right"]);
            return redirect('/admin/listFuncionario');
        }

    }

    public function destroy($id)
    {
        DB::delete('DELETE FROM funcionario WHERE id = ?', [$id]);
        return redirect('/admin/listFuncionario');
    }

    public static function existeFuncionario($id){
        return Funcionario::where('id',  $id)->exists();
    }

}
