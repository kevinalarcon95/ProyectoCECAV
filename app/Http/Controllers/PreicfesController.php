<?php

namespace App\Http\Controllers;

use App\Models\Preicfes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Throwable;

class PreicfesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objPreIcfes = Preicfes::all();
        return view('preIcfes.index')->with('objPreIcfes', $objPreIcfes);
    }

    public function list()
    {
        $fecha_actual = date("y-m-d");
        $fecha_pasada = date("y-m-d", strtotime($fecha_actual . "-5 years"));
        $datosPreicfes['arrayPreicfes'] = Preicfes::where('fecha_inicio', '>=', $fecha_pasada)->get();
        $datosPreicfes['arrayPreicfes'] = Preicfes::select(
            "preicfes.id",
            "preicfes.nombre",
            "preicfes.descripcion",
            "preicfes.imagen",
            "preicfes.fecha_inicio",
            "preicfes.fecha_fin",
            "preicfes.fecha_inicio_inscripcion",
            "preicfes.fecha_fin_inscripcion",
            "preicfes.duracion",
            "preicfes.valor",
            "preicfes.tipo_curso",
            "preicfes.poblacion_objetivo",
            "preicfes.estructura",
            "preicfes.pasos_inscripcion",
            DB::raw("GROUP_CONCAT(horario_preicfes.horario) as `horario`")
        )
            ->from('preicfes')
            ->join('horario_preicfes', 'horario_preicfes.id_preicfes', '=', 'preicfes.id')
            ->groupby(
                'preicfes.id',
                "preicfes.id",
                "preicfes.nombre",
                "preicfes.descripcion",
                "preicfes.imagen",
                "preicfes.fecha_inicio",
                "preicfes.fecha_fin",
                "preicfes.fecha_inicio_inscripcion",
                "preicfes.fecha_fin_inscripcion",
                "preicfes.duracion",
                "preicfes.valor",
                "preicfes.tipo_curso",
                "preicfes.poblacion_objetivo",
                "preicfes.estructura",
                "preicfes.pasos_inscripcion",
            )
            ->where('fecha_inicio', '>=', $fecha_pasada)
            ->get();

        return view('preicfes.list', $datosPreicfes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('preicfes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //Falta validar fechas y horas
        $request->validate([
            'nombrePreicfes' => 'required|string',
            'imagenPreicfes' => 'required|image|mimes:jpeg,png,jpg,svg1|dimensions:min_width=100,min_height=200|max:5000',
            'tipo_cursoPreicfes' => 'in:Virtual,Presencial',
            'descripcionPreicfes' => 'required|string',
            'valorPreicfes' => 'required|numeric|min:0',
            'poblacion_objetivoPreicfes' => 'required|string',
            'estructuraPreicfes' => 'required|string',
            'horario' => 'required',
            'duracionPreicfes' => 'required|string',
            'pasos_inscripcionPreicfes' => 'required|string',
            'fecha_inicio_inscripcionPreicfes' => 'required|date|after_or_equal:today',
            'fecha_fin_inscripcionPreicfes' => 'required|date|after_or_equal:fecha_inicio_inscripcionPreicfes|before:fecha_inicioPreicfes|before:fecha_finPreicfes',
            'fecha_inicioPreicfes' => 'required|date|after_or_equal:fecha_inicio_inscripcionPreicfes|after_or_equal:fecha_fin_inscripcionPreicfes|before:fecha_finPreicfes',
            'fecha_finPreicfes' => 'required|date|after_or_equal:fecha_inicio_inscripcionPreicfes|after_or_equal:fecha_fin_inscripcionPreicfes|after_or_equal:fecha_inicioPreicfes',
        ],[
            'fecha_inicio_inscripcionPreicfes.after_or_equal'  => '*El campo Fecha inicio debe ser una fecha posterior o igual a hoy',
        ]);
        $datosPreicfes = request()->except('_token');

        $horario = $datosPreicfes['horario'];
        unset($datosPreicfes['horario']);


        $nombre = $request->input('nombrePreicfes');
        $imagen = Storage::url($request->file('imagenPreicfes')->store('public/preicfes'));
        $tipoCurso = $request->input('tipo_cursoPreicfes');
        $descripcion = $request->input('descripcionPreicfes');
        $valor = $request->input('valorPreicfes');
        $poblacion_objetivo = $request->input('poblacion_objetivoPreicfes');
        $estructura = $request->input('estructuraPreicfes');
        $duracion = $request->input('duracionPreicfes');
        $pasos_inscripcion = $request->input('pasos_inscripcionPreicfes');
        $fecha_inicio_inscripcion = $request->input('fecha_inicio_inscripcionPreicfes');
        $fecha_fin_inscripcion = $request->input('fecha_fin_inscripcionPreicfes');
        $fecha_inicio = $request->input('fecha_inicioPreicfes');
        $fecha_fin = $request->input('fecha_finPreicfes');
        
        try {
            Preicfes::create([
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'imagen' => $imagen,
                'fecha_inicio' => $fecha_inicio,
                'fecha_fin' => $fecha_fin,
                'fecha_inicio_inscripcion' => $fecha_inicio_inscripcion,
                'fecha_fin_inscripcion' => $fecha_fin_inscripcion,
                'duracion' => $duracion,
                'valor' => $valor,
                'tipo_curso' => $tipoCurso,
                'poblacion_objetivo' => $poblacion_objetivo,
                'estructura' => $estructura,
                'pasos_inscripcion' => $pasos_inscripcion,
            ]);
            $idPreicfes = Preicfes::latest('id')->first()->id;
            for ($i = 0; $i < count($horario); $i++) {
                DB::table('horario_preicfes')->insertGetId(
                    [
                        'id_preicfes' => $idPreicfes,
                        'horario' => $horario[$i]
                    ]
                );
            }
            Toastr::success('¡Su registro fue exitoso!', 'Exito', ["positionClass" => "toast-top-right"]);
            return redirect('/admin/listPreicfes');
        } catch (Throwable $e) {
            dd($e);
            Toastr::error('¡Error al crear su registro!', 'Error', ["positionClass" => "toast-top-right"]);
            return redirect('/admin/createPreicfes');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Preicfes  $preicfes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $objHorario = DB::table('horario_preicfes')->where('id_preicfes', '=', $id)->pluck('horario','id');
        $objPreIcfes = Preicfes::findOrFail($id);
        return view('preIcfes.detallePreIcfes', compact('objHorario'))->with('objPreIcfes', $objPreIcfes);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Preicfes  $preicfes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $preicfes = Preicfes::findOrFail($id);
        $horarios = Preicfes::select(
            'horario'
        )->from('horario_preicfes')->where('id_preicfes', '=', $id)->get();;

        return view('preicfes.edit', compact('preicfes', 'horarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Preicfes  $preicfes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombrePreicfes' => 'required|string',
            'imagenPreicfes' => 'image|mimes:jpeg,png,jpg,svg1|dimensions:min_width=100,min_height=200|max:5000',
            'tipo_cursoPreicfes' => 'in:Virtual,Presencial',
            'descripcionPreicfes' => 'required|string',
            'valorPreicfes' => 'required|numeric|min:0',
            'poblacion_objetivoPreicfes' => 'required|string',
            'estructuraPreicfes' => 'required|string',
            'horario' => 'required',
            'duracionPreicfes' => 'required|string',
            'pasos_inscripcionPreicfes' => 'required|string',
            'fecha_inicio_inscripcionPreicfes' => 'required|date',
            'fecha_fin_inscripcionPreicfes' => 'required|date|after_or_equal:fecha_inicio_inscripcionPreicfes|before:fecha_inicioPreicfes|before:fecha_finPreicfes',
            'fecha_inicioPreicfes' => 'required|date|after_or_equal:fecha_inicio_inscripcionPreicfes|after_or_equal:fecha_fin_inscripcionPreicfes|before:fecha_finPreicfes',
            'fecha_finPreicfes' => 'required|date|after_or_equal:fecha_inicio_inscripcionPreicfes|after_or_equal:fecha_fin_inscripcionPreicfes|after_or_equal:fecha_inicioPreicfes',
        ]);

        $datos = request()->except(['_token', '_method']);
        //Sacar los horarios aparte
        $horario = $datos['horario'];
        $updateData = Preicfes::findOrFail($id);
        $updateData->nombre = $request->input('nombrePreicfes');
        //Si se cambia la Imagen
        if ($request->hasFile('imagen')) {
            $url = str_replace('storage', 'public', $updateData->imagen);
            Storage::delete($url);
            $updateData->imagen = Storage::url($request->file('imagenPreicfes')->store('public/preicfes'));
        }
        $updateData->tipo_curso = $request->input('tipo_cursoPreicfes');
        $updateData->descripcion = $request->input('descripcionPreicfes');
        $updateData->valor = $request->input('valorPreicfes');
        $updateData->poblacion_objetivo = $request->input('poblacion_objetivoPreicfes');
        $updateData->estructura = $request->input('estructuraPreicfes');
        $updateData->duracion = $request->input('duracionPreicfes');
        $updateData->pasos_inscripcion = $request->input('pasos_inscripcionPreicfes');
        $updateData->fecha_inicio_inscripcion = $request->input('fecha_inicio_inscripcionPreicfes');
        $updateData->fecha_fin_inscripcion = $request->input('fecha_fin_inscripcionPreicfes');
        $updateData->fecha_inicio = $request->input('fecha_inicioPreicfes');
        $updateData->fecha_fin = $request->input('fecha_finPreicfes');
        
        try {
            $updateData->save();
            DB::delete('DELETE FROM horario_preicfes WHERE id_preicfes = ?', [$id]);
            for ($i = 0; $i < count($horario); $i++) {
                DB::table('horario_preicfes')->insertGetId(
                    [
                        'id_preicfes' => $id,
                        'horario' => $horario[$i]
                    ]
                );
            }
            Toastr::success('¡Su registro fue actualizado!', 'Exito', ["positionClass" => "toast-top-right"]);
            return redirect('/admin/listPreicfes');
        } catch (Throwable $e) {
            Toastr::error('¡Error al actualizar !', 'Error', ["positionClass" => "toast-top-right"]);
            return redirect('/admin/updatePreicfes/'.$id)->withInput();
        }
    }


    public function copy($id)
    {
        $preicfes = Preicfes::findOrFail($id);
        $horarios = Preicfes::select(
            'horario'
        )->from('horario_preicfes')->where('id_preicfes', '=', $id)->get();;

        return view('preicfes.duplicar', compact('preicfes', 'horarios'));
    }

    public function copyS(Request $request,$id)
    {
        //Falta validar fechas y horas
        
        $request->validate([
            'nombrePreicfes' => 'required|string',
            'imagenPreicfes' => 'required|image|mimes:jpeg,png,jpg,svg1|dimensions:min_width=100,min_height=200|max:5000',
            'tipo_cursoPreicfes' => 'in:Virtual,Presencial',
            'descripcionPreicfes' => 'required|string',
            'valorPreicfes' => 'required|numeric|min:0',
            'poblacion_objetivoPreicfes' => 'required|string',
            'estructuraPreicfes' => 'required|string',
            'horario' => 'required',
            'duracionPreicfes' => 'required|string',
            'pasos_inscripcionPreicfes' => 'required|string',
            'fecha_inicio_inscripcionPreicfes' => 'required|date',
            'fecha_fin_inscripcionPreicfes' => 'required|date|after_or_equal:fecha_inicio_inscripcionPreicfes|before:fecha_inicioPreicfes|before:fecha_finPreicfes',
            'fecha_inicioPreicfes' => 'required|date|after_or_equal:fecha_inicio_inscripcionPreicfes|after_or_equal:fecha_fin_inscripcionPreicfes|before:fecha_finPreicfes',
            'fecha_finPreicfes' => 'required|date|after_or_equal:fecha_inicio_inscripcionPreicfes|after_or_equal:fecha_fin_inscripcionPreicfes|after_or_equal:fecha_inicioPreicfes',
        ],[
            'fecha_inicio_inscripcionPreicfes.after_or_equal'  => '*El campo Fecha inicio debe ser una fecha posterior o igual a hoy',
        ]);
        $datos = request()->except(['_token', '_method']);
        $horario = $datos['horario'];
        unset($datos['horario']);

       
        $originData = Preicfes::findOrFail($id);
        $updateData = Preicfes::findOrFail($id);

        
        $updateData->nombre = $request->input('nombrePreicfes');
        if ($request->hasFile('imagenPreicfes')) {
            $updateData->imagen = Storage::url($request->file('imagenPreicfes')->store('public/preicfes'));
        }
        $updateData->tipo_curso = $request->input('tipo_cursoPreicfes');
        $updateData->descripcion = $request->input('descripcionPreicfes');
        $updateData->valor = $request->input('valorPreicfes');
        $updateData->poblacion_objetivo = $request->input('poblacion_objetivoPreicfes');
        $updateData->estructura = $request->input('estructuraPreicfes');
        $updateData->duracion = $request->input('duracionPreicfes');
        $updateData->pasos_inscripcion = $request->input('pasos_inscripcionPreicfes');
        $updateData->fecha_inicio_inscripcion = $request->input('fecha_inicio_inscripcionPreicfes');
        $updateData->fecha_fin_inscripcion = $request->input('fecha_fin_inscripcionPreicfes');
        $updateData->fecha_inicio = $request->input('fecha_inicioPreicfes');
        $updateData->fecha_fin = $request->input('fecha_finPreicfes');
 
        try {
            if(!($originData->fecha_inicio == $updateData->fecha_inicio) && !($originData->fecha_inicio_inscripcion == $updateData->fecha_inicio_inscripcion) && !($originData->fecha_fin == $updateData->fecha_fin) && !($originData->fecha_fin_inscripcion == $updateData->fecha_fin_inscripcion)){
                Preicfes::create([
                    'nombre' => $updateData->nombre,
                    'descripcion' => $updateData->descripcion,
                    'imagen' => $updateData->imagen,
                    'fecha_inicio' => $updateData->fecha_inicio,
                    'fecha_fin' => $updateData->fecha_fin,
                    'fecha_inicio_inscripcion' => $updateData->fecha_inicio_inscripcion,
                    'fecha_fin_inscripcion' => $updateData->fecha_fin_inscripcion,
                    'duracion' => $updateData->duracion,
                    'valor' => $updateData->valor,
                    'tipo_curso' => $updateData->tipo_curso,
                    'poblacion_objetivo' => $updateData->poblacion_objetivo,
                    'estructura' => $updateData->estructura,
                    'pasos_inscripcion' => $updateData->pasos_inscripcion,
                ]);
                $idPreicfes = Preicfes::latest('id')->first()->id;
                for ($i = 0; $i < count($horario); $i++) {
                    DB::table('horario_preicfes')->insertGetId(
                        [
                            'id_preicfes' => $idPreicfes,
                            'horario' => $horario[$i]
                        ]
                    );
                }
                Toastr::success('¡Su registro fue exitoso!', 'Exito', ["positionClass" => "toast-top-right"]);
                return redirect('/admin/listPreicfes');
            }else{
                Toastr::info('Se deben modificar las fechas de inscripcion y de clases', 'Información', ["positionClass" => "toast-top-right"]);
                return redirect('/admin/copyPreicfes/'.$id)->withInput();
            }

        } catch (Throwable $e) {
            Toastr::error('¡Error al crear su registro!', 'Error', ["positionClass" => "toast-top-right"]);
            return redirect('/admin/copyPreicfes/'.$id)->withInput();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Preicfes  $preicfes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $preicfes = Preicfes::findOrFail($id);
        $url = str_replace('storage', 'public', $preicfes->imagen);
        Storage::delete($url);
        try {
            DB::delete('DELETE FROM horario_preicfes WHERE id_preicfes = ?', [$id]);
            DB::delete('DELETE FROM preicfes WHERE id = ?', [$id]);
            Toastr::success('¡Registro eliminado exitosamente!', 'Exitoso', ["positionClass" => "toast-top-right"]);
            return redirect('/admin/listPreicfes');
        } catch (Throwable $e) {
            Toastr::error('¡Error al eliminar!', 'Error', ["positionClass" => "toast-top-right"]);
            return redirect('/admin/listPreicfes');
        }
    }

    public static function existeInscritos($id)
    {
        $numInscritos = DB::table('Preicfes')
            ->join('aspi_icfes', 'id', '=', 'id_icfes')
            ->where('preicfes.id', '=', $id)
            ->get();
        return (count($numInscritos));
    }

    
}
