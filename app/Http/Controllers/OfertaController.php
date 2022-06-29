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
        $objOferta = Oferta::all();
        return view('ofertas.index')->with('objOferta', $objOferta);;
    }

    public function list()
    {
        $fecha_actual = date("d-m-y");
        $fecha_pasada = strtotime($fecha_actual."- 5 years");
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
            //->whereBetween('')
            //->where('oferta.fecha_inicio', 'BETWEEN', $fecha_pasada." AND ")
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
            'nombreOferta' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,Ü,_,-]+$/',
            'descripcionOferta' => 'required|string',
            'tipoPagoOferta' => 'required',
            'unidadAcademicaOferta' => 'required|string',
            'fechaInicioOferta' => 'required|date|after_or_equal:today',
            'resolucionOferta' => 'required|string',
            'intensidadHorarioOferta' => 'required|string',
            'cuposOferta' => 'required|numeric',
            'imagenOferta' => 'required|image',
            'poblacionOferta' => 'required|string|max:200',
            'categoriaOferta' => 'required',
            'costoOferta' => 'required|string',
            'fechaFinOferta' => 'required|date|after_or_equal:fechaInicioOferta|after:fechaCierreOferta',
            'tipoCursoOferta' => 'required',
            'fechaCierreOferta' => 'required|date|after:fechaInicioOferta'
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
            //dd($e);
            Toastr::error('¡Error al crear su registro!', '', ["positionClass" => "toast-top-right"]);
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
        $objOferta = Oferta::findOrFail($id);        
        $categoria = Categoria::pluck('nombre', 'id');        
        return view('ofertas.detalleOferta',compact('objOferta'))->with('categoria', $categoria);
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
        return view('ofertas.editar',compact('oferta'))->with('categoria', $categoria);
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
            'tipoPagoOferta' => 'required',
            'unidadAcademicaOferta' => 'required|string|max:200',
            'fechaInicioOferta' => 'required|date|after_or_equal:today',
            'resolucionOferta' => 'required|string',
            'intensidadHorarioOferta' => 'required|string',
            'cuposOferta' => 'required|numeric',
            //'imagenOferta' => 'required',
            'poblacionOferta' => 'required|string|max:200',
            'categoriaOferta' => 'required',
            'costoOferta' => 'required|numeric',
            'fechaFinOferta' => 'required|date|after_or_equal:fechaInicioOferta|after:fechaCierreOferta',
            'tipoCursoOferta' => 'required',
            'fechaCierreOferta' => 'required|date|after:fechaInicioOferta'
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


        $updateData->nombre = $nombreOferta;
        $updateData->descripcion = $descripcionOferta;
        $updateData->tipo_pago =  $tipoPagoOferta;
        $updateData->unidad_academica = $unidadAcademicaOferta;
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

        try{    
            if( $request->file('imagenOferta') == null){
            
            }else{
                $image_path = public_path().$updateData->imagen;
            unlink($image_path);
            
            $imagen = $request->file('imagenOferta')->store('public/ofertas');
            $url = Storage::url($imagen);
            $imagen = $url;
            $updateData ->imagen = $imagen;
            }
            

            $updateData->save();
            Toastr::success('¡Su registro fue actualizado exitosamente!', '', ["positionClass" => "toast-top-right"]);
            return redirect('/admin/listOferta');

        } catch (Throwable $e) {
            dd($e);
            Toastr::error('¡Error al crear su registro!', '', ["positionClass" => "toast-top-right"]);
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
