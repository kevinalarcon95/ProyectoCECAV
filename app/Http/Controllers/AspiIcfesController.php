<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Role;

use App\Models\AspiIcfes;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;

class AspiIcfesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }
    public function list()
    {
        
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
     * @param  \App\Models\AspiIcfes  $aspiIcfes
     * @return \Illuminate\Http\Response
     */
    public function show(AspiIcfes $aspiIcfes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AspiIcfes  $aspiIcfes
     * @return \Illuminate\Http\Response
     */
    public function edit(AspiIcfes $aspiIcfes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AspiIcfes  $aspiIcfes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AspiIcfes $aspiIcfes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AspiIcfes  $aspiIcfes
     * @return \Illuminate\Http\Response
     */
    public function destroy(AspiIcfes $aspiIcfes)
    {
        //
    }
}
