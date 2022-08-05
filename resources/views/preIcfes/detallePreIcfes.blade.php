@extends('layouts.template')

@section('content')
<!--Detalles oferta-->
<div class="container my-4">
    <div class="row my-3">
        <h5 style="color: #800000;">{{$objPreIcfes->nombre}}</h5>
    </div>
    <div class="row w-80 mb-2 text-center">
        <div class="col-12">
            <img src="{{ asset($objPreIcfes->imagen) }}" alt="" width="520" height="600" style="border-radius: 15px;">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h5 style="color: #800000;">Presentación:</h5>
            <p class="text-justify mt-4" style="text-align: justify;">
                {!!$objPreIcfes->descripcion!!}
            </p>
        </div>
    </div>
    <div class="row mt-2">
        <h5 style="color: #800000;">Inicio y finalización de clases:</h5>
        <p>{{ \Carbon\Carbon::parse($objPreIcfes->fecha_inicio)->translatedFormat('l d \d\e F \d\e\l Y')}} al {{ \Carbon\Carbon::parse($objPreIcfes->fecha_fin)->translatedFormat('l d \d\e F \d\e\l Y')}}</p>
    </div>
    <div class="row mt-2">
        <h5 style="color: #800000;">Horarios:</h5>
        @foreach($objHorario as $key => $value)
        <p>{{ $value }}</p>
        @endforeach
    </div>
    <div class="row mt-2">
        <h5 style="color: #800000;">Duración:</h5>
        <p>{{$objPreIcfes->duracion}}</p>
    </div>
    <div class="row mt-2">
        <h5 style="color: #800000;">Valor de la inversión:</h5>
        <p>${{$objPreIcfes->valor}}</p>
    </div>
    <div class="row mt-2">
        <h5 style="color: #800000;">Población objetivo:</h5>
        <p>{{$objPreIcfes->poblacion_objetivo}}</p>
    </div>
    <div class="row mt-2">
        <h5 style="color: #800000;">Pasos para inscribirse:</h5>
        <p>{{$objPreIcfes->pasos_inscripcion}}</p>
    </div>
    <div class="row mt-2">
        <h5 style="color: #800000;">Estructura del curso:</h5>
        <p>{{$objPreIcfes->estructura}}</p>
    </div>
    <div class="row mt-2">
        <p>Incluye tres (3) simulacros tipo icfes.</p>
    </div>
    <div class="col-12 text-end">
        <a type="button" href="{{ url('/inscripcionPreIcfes/') }}{{'/'}}{{ $objPreIcfes->id }}" class="btn btn-primary" style="background:#004AAD; border:none;">Inscribirse</a>
    </div>


</div>
<!-- fin detalles oferta -->
<script>
    initialize();
</script>
@endsection