@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row my-5 text-center">
        <h3>Mis Ofertas</h3>
    </div>
    <div class="row">
        @if($cantAspiOferta != 0)
        @foreach($objInscripcion as $objInscripcion)
        <div class="row mb-3">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{$objInscripcion->id}}">
                        <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$objInscripcion->id}}" aria-expanded="true" aria-controls="collapseOne">
                            <div class="col-6" style="color: #800000;">
                                {{$objInscripcion->nombre}}
                            </div>
                            <div class="col-5 text-end" style="color:#181D40;">
                                Inscrito el {{\Carbon\Carbon::parse($objInscripcion->created_at, 'UTC')->translatedFormat('l d \d\e F \d\e\l Y')}}
                            </div>
                        </button>
                    </h2>
                    <div id="collapse{{$objInscripcion->id}}" class="accordion-collapse collapse " aria-labelledby="heading{{$objInscripcion->id}}">
                        <div class="accordion-body justify-content row">
                            <div class="col-2" style="text-align: center; display: flex; justify-content: center; align-items: center;"><img class="img-thumbnail img-fluid" id="imagenSeleccionada" src="@if(isset($objInscripcion->imagen)){{ asset($objInscripcion->imagen) }}@endif" width="150" alt=""></div>
                            <div class="col-10 my-2">
                                @if($objInscripcion->costo == '0')
                                <div class="row mt-2">
                                    <p><strong>Costo o Inversión: Gratuito</strong></p>
                                </div>
                                @else
                                <div class="row mt-2">
                                    <p><strong>Costo o Inversión: {{$objInscripcion->costo}} </strong></p>
                                </div>
                                @endif
                                <p><strong>Fecha inicio:</strong> {{\Carbon\Carbon::parse($objInscripcion->fecha_inicio)->translatedFormat('l d \d\e F \d\e\l Y')}}</p>
                                <p><strong>Fecha fin:</strong> {{\Carbon\Carbon::parse($objInscripcion->fecha_fin)->translatedFormat('l d \d\e F \d\e\l Y')}}</p>
                                <p><strong>Unidad academica:</strong> {{$objInscripcion->unidad_academica}}</p>
                                <p><strong>Población objetivo:</strong> {{$objInscripcion->poblacion_objetivo}}</p>
                            </div>
                            <div class="row m-2" style="text-align: justify;">
                                <h4 style="color: #800000;">Presentación</h4>
                                <p class="text-justify mt-4" style="text-align: justify;">
                                    {{$objInscripcion->descripcion}}
                                </p>
                            </div>
                            <div class="row mt-3">
                                <div class="col" style="text-align: right;">
                                    <a type="button" class=" btn btn-secondary btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$objInscripcion->id}}">Eliminar Inscripción</a>
                                </div>
                            </div>
                            @include('cursosEstudiante.modalEliminar')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <h4 class="text-center">No hay inscripciones </h4>
        @endif
    </div>
</div>
@endsection