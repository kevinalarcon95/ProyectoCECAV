@extends('layouts.template')


@section('content')
<!--Inicia sección Agro oferta-->
<section name="oferta" id="oferta" class="container-fluid" style="display: fluid !important;">

    <div class="row text-center mt-5 mb-3">
        <h2 class="fw-bold">OFERTAS E INSCRIPCIONES</h2>
    </div>

    <!--Buscador-->
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
    <!--Fin Buscador-->   
    <!-- cards -->
    <div class="row ml-5 mr-5 mb-4">
        @foreach ($objOferta as $objOferta)
        <div class="col-lg-4 col-sm-12 p-3">
            <div class="card">
                <div class="box img">
                    <img class="card-img-top" src="{{ asset($objOferta->imagen) }}" alt="Card image cap">
                </div>

                <div class=" card-body mb-2">
                    <h5 class="card-text" style="color: #800000;">{{$objOferta->nombre}}</h5>
                    <p class=""><strong>Población Objetivo:</strong> {{$objOferta->poblacion_objetivo}}</p>
                    <p><strong>Fecha de inicio:</strong> {{$objOferta->fecha_inicio}}</p>
                    <p><strong>Fecha de finalización:</strong> {{$objOferta->fecha_fin}}</p>
                    <div class="row">
                        <div class="col-6">
                            <a type="button" href="{{ url('/detalleOferta/') }}{{'/'}}{{ $objOferta->id }} " class="btn btn-primary" style="background:#04153B; border:none;">Más detalles</a>
                        </div>
                        <div class="col-6 text-end">
                            <a type="button" href="{{ url('/inscripcionOferta/') }}{{'/'}}{{ $objOferta->id }} " class="btn btn-primary" style="background:#004AAD; border:none;">Inscribirse</a>
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