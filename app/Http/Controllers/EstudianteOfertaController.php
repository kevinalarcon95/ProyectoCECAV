<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Estudiante_oferta;
use Illuminate\Http\Request;
use App\Models\AspiOferta;

class EstudianteOfertaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objInscripcion = AspiOferta::join('oferta', 'oferta.id', '=', 'aspi_oferta.id_oferta')
                          ->select('oferta.*')
                          ->get();
        return view('cursosEstudiante.misCursosOferta')->with('objInscripcion', $objInscripcion);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudiante_oferta  $estudiante_oferta
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante_oferta $estudiante_oferta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estudiante_oferta  $estudiante_oferta
     * @return \Illuminate\Http\Response
     */
    public function edit(Estudiante_oferta $estudiante_oferta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estudiante_oferta  $estudiante_oferta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estudiante_oferta $estudiante_oferta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudiante_oferta  $estudiante_oferta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estudiante_oferta $estudiante_oferta)
    {
        //
    }
}
