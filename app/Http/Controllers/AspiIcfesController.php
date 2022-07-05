<?php

namespace App\Http\Controllers;

use App\Models\AspiIcfes;
use Illuminate\Http\Request;
use App\Models\user;
use App\Models\Preicfes;
use Brian2694\Toastr\Facades\Toastr;
use Throwable;
use Illuminate\Support\Facades\Auth;

class AspiIcfesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //$objPreIcfes = Preicfes::all();
        $objUser = User::where('id', Auth::user()->id)->first();
        $objPreIcfes = Preicfes::findOrFail($id);
        return view('inscripciones.inscripcionIcfes', compact('objUser')) ->with ( 'objPreIcfes', $objPreIcfes);
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
        $request->validate([
            'telefonoIcfes' => 'required|numeric',
            'municipioIcfes' => 'required',
            'numAcuIcfes' => 'required',
            'programaIcfes' => 'required',
            'dirResIcfes' => 'required',
            'nomColIcfes' => 'required',
            'departamentoIcfes' => 'required',
            'nomAcuIcfes' => 'required',
        ]);

        $tipoIdIcfes = $request->input('tipoIdIcfes');
        $nombreIcfes = $request->input('nombreIcfes');
        $telefonoIcfes = $request->input('telefonoIcfes');
        $correoIcfes = $request->input('correoIcfes');
        $municipioIcfes = $request->input('municipioIcfes');
        $numAcuIcfes = $request->input('numAcuIcfes');
        $programaIcfes = $request->input('programaIcfes');
        $numIdIcfes = $request->input('numIdIcfes');
        $dirResIcfes = $request->input('dirResIcfes');
        $nomColIcfes = $request->input('nomColIcfes');
        $departamentoIcfes = $request->input('departamentoIcfes');
        $nomAcuIcfes = $request->input('nomAcuIcfes');
        $tipoCursoIcfes = $request->input('tipoCursoIcfes');
        $horarioIcfes = $request->input('horarioIcfes');
        $id_icfes = $request->input('idIcfes');
        

        $objUser = User::where('id', Auth::user()->id)->first();
        $id_user = $objUser->id;

        if (AspiIcfes::where('id_user',  $id_user)->exists()) {
            Toastr::warning('¡Ya existe un registro para este preicfes!', 'Atención', ["positionClass" => "toast-top-right"]);
            return redirect('/preIcfes');
        } else {
            try {
                AspiIcfes::create([
                    'tipo_identificacion' => $tipoIdIcfes,
                    'identificacion' => $numIdIcfes,
                    'nombre_apellido' => $nombreIcfes,
                    'direccion_residencia' => $dirResIcfes,
                    'telefono' => $telefonoIcfes,
                    'correo' => $correoIcfes,
                    'colegio' => $nomColIcfes,
                    'departamento_colegio' => $departamentoIcfes,
                    'municipio_colegio' => $municipioIcfes,
                    'nombre_apellido_acudiente' => $nomAcuIcfes,
                    'correo_acudiente' => $numAcuIcfes,
                    'tipo_curso' => $tipoCursoIcfes,
                    'pregrado' => $programaIcfes,
                    'horario' => $horarioIcfes,
                    'id_icfes' => $id_icfes,
                    'id_user' => $id_user
                ]);
    
                Toastr::success('¡Su registro fue exitoso!', '', ["positionClass" => "toast-top-right"]);
                return redirect('/preIcfes');
            } catch (Throwable $e) {
                dd($e);
                Toastr::error('¡Error al crear su registro!', '', ["positionClass" => "toast-top-right"]);
                return redirect('/preIcfes');
            }
        }
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
