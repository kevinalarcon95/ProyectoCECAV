<?php

namespace App\Http\Controllers;

use App\Models\AspiOferta;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Oferta;
use App\Models\User;
use Throwable;

class AspiOfertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function list()
    {       
        $datos['aspiOferta'] = AspiOferta::select(
            'aspi_oferta.id_oferta',
            'aspi_oferta.nombre',
            'aspi_oferta.apellido',    
            'aspi_oferta.tipo_identificacion',
            'aspi_oferta.identificacion',
            'aspi_oferta.direccion_residencia',
            'aspi_oferta.telefono',
            'aspi_oferta.tipo_inscripcion',
            'aspi_oferta.tipo_vinculacion',
            'aspi_oferta.codigo_universitario',
            'aspi_oferta.profesion',
            'aspi_oferta.programa',
            'aspi_oferta.entidad',
            'aspi_oferta.nit_entidad',
            'aspi_oferta.id_user',
            'aspi_oferta.created_at'
                
        )
            ->from('aspi_oferta')       
            ->join('oferta','aspi_oferta.id_oferta','=','oferta.id')              
            ->get();
            
        $oferta = Oferta::pluck('nombre', 'id');            
        return view('preIcfes.listInscritosCursos', $datos)->with('oferta', $oferta);
    }
    public static function consultaRangofechas(Request $request)
    {       
        $fechaInicioConsulta = $request->get('fechaInicioConsulta');
        $fechaFinConsulta = $request->get('fechaFinConsulta');
        $cursosOfertados = $request->get('cursosOfertados');
        $datos['aspiOferta'] = AspiOferta::select(
            'aspi_oferta.id_oferta',
            'aspi_oferta.nombre',
            'aspi_oferta.apellido',    
            'aspi_oferta.tipo_identificacion',
            'aspi_oferta.identificacion',
            'aspi_oferta.direccion_residencia',
            'aspi_oferta.telefono',
            'aspi_oferta.tipo_inscripcion',
            'aspi_oferta.tipo_vinculacion',
            'aspi_oferta.codigo_universitario',
            'aspi_oferta.profesion',
            'aspi_oferta.programa',
            'aspi_oferta.entidad',
            'aspi_oferta.nit_entidad',
            'aspi_oferta.id_user',
            'aspi_oferta.created_at'
            )
            ->from('aspi_oferta')    
            ->join('oferta','aspi_oferta.id_oferta','=','oferta.id')                                     
            ->whereBetween('aspi_oferta.created_at',['2022-06-24','2022-06-24'])
            ->get();
        $oferta = Oferta::pluck('nombre', 'id');            
        return view('preIcfes.listInscritosCursos', $datos)->with('oferta', $oferta);  
    }
    
    public static function exportarExcel()
    {
        //
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
            'idOferta' => 'required|numeric',
            'nombreUser' => 'required|string',
            'apellidoUser' => 'required|string',
            'tipoIdentifiacion' => 'required|string',
            'numeroIdentificacion' => 'required|numeric',
            'direccionUser' => 'required|string',
            'telefonoUser' => 'required|string',
            'tipoInscripcion' => 'required|string',
            'vinculacion' => 'required|string',
            'codigoUser' => 'numeric',
            'profesionUser' => 'string',
            'programaUser' => 'string',
            'entidadUser' => 'string',
            'nitUser' => 'string'
        ]);

        $idOferta = $request->input('idOferta');
        $nombreUser = $request->input('nombreUser');
        $apellidoUser = $request->input('apellidoUser');
        $tipoIdentifiacion = $request->input('tipoIdentifiacion');
        $numeroIdentificacion = $request->input('numeroIdentificacion');
        $direccionUser = $request->input('direccionUser');
        $telefonoUser = $request->input('telefonoUser');
        $tipoInscripcion = $request->input('tipoInscripcion');
        $vinculacion = $request->input('vinculacion');
        $codigoUser = $request->input('codigoUser');
        $profesionUser = $request->input('profesionUser');
        $programaUser = $request->input('programaUser');
        $entidadUser = $request->input('entidadUser');
        $nitUser = $request->input('nitUser');

        //TODO: falta implementar las opciones que no son obligatorios ponerle no aplica
        //no olvidar que si llegan nulos toca ponerlos en NO APLICA
        try {
            AspiOferta::create([
                'id_oferta' => $idOferta,
                'nombre' => $nombreUser,
                'apellido' => $apellidoUser,
                'tipo_identificacion' => $tipoIdentifiacion,
                'identificacion' => $numeroIdentificacion,
                'direccion_residencia' => $direccionUser,
                'telefono' => $telefonoUser,
                'tipo_inscripcion' => $tipoInscripcion,
                'tipo_vinculacion' => $vinculacion,
                'codigo_universitario' => $codigoUser,
                'profesion' => $profesionUser,
                'programa' => $programaUser,
                'entidad' => $entidadUser,
                'nit_entidad' => $nitUser
            ]);

            Toastr::success('¡Su registro fue exitoso!', '', ["positionClass" => "toast-top-right"]);
            //return redirect('/admin/createOferta');
        } catch (Throwable $e) {
            //dd($e);
            Toastr::error('¡Error al crear su registro!', '', ["positionClass" => "toast-top-right"]);
            //return redirect('/admin/createOferta');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AspiOferta  $aspiOferta
     * @return \Illuminate\Http\Response
     */

     //TODO: aqui le mande el id de la oferta y la identificacion del estudiante para sacar los datos que necesitamos
    public function show($id,$identificacion)
    {
        $categoria = Oferta::pluck('nombre', 'id');
        $usuario = User::findOrFail($id);             
        return view('ofertas.detalleOferta',compact('objOferta'))->with('usuario', $usuario);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AspiOferta  $aspiOferta
     * @return \Illuminate\Http\Response
     */
    public function edit(AspiOferta $aspiOferta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AspiOferta  $aspiOferta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AspiOferta $aspiOferta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AspiOferta  $aspiOferta
     * @return \Illuminate\Http\Response
     */
    public function destroy(AspiOferta $aspiOferta)
    {
        //
    }
}
