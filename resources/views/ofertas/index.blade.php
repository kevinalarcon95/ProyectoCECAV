@extends('layouts.template')


@section('content')
<!--Inicia sección Agro oferta-->
<section name="oferta" id="oferta" class="container-fluid" style="display: fluid !important;">

    <div class="row text-center mt-5 mb-3">
        <h2 class="fw-bold">OFERTAS E INSCRIPCIONES</h2>
    </div>

    <!--Buscador-->
    <div class="row">
        <div class="col-12"></div>
        <form action="#" method="">
            <div class="form-row">
                <div class="col-6 text-end">
                    <div class="input-group mb-3">
                        <input type="search" class="form-control" name="buscadorOferta" placeholder="Buscar" aria-describedby="button-addon2" value="" style="background:#ECECEC;">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2" style="background:#04153B;">Buscar </button>
                    </div>
                </div>
                <div class="col"></div>
            </div>
        </form>
    </div>
    <!--Fin Buscador-->

    <!-- cards -->
    <div class="row ml-5 mr-5 mb-4">
        @foreach ($objOferta as $objOferta)
        <div class="col-lg-4 col-sm-12 p-3">
            <div class="card">
                <div class="box img">
                    <img class="card-img-top" src="{{ asset($objOferta->imagen) }}" alt="Card image cap"" >
                </div>

                <div class=" card-body">

                    <h5 class="card-text">{{$objOferta->nombre}}</h5>

                    <p>Costo: $ {{$objOferta->costo}}</p>
                    <p>Fecha de inicio: {{$objOferta->fecha_inicio}}</p>
                    <p>Fecha de finalizacion: {{$objOferta->fecha_fin}}</p>

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