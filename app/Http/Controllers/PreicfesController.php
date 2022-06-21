<?php

namespace App\Http\Controllers;

use App\Models\Preicfes;
use Illuminate\Http\Request;

class PreicfesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('preIcfes.formInscripcion');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Preicfes  $preicfes
     * @return \Illuminate\Http\Response
     */
    public function show(Preicfes $preicfes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Preicfes  $preicfes
     * @return \Illuminate\Http\Response
     */
    public function edit(Preicfes $preicfes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Preicfes  $preicfes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Preicfes $preicfes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Preicfes  $preicfes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Preicfes $preicfes)
    {
        //
    }
}
