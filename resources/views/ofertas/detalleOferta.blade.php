@extends('layouts.template')

@section('content')
<!--Detalles oferta-->
<div class="container my-4">
    <div class="row">
        <div class="col-5">
            <img src="{{ asset($objOferta->imagen) }}" alt="" width="400" height="420" style="border-radius: 15px;">
        </div>
        <div class="col-7">
            <h5>{{$objOferta->nombre}}</h5>
            <p class="text text-justify">
                {{$objOferta->descripcion}}
            </p>
        </div>
    </div>
    <div class="row mt-5">
        <h5>Poblacion Objetivo:</h5>
        <p>{{$objOferta->poblacion_objetivo}}</p>
    </div>
    <div class="row mt-4">
        <h5>Horario:</h5>
        <p>{{$objOferta->intensidad_horario}}</p>
    </div>
    <div class="row mt-4">
        <h5 >Valor de la inversión:</h5>
        <p >{{$objOferta->poblacion_objetivo}}</p>
    </div>
    <div class="row mt-4">
        <h5>Limite de cupos:</h5>
        <p >{{$objOferta->limite_cupos}}</p>
    </div>

</div>
<!-- fin detalles oferta -->
<script>

initialize();

</script>
@endsection