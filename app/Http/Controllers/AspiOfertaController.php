<?php

namespace App\Http\Controllers;

use App\Exports\AspiOfertaExport;
use App\Models\AspiIcfes;
use App\Models\AspiOferta;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Imports\EstudiantesImport;
use App\Models\Oferta;
use App\Models\Estudiante_oferta;
use App\Models\User;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Throwable;
use Maatwebsite\Excel\Facades\Excel;

use function PHPUnit\Framework\isNull;

class AspiOfertaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $objUser = User::where('id', Auth::user()->id)->first();
        $objOferta = Oferta::findOrFail($id);
        return view('inscripciones.inscripcionOferta', compact('objUser'))->with('objOferta', $objOferta);
    }

    public function list()
    {
        
        $datos['aspiOferta'] = DB::table('aspi_oferta')
        ->select(
                'oferta.id',
                'oferta.nombre as nombreOferta',
                'aspi_oferta.nombre as nombreEstudiante',
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
                'aspi_oferta.created_at',
                'estudiante_oferta.referencia',
                'estudiante_oferta.estado'
            )
            ->join('estudiante_oferta', ' estudiante_oferta.id_user', '=', 'aspi_oferta.id_user')
            ->join('oferta', 'aspi_oferta.id_oferta', '=', 'oferta.id')
            
            ->get();

        
            dd($datos);

       /* $objEstudiante = Estudiante_oferta::join('aspi_oferta', 'aspi_oferta.id_oferta', '=', 'estudiante_oferta.id_oferta')
            //->where('estudiante_oferta.id_oferta', '=', Auth::user()->id)
            ->select(
                'estudiante_oferta.referencia',
                'estudiante_oferta.estado'
            )
            ->get();

        $oferta = Oferta::pluck('nombre', 'id');*/

        return view('inscritos.listInscritosCursos')->with('datos', $datos);
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
            'tipoIdentificacion' => 'required|string',
            'numeroIdentificacion' => 'required|numeric',
            'direccionUser' => 'required|string',
            'telefonoUser' => 'required|numeric',
            'tipoInscripcion' => 'required|string',
            'vinculacion' => 'required|string',
            //'codigoUser' => 'numeric',
            //'profesionUser' => 'string',
            //'programaUser' => 'string',
            //'entidadUser' => 'string',
            //'nitUser' => 'string'
        ]);

        $idOferta = $request->input('idOferta');
        $nombreUser = $request->input('nombreUser');
        $apellidoUser = $request->input('apellidoUser');
        $tipoIdentificacion = $request->input('tipoIdentificacion');
        $numeroIdentificacion = $request->input('numeroIdentificacion');
        $direccionUser = $request->input('direccionUser');
        $telefonoUser = $request->input('telefonoUser');
        $tipoInscripcion = $request->input('tipoInscripcion');
        $vinculacion = $request->input('vinculacion');
        $codigoUser = is_null($request->input('codigoUser')) ?  0 : $request->input('codigoUser');
        $profesionUser = is_null($request->input('profesionUser')) ? 'No aplica' : $request->input('profesionUser');
        $programaUser = is_null($request->input('programaUser')) ? 'No aplica' : $request->input('programaUser');
        $entidadUser = is_null($request->input('entidadUser')) ? 'No aplica' : $request->input('entidadUser');
        $nitUser = is_null($request->input('nitUser')) ? 0 : $request->input('nitUser');

        $objUser = User::where('id', Auth::user()->id)->first();
        $id_user = $objUser->id;

        if (AspiOferta::where('id_oferta',  $idOferta)->exists() && AspiOferta::where('identificacion',  $numeroIdentificacion)->exists()) {
            //dd('existe');
            Toastr::warning('¡Ya existe un registro para esta oferta!', 'Atención', ["positionClass" => "toast-top-right"]);
            return redirect('/ofertasInscripciones');
        } else {
            try {
                AspiOferta::create([
                    'id_oferta' => $idOferta,
                    'nombre' => $nombreUser,
                    'apellido' => $apellidoUser,
                    'tipo_identificacion' => $tipoIdentificacion,
                    'identificacion' => $numeroIdentificacion,
                    'direccion_residencia' => $direccionUser,
                    'telefono' => $telefonoUser,
                    'tipo_inscripcion' => $tipoInscripcion,
                    'tipo_vinculacion' => $vinculacion,
                    'codigo_universitario' => $codigoUser,
                    'profesion' => $profesionUser,
                    'programa' => $programaUser,
                    'entidad' => $entidadUser,
                    'nit_entidad' => $nitUser,
                    'id_user' => $id_user
                ]);

                Toastr::success('¡Su registro fue exitoso!', 'Exito', ["positionClass" => "toast-top-right"]);
                return redirect('/ofertasInscripciones');
            } catch (Throwable $e) {
                dd($e);
                Toastr::error('¡Error al crear su registro!', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect('/ofertasInscripciones');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AspiOferta  $aspiOferta
     * @return \Illuminate\Http\Response
     */
    public function show($id, $identificacion)
    {
        $categoria = Oferta::pluck('nombre', 'id');
        $usuario = User::findOrFail($id);
        return view('ofertas.detalleOferta', compact('objOferta'))->with('usuario', $usuario);
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

    public static function existeRegistro($id)
    {
        $objAspioferta = AspiIcfes::findOrFail($id);
        if ($objAspioferta->id != null) {
            return true;
        }
    }
    public function exportExcel()
    {
        ini_set('memory_limit', '-1');
        set_time_limit(3);
        return Excel::download(new AspiOfertaExport, 'Listado-Inscritos-Cursos.xlsx');
    }

    //Imporatción de un archivo excel 
    public function import(Request $req)
    {
        try {
            if (!$req->hasFile('student_file')) {
                throw new \Exception('archivo no existe');
                Toastr::info('archivo no existe ', 'Error', ["positionClass" => "toast-top-right"]);
                return back();
            }
            Excel::import(new EstudiantesImport, $req->file('student_file'));
            Toastr::success('Importación de estudiantes completada', 'Exito', ["positionClass" => "toast-top-right"]);
            return back();
        } catch (\Throwable $th) {
            Toastr::error('Error no se Importó los registros', 'Error', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }
}
