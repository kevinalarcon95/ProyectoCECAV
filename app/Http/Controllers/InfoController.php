<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;



class InfoController extends Controller
{
    public function index()
    {
        $objDirectora = Funcionario::where('cargo', 'DIRECTORA')->first();
        $objFuncionario = Funcionario::all();
        return view('infoCecav.infoGeneral',compact('objDirectora'))->with('objFuncionario', $objFuncionario);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function info()
    {
        return view('infoCecav.quienesSomos');
    }
    public function funciones()
    {
        return view('infoCecav.funcionesCecav');
    }
}
