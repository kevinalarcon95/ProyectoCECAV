<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oferta;
use App\Models\Categoria;
use App\Models\User;

class InscripcionOfertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $allOfertas = Oferta::all();
        $objOferta = Oferta::findOrFail($id);        
        $categoria = Categoria::pluck('nombre', 'id'); 
        return view('inscripciones.inscripcionOferta',compact('allOfertas'))->with('objOferta', $objOferta);
    }
}