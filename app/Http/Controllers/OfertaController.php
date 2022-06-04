<?php

namespace App\Http\Controllers;

use App\Models\Oferta;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
//use Toastr;
use Throwable;

class OfertaController extends Controller
{
    public function index()
    {
        return view('ofertas.ofertas');
    }

    protected function create(Request $prmRequest)
    {
        $nombre = $prmRequest->input('nombre');
        $correo = $prmRequest->input('correo');

        try {
            Oferta::create([
                'nombre' => $nombre,
                'correo' => $correo,               
            ]);
            Toastr::success('¡Su registro fue exitoso!', '');
            return view('ofertas.ofertas');
        } catch (Throwable $e) {
            Toastr::error('¡Error al crear el registro!', '');
            return view('ofertas.ofertas');
        }
    }
}
