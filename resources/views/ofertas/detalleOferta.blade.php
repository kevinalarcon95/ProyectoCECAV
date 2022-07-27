@extends('layouts.template')

@section('content')
<!--Detalles oferta-->
<div class="container my-4">
    <div class="row my-3">
        <h3 style="color: #800000;">{{$objOferta->nombre}}</h3>
    </div>
    <div class="row w-80 mb-2 text-center">
        <div class="col-12">
            <img src="{{ asset($objOferta->imagen) }}" alt="" width="520" height="600" style="border-radius: 15px;">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <h4 style="color: #800000;">Presentación</h4>
            <p class="text-justify mt-4" style="text-align: justify;">
                {{$objOferta->descripcion}}
            </p>
        </div>
    </div>
    <div class="row mt-2">
        <h5 style="color: #800000;">Poblacion Objetivo:</h5>
        <p>{{$objOferta->poblacion_objetivo}}</p>
    </div>
    <div class="row mt-2">
        <h5 style="color: #800000;">Intensidad horaria:</h5>
        <p>{{$objOferta->intensidad_horario}}</p>
    </div>
    @if($objOferta->costo== 0)
    <div class="row mt-2">
        <h5 style="color: #800000;">Valor de la inversión:</h5>
        <p>Gratuito</p>
    </div>
    @else
    <div class="row mt-2">
        <h5 style="color: #800000;">Valor de la inversión:</h5>
        <p>{{$objOferta->costo}}</p>
    </div>
    @endif
    @if($objOferta->limite_cupos == 0)
    <div class="row mt-2">
        <h5 style="color: #800000;">Limite de cupos:</h5>
        <p><strong>Cupos limitados</strong></p>
    </div>
    @else
    <div class="row mt-2">
        <h5 style="color: #800000;">Limite de cupos:</h5>
        <p>{{$objOferta->limite_cupos}}</p>
    </div>
    @endif

</div>
<!-- fin detalles oferta -->
<script>
    initialize();
</script>
@endsection