<?php

namespace App\Http\Controllers;

use App\Models\AspiIcfes;
use Illuminate\Support\Facades\DB;
use App\Models\Estudiante_oferta;
use Illuminate\Support\Facades\Storage;
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
        $cantAspiOferta = AspiOferta::count();
        $objInscripcion = AspiOferta::join('oferta', 'oferta.id', '=', 'aspi_oferta.id_oferta')
            ->select('oferta.id','oferta.nombre','oferta.descripcion','oferta.costo','oferta.fecha_inicio','oferta.fecha_fin',
            'oferta.unidad_academica','oferta.poblacion_objetivo','oferta.imagen','aspi_oferta.created_at')
            ->get();
        return view('cursosEstudiante.misCursosOferta', compact('cantAspiOferta'))->with('objInscripcion', $objInscripcion);
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
    public function destroy($id)
    {
        DB::delete('DELETE FROM aspi_oferta WHERE id_oferta = ?', [$id]);
        return redirect('/misOfertas');
    }

    public static function existeInscripcion($id)
    {
        return AspiOferta::where('id_oferta',  $id)->exists();
    }
}
