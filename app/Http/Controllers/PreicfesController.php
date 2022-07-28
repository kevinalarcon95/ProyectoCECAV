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
            'fecha_inicio_inscripcion' => 'required|date|after_or_equal:today',
            'fecha_fin_inscripcion' => 'required|date|after_or_equal:fecha_inicio_inscripcion|before:fecha_inicio|before:fecha_fin',
            'fecha_inicio' => 'required|date|after_or_equal:fecha_inicio_inscripcion|after_or_equal:fecha_fin_inscripcion|before:fecha_fin',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio_inscripcion|after_or_equal:fecha_fin_inscripcion|after_or_equal:fecha_inicio',
        ]);
        $datosPreicfes = request()->except('_token');

        $horario = $datosPreicfes['horario'];
        unset($datosPreicfes['horario']);
        $datosPreicfes['imagen'] = Storage::url($request->file('imagen')->store('public/preicfes'));

        try {
            $idPreicfes = DB::table('preicfes')->insertGetId($datosPreicfes);
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
            'fecha_inicio_inscripcion' => 'required|date|after_or_equal:today',
            'fecha_fin_inscripcion' => 'required|date|after_or_equal:fecha_inicio_inscripcion|before:fecha_inicio|before:fecha_fin',
            'fecha_inicio' => 'required|date|after_or_equal:fecha_inicio_inscripcion|after_or_equal:fecha_fin_inscripcion|before:fecha_fin',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio_inscripcion|after_or_equal:fecha_fin_inscripcion|after_or_equal:fecha_inicio',
            
        ]);

        $datos = request()->except(['_token', '_method']);
        $horario = $datos['horario'];
        unset($datos['horario']);

        if ($request->hasFile('imagen')) {
            $datosTemporal = Preicfes::findOrFail($id);
            $url = str_replace('storage', 'public', $datosTemporal->imagen);
            Storage::delete($url);
            $datos['imagen'] = Storage::url($request->file('imagen')->store('public/preicfes'));
        }

        try {
            Preicfes::where('id', '=', $id)->update($datos);
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
            return redirect('/admin/listPreicfes');
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
