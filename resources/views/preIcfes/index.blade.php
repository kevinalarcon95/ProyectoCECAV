@extends('layouts.template')


@section('content')
<!--Inicia sección Agro oferta-->
<section name="oferta" id="oferta" class="container-fluid" style="display: fluid !important;">

    <div class="row text-center mt-5 mb-3">
        <h2 class="fw-bold">OFERTAS E INSCRIPCIONES PREICFES</h2>
    </div>

    <div class="row">
        <div class="col"></div>
        <div class="col">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Buscar" aria-describedby="button-addon2" style="background:#ECECEC;">
                <button class="btn btn-outline-secondary" type="button" id="button-addon2" style="background:#04153B;">Buscar </button>
            </div>
        </div>
        <div class="col"></div>
    </div>

    <!-- cards -->
    <div class="row ml-5 mr-5 mb-4">
        @foreach ($objPreIcfes as $objPreIcfes)
        <div class="col-lg-4 col-sm-12 p-3">
            <div class="card">
                <div class="box img">
                    <img class="card-img-top" src="{{ asset($objPreIcfes->imagen) }}" alt="Card image cap"" >
                </div>

                <div class=" card-body">

                    <h5 class="card-text" style="color: #800000;">{{$objPreIcfes->nombre}}</h5>
                    <p class=""><strong>Población objetivo:</strong> {{$objPreIcfes->poblacion_objetivo}}</p>
                    <p><strong>Costo: </strong>$ {{$objPreIcfes->valor}}</p>
                    <p><strong>Fecha de inicio:</strong> {{ \Carbon\Carbon::parse($objPreIcfes->fecha_inicio)->translatedFormat('l d \d\e F \d\e\l Y')}}</p>
                    <p><strong>Fecha de finalización:</strong> {{ \Carbon\Carbon::parse($objPreIcfes->fecha_fin)->translatedFormat('l d \d\e F \d\e\l Y')}}</p>
                    <div class="row">
                        <div class="col-6">
                            <a type="button" href="{{ url('/detallePreIcfes/') }}{{'/'}}{{ $objPreIcfes->id }}" class="btn btn-primary" style="background:#04153B; border:none;">Más detalles</a>
                        </div>
                        <div class="col-6 text-end">
                            <a type="button" href="{{ url('/inscripcionPreIcfes/') }}{{'/'}}{{ $objPreIcfes->id }}" class="btn btn-primary" style="background:#004AAD; border:none;">Inscribirse</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- fin cards -->
</section>
@endsection

<style>
    .box img {
        width: 100%;
        height: auto;
    }

    @supports(object-fit: cover) {
        .box img {
            height: 100%;
            object-fit: cover;
            object-position: center center;
        }
    }
</style>