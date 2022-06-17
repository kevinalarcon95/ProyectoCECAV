<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index()
    {
        return view('infoCecav.infoGeneral');
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
