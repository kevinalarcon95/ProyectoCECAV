@extends('layouts.template')

@section('content')
<!--Detalles oferta-->
<div class="container my-4">
    <div class="row">
        <div class="col-6">
            <img src="{{ asset($objOferta->imagen) }}" alt="" width="520" height="600" style="border-radius: 15px;">
        </div>
        <div class="col-6">
            <h3 style="color: #800000;">{{$objOferta->nombre}}</h3>
            <p class="text-justify mt-4" style="text-align: justify;">
                {{$objOferta->descripcion}}
            </p>
        </div>
    </div>
    <div class="row mt-5">
        <h5 style="color: #800000;">Poblacion Objetivo:</h5>
        <p>{{$objOferta->poblacion_objetivo}}</p>
    </div>
    <div class="row mt-2">
        <h5 style="color: #800000;">Horario:</h5>
        <p>{{$objOferta->intensidad_horario}}</p>
    </div>
    @if($objOferta->tipo_pago == 'No pago')
    <div class="row mt-2">
        <h5 style="color: #800000;">Valor de la inversión:</h5>
        <p>Gratuito</p>
    </div>
    @else
    <div class="row mt-2">
        <h5 style="color: #800000;">Valor de la inversión:</h5>
        <p>$ {{$objOferta->costo}}</p>
    </div>
    @endif
    <div class="row mt-2">
        <h5 style="color: #800000;">Limite de cupos:</h5>
        <p>{{$objOferta->limite_cupos}}</p>
    </div>

</div>
<!-- fin detalles oferta -->
<script>
    initialize();
</script>
@endsection