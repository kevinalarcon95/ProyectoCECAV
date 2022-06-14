<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Role;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Oferta;
use Illuminate\Support\Facades\Storage;

use Throwable;

class OfertaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$objOferta = Oferta::all();
        return view('ofertas.index');
    }

    public function list()
    {
        return view('ofertas.list');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria = Categoria::pluck('nombre', 'id');
        return view('ofertas.create')->with('categoria', $categoria);
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
            'nombreOferta' => 'required',
            'descripcionOferta' => 'required',
            'tipoPagoOferta' => 'required',
            'unidadAcademicaOferta' => 'required',
            'fechaInicioOferta' => 'required',
            'resolucionOferta' => 'required',
            'intensidadHorarioOferta' => 'required',
            'cuposOferta' => 'required',
            'imagenOferta' => 'required|image|max:2048',
            'poblacionOferta' => 'required',
            'categoriaOferta' => 'required',
            'costoOferta' => 'required',
            'fechaFinOferta' => 'required',
            'tipoCursoOferta' => 'required',
            'fechaCierreOferta' => 'required'
        ]);
        
        $imagen = $request->file('imagenOferta')->store('public/ofertas');
        $url = Storage::url($imagen);
        $imagen = $url;

        //dd("hola desde store",$imagen);

        $nombreOferta = $request->input('nombreOferta');
        $descripcionOferta = $request->input('descripcionOferta');
        $tipoPagoOferta = $request->input('tipoPagoOferta');
        $unidadAcademicaOferta = $request->input('unidadAcademicaOferta');
        $fechaInicioOferta = $request->input('fechaInicioOferta');
        $resolucionOferta = $request->input('resolucionOferta');
        $intensidadHorarioOferta = $request->input('intensidadHorarioOferta');
        $cuposOferta = $request->input('cuposOferta');
        $poblacionOferta = $request->input('poblacionOferta');
        $categoriaOferta = $request->input('categoriaOferta');
        $fechaFinOferta = $request->input('fechaFinOferta');
        $costoOferta = $request->input('costoOferta');
        $tipoCursoOferta = $request->input('tipoCursoOferta');
        $fechaCierreOferta = $request->input('fechaCierreOferta');
 
        try {
            /*
                $oferta = new Oferta();
                $oferta->nombreOferta = $nombreOferta;
                $oferta->descripcionOferta = $descripcionOferta;
                $oferta->save();
                */
            Oferta::create([
                'nombre' => $nombreOferta,
                'descripcion' => $descripcionOferta,
                'tipo_pago' => $tipoPagoOferta,
                'unidad_academica' => $unidadAcademicaOferta,
                'imagen' => $imagen,
                'poblacion_objetivo' => $poblacionOferta,
                'id_categoria' => $categoriaOferta,
                'costo' => $costoOferta,
                'fecha_inicio' => $fechaInicioOferta,
                'resolucion' => $resolucionOferta,
                'intensidad_horario' => $intensidadHorarioOferta,
                'limite_cupos' => $cuposOferta,
                'fecha_fin' => $fechaFinOferta,
                'tipo_curso' => $tipoCursoOferta,
                'fecha_cierre_inscripcion' => $fechaCierreOferta,
                'id_certificado' => 1,
            ]);

            Toastr::success('¡Su registro fue exitoso!', '', ["positionClass" => "toast-top-right"]);
            return redirect('/admin/createOferta');
        } catch (Throwable $e) {
            dd($e,$intensidadHorarioOferta);
            Toastr::error('¡Error al crear su registro!', '', ["positionClass" => "toast-top-right"]);
            //Toastr::error('¡Error al crear su registro!','');
            return redirect('/admin/createOferta');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
