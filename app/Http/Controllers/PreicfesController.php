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
        return view('preIcfes.index') ->with ( 'objPreIcfes', $objPreIcfes);
    }

    public function list()
    {
        $datosPreicfes['arrayPreicfes'] = Preicfes::all();
        return view('preicfes.list', $datosPreicfes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $opcionesTipoCurso = ['Virtual', 'Presencial'];
        return view('preicfes.create', compact('opcionesTipoCurso'));
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
        $campos = [
            'nombre' => 'required|string',
            'imagen' => 'required|max:2048|mimes:jpeg,png,jpg',
            'tipo_curso' => 'in:Virtual,Presencial',
            'descripcion' => 'required|string',
            'valor' => 'required|numeric|min:0',
            'poblacion_objetivo' => 'required|string',
            'estructura' => 'required|string',
            'horario' => 'required',
            'duracion' => 'required|string',
            'pasos_inscripcion' => 'required|string',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'fecha_inicio' => 'required|date|after_or_equal:fecha_fin_inscripcion',
            'fecha_fin_inscripcion' => 'required|date|after_or_equal:fecha_inicio_inscripcion',
            'fecha_inicio_inscripcion' => 'required|date|after_or_equal:today',
        ];
        $mensaje = [
            'tipo_curso.in' => 'Se debe seleccionar una opcion de tipo Curso',
            'fecha_inicio_inscripcion.after_or_equal' => 'El campo fecha inicio inscripcion debe ser una fecha posterior o igual a hoy'
        ];

        $this->validate($request, $campos, $mensaje);

        //Se traen todos los datos del formulario
        $datosPreicfes = request()->except('_token');

        //Se le da formato al horario
        //$datosPreicfes['horario'] = $datosPreicfes['jornadaM1'] . ' y ' . $datosPreicfes['jornadaM2'] . ' y ' . $datosPreicfes['jornadaT1'] . ' y ' . $datosPreicfes['jornadaT2'];
        //Se eliminan los campos en los que se capturan las horas
        //unset($datosPreicfes['jornadaM1'], $datosPreicfes['jornadaM2'], $datosPreicfes['jornadaT1'], $datosPreicfes['jornadaT2']);


        $datosPreicfes['imagen'] = Storage::url($request->file('imagen')->store('public/preicfes'));

        try {
            Preicfes::insert($datosPreicfes);
            Toastr::success('¡Su registro fue exitoso!', '', ["positionClass" => "toast-top-right"]);
            return redirect('/admin/listPreicfes');
        } catch (Throwable $e) {
            //dd($e);
            Toastr::error('¡Error al crear su registro!', '', ["positionClass" => "toast-top-right"]);
            //Toastr::error('¡Error al crear su registro!','');
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
        $objPreIcfes = Preicfes::findOrFail($id);    
        return view('preIcfes.detallePreIcfes')->with('objPreIcfes', $objPreIcfes);
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
        $opcionesTipoCurso = ['Virtual', 'Presencial'];
        return view('preicfes.edit', compact('preicfes', 'opcionesTipoCurso'));
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
        $campos = [
            'nombre' => 'required|string',
            'imagen' => 'max:2048|mimes:jpeg,png,jpg',
            'tipo_curso' => 'in:Virtual,Presencial',
            'descripcion' => 'required|string',
            'valor' => 'required|numeric|min:0',
            'poblacion_objetivo' => 'required|string',
            'estructura' => 'required|string',
            'horario' => 'required',
            'duracion' => 'required|string',
            'pasos_inscripcion' => 'required|string',
            'fecha_fin' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin_inscripcion' => 'required',
            'fecha_inicio_inscripcion' => 'required',
        ];
        $mensaje = [
            'tipo_curso.in' => 'Se debe seleccionar una opcion de tipo Curso'
        ];

        $this->validate($request, $campos, $mensaje);

        $datos = request()->except(['_token', '_method']);

        if ($request->hasFile('imagen')) {
            $datosTemporal = Preicfes::findOrFail($id);
            $url = str_replace('storage', 'public', $datosTemporal->imagen);
            Storage::delete($url);
            $datos['imagen'] = Storage::url($request->file('imagen')->store('public/preicfes'));
        }


        //Se le da formato al horario
        //$datos['horario'] = $datos['jornadaM1'] . ' y ' . $datos['jornadaM2'] . ' y ' . $datos['jornadaT1'] . ' y ' . $datos['jornadaT2'];
        //Se eliminan los campos en los que se capturan las horas
        //unset($datos['jornadaM1'], $datos['jornadaM2'], $datos['jornadaT1'], $datos['jornadaT2']);


        try {
            Preicfes::where('id', '=', $id)->update($datos);
            Toastr::success('¡Actualizo exitoso!', '', ["positionClass" => "toast-top-right"]);
            return redirect('/admin/listPreicfes');
        } catch (Throwable $e) {
            //dd($e);
            Toastr::error('¡Error al actualizar !', '', ["positionClass" => "toast-top-right"]);
            //Toastr::error('¡Error al crear su registro!','');

            $preicfes = Preicfes::findOrFail($id);
            $opcionesTipoCurso = ['Virtual', 'Presencial'];
            return view('preicfes.edit', compact('preicfes', 'opcionesTipoCurso'));
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
            DB::delete('DELETE FROM preicfes WHERE id = ?', [$id]);
            Toastr::success('¡Registro eliminado exitosamente!', '', ["positionClass" => "toast-top-right"]);
            return redirect('/admin/listPreicfes');
        } catch (Throwable $e) {
            Toastr::error('¡Error al eliminar!', '', ["positionClass" => "toast-top-right"]);
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
