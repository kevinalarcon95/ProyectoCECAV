<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Role;

use App\Models\AspiIcfes;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;

class AspiIcfesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objAspiIcfes = AspiIcfes::all();
        return view('preIcfes.list')->with('objAspiIcfes', $objAspiIcfes);;
    }
    public function list()
    {
        $datos['aspiIcfes'] = AspiIcfes::select(
            'aspi_icfes.tipo_identificacion',
            'aspi_icfes.identificacion',    
            'aspi_icfes.nombre_apellido',
            'aspi_icfes.direccion_residencia',
            'aspi_icfes.telefono',
            'aspi_icfes.correo',
            'aspi_icfes.colegio',
            'aspi_icfes.departamento_colegio',
            'aspi_icfes.municipio_colegio',
            'aspi_icfes.nombre_apellido_acudiente',
            'aspi_icfes.correo_acudiente',
            'aspi_icfes.tipo_curso',
            'aspi_icfes.pregrado',
            'aspi_icfes.horario',
            'aspi_icfes.id_icfes',
            'aspi_icfes.id_user'      
        )
            ->from('aspi_icfes')           
            ->get();
        return view('preIcfes.list', $datos);
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
     * @param  \App\Models\AspiIcfes  $aspiIcfes
     * @return \Illuminate\Http\Response
     */
    public function show(AspiIcfes $aspiIcfes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AspiIcfes  $aspiIcfes
     * @return \Illuminate\Http\Response
     */
    public function edit(AspiIcfes $aspiIcfes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AspiIcfes  $aspiIcfes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AspiIcfes $aspiIcfes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AspiIcfes  $aspiIcfes
     * @return \Illuminate\Http\Response
     */
    public function destroy(AspiIcfes $aspiIcfes)
    {
        //
    }
}
