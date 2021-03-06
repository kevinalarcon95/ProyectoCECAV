<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Role;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Oferta;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Throwable;
use Carbon\Carbon;

class OfertaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objOferta = Oferta::orderBy('nombre','asc')->get();
        return view('ofertas.index')->with('objOferta', $objOferta);
    }

    public function list()
    {
        $fecha_actual = date("y-m-d");
        $fecha_pasada = date("y-m-d", strtotime($fecha_actual . "-5 years"));
        $datos['ofertas'] = Oferta::select(
            'oferta.id',
            'oferta.nombre',
            'oferta.descripcion',
            'oferta.tipo_pago',
            'oferta.unidad_academica',
            'oferta.imagen',
            'oferta.poblacion_objetivo',
            'categoria.nombre as nombreCategoria',
            'oferta.costo',
            'oferta.fecha_inicio',
            'oferta.resolucion',
            'oferta.intensidad_horario',
            'oferta.limite_cupos',
            'oferta.fecha_fin',
            'oferta.tipo_curso',
            'oferta.fecha_cierre_inscripcion'
        )
            ->from('oferta')
            ->join('categoria', 'oferta.id_categoria', '=', 'categoria.id')
            ->where('oferta.fecha_inicio','>=',$fecha_pasada)
            ->get();
        
            return view('ofertas.list', $datos);
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
            'nombreOferta' => 'required|string',
            'descripcionOferta' => 'required|string',
            'tipoPagoOferta' => 'required',
            'unidadAcademicaOferta' => 'required|string|regex:/^[\pL\s\-]+$/u',
            'fechaInicioOferta' => 'required|date|after_or_equal:today',
            'resolucionOferta' => 'required|string',
            'intensidadHorarioOferta' => 'required|string',
            'cuposOferta' => 'required|numeric',
            'imagenOferta' => 'required|image|mimes:jpeg,png,jpg,svg1|dimensions:min_width=100,min_height=200|max:5000',
            'poblacionOferta' => 'required|string',
            'categoriaOferta' => 'required',
            //'costoOferta' => 'required|string',
            'fechaFinOferta' => 'required|date|after_or_equal:fechaInicioOferta|after:fechaCierreOferta',
            'tipoCursoOferta' => 'required',
            'fechaCierreOferta' => 'required|date|before:fechaInicioOferta'
        ]);

        $imagen = $request->file('imagenOferta')->store('public/ofertas');
        $url = Storage::url($imagen);
        $imagen = $url;

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

        if ($tipoPagoOferta == 'Gratuito' || $costoOferta == null) {
            $costoOferta = 0;
        } 
        
        if (Oferta::where('resolucion',  $resolucionOferta)->exists()) {
            Toastr::info('??Ya existe una oferta con la resoluci??n '. $resolucionOferta .'!', 'Informaci??n', ["positionClass" => "toast-top-right"]);
            return redirect('/admin/createOferta')->withInput();
        } else {
            try {
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
                Toastr::success('??Su registro fue exitoso!', 'Exito', ["positionClass" => "toast-top-right"]);
                return redirect('/admin/listOferta');
            } catch (Throwable $e) {
                dd($e);
                Toastr::error('??Error al crear su registro!', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect('/admin/createOferta');
            }
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
        $objOferta = Oferta::findOrFail($id);
        $categoria = Categoria::pluck('nombre', 'id');
        return view('ofertas.detalleOferta', compact('objOferta'))->with('categoria', $categoria);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $oferta = Oferta::findOrFail($id);
        $categoria = Categoria::pluck('nombre', 'id');
        $fechaFinOferta = Carbon::parse($oferta->fecha_fin)->format('d/m/Y');
        return view('ofertas.editar', compact('oferta'))->with('categoria', $categoria);
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
        $updateData = Oferta::findOrFail($id);

        $request->validate([
            'nombreOferta' => 'required|string',
            'descripcionOferta' => 'required|string',
            'tipoPagoOferta' => 'in:Pago,Gratuito',
            'unidadAcademicaOferta' => 'required|string',
            'fechaInicioOferta' => 'required|date|after_or_equal:fechaCierreOferta',
            'resolucionOferta' => 'required|string',
            'intensidadHorarioOferta' => 'required|string',
            'cuposOferta' => 'required|numeric|min:1',
            'imagenOferta' => 'max:2048|mimes:jpeg,png,jpg',
            'poblacionOferta' => 'required|string',
            'categoriaOferta' => 'required',
            // 'costoOferta' => 'required|numeric|min:0',
            'fechaFinOferta' => 'required|date|after_or_equal:fechaInicioOferta',
            'tipoCursoOferta' => 'in:Virtual,Presencial',
            'fechaCierreOferta' => 'required|date|before:fechaInicioOferta|after_or_equal:today'
        ]);


        //Obteniendo los datos de la vista
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
        
        if ($tipoPagoOferta == 'Gratuito' || $costoOferta == null) {
            $costoOferta = 0;
        } 
        //dd($fechaInicioOferta);
        $imagen = $request->input('imagenOferta');
        try {
            $updateData->nombre = $nombreOferta;
            $updateData->descripcion = $descripcionOferta;
            $updateData->tipo_pago =  $tipoPagoOferta;
            $updateData->unidad_academica = $unidadAcademicaOferta;
            if ($request->hasFile('imagenOferta')) {
                //$datosTemporal = Oferta::findOrFail($id);
                $url = str_replace('storage', 'public', $updateData->imagen);
                Storage::delete($url);
                $updateData->imagen = Storage::url($request->file('imagenOferta')->store('public/ofertas'));
            }
            $updateData->poblacion_objetivo = $poblacionOferta;
            $updateData->id_categoria = $categoriaOferta;
            $updateData->costo = $costoOferta;
            $updateData->fecha_inicio = $fechaInicioOferta;
            $updateData->resolucion = $resolucionOferta;                      
            $updateData->intensidad_horario = $intensidadHorarioOferta;
            $updateData->limite_cupos = $cuposOferta;
            $updateData->fecha_fin = $fechaFinOferta;
            $updateData->tipo_curso = $tipoCursoOferta;
            $updateData->fecha_cierre_inscripcion = $fechaCierreOferta;
            $updateData->id_certificado = 1;


            /* if( $request->file('imagenOferta') == null){
            
            }else{
                $image_path = public_path().$updateData->imagen;
            unlink($image_path);
            
            $imagen = $request->file('imagenOferta')->store('public/ofertas');
            $url = Storage::url($imagen);
            $imagen = $url;
            $updateData ->imagen = $imagen;
            }*/
            //dd($imagen);
            //dd($updateData);
            $updateData->save();
            Toastr::success('??Su registro fue editado exitosamente!', 'Exito', ["positionClass" => "toast-top-right"]);
            return redirect('/admin/listOferta');
        } catch (Throwable $e) {
            dd($e);
            Toastr::error('??Error al editar su registro!', 'Error', ["positionClass" => "toast-top-right"]);
            return redirect('/admin/listOferta');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $oferta = Oferta::findOrFail($id);

        $url = str_replace('storage', 'public', $oferta->imagen);
        Storage::delete($url);
        DB::delete('DELETE FROM oferta WHERE id = ?', [$id]);
        return redirect('/admin/listOferta');
    }

    public static function existeInscritos($id)
    {
        $numInscritos = DB::table('Oferta')
            ->join('aspi_oferta', 'id', '=', 'id_oferta')
            ->where('oferta.id', '=', $id)
            ->get();
        return (count($numInscritos));
    }
    
}
