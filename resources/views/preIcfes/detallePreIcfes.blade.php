@extends('layouts.template')

@section('content')
<!--Detalles oferta-->
<div class="container my-4">
    <div class="row">
        <div class="col-6">
            <img src="{{ asset($objPreIcfes->imagen) }}" alt="" width="520" height="600" style="border-radius: 15px;">
        </div>
        <div class="col-6">
            <h3 style="color: #800000;">{{$objPreIcfes->nombre}}</h3>
            <p class="text-justify mt-4" style="text-align: justify;">
                {{$objPreIcfes->descripcion}}
            </p>
        </div>
    </div>
    <div class="row mt-3">
        <h5 style="color: #800000;">Inicio y finalización de clases:</h5>
        <p>{{$objPreIcfes->fecha_inicio}} al {{$objPreIcfes->fecha_fin}}</p>
    </div>
    <div class="row">
        <h5 style="color: #800000;">Horarios lunes a viernes:</h5>
        <p>{{$objPreIcfes->horario}}</p>
    </div>
    <div class="row">
        <h5 style="color: #800000;">Duración:</h5>
        <p>{{$objPreIcfes->duracion}}</p>
    </div>
    <div class="row">
        <h5 style="color: #800000;">Valor de la inversión:</h5>
        <p>${{$objPreIcfes->valor}}</p>
    </div>
    <div class="row">
        <h5 style="color: #800000;">Poblacion Objetivo:</h5>
        <p>{{$objPreIcfes->poblacion_objetivo}}</p>
    </div>
    <div class="row">
        <h5 style="color: #800000;">Pasos para inscribirse:</h5>
        <p>{{$objPreIcfes->pasos_inscripcion}}</p>
    </div>
    <div class="row">
        <h5 style="color: #800000;">Estructura del curso:</h5>
        <p>{{$objPreIcfes->estructura}}</p>
    </div>
    <div class="row">
        <p>Incluye tres (3) simulacros tipo ICFES.</p>
    </div>


</div>
<!-- fin detalles oferta -->
<script>
    initialize();
</script>
@endsection