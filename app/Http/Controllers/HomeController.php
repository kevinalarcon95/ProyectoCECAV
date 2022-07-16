<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;

class HomeController extends Controller
{
 
    /**
     * Show the application home infoCecav.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $objDirectora = Funcionario::where('cargo', 'DIRECTORA')->first();
        $objFuncionario = Funcionario::all();
        return view('infoCecav.infoGeneral',compact('objDirectora'))->with('objFuncionario', $objFuncionario);
        //return view('home');
    }
}
