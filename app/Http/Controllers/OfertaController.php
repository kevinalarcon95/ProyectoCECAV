<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Role;
use Illuminate\Http\Request;
use Brian2694\Toastr\Toastr;
use App\Models\Oferta;
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

    public function list(){
        $objOferta = Oferta::all();
        return view('ofertas.list')->with('oferta',$objOferta);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $nombreOferta = $request->input('nombreOferta');
        $descripcionOferta = $request->input('descripcionOferta');

        try{
            Oferta::create([
               'nombreOferta' => $nombreOferta,
               'descripcionOferta' => $descripcionOferta,
            ]);

            Toastr::success('¡Su registro fue exitoso!','', ["positionClass" => "toast-top-center"]);
            return redirect('/admin/listOfertas');
        }catch (Throwable $e) {
            Toastr::error('¡Error al crear su registro!','');
            return redirect('/admin/listOfertas');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

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
