@extends('layouts.template')


@section('content')
<!--Inicia sección Agro oferta-->
<section name="oferta" id="oferta" class="container-fluid" style="display: fluid !important;">

    <div class="row text-center mt-5 mb-3">
        <h2 class="fw-bold">OFERTAS E INSCRIPCIONES</h2>
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
        @foreach ($objOferta as $objOferta)
        <div class="col-lg-4 col-sm-12 p-3">
            <div class="card">
                <img class="card-img-top" src="{{ asset($objOferta->imagen) }}" alt="Card image cap" width="">
                <div class="card-body">

                    <h5 class="card-text">{{$objOferta->nombre}}</h5>

                    <p>Costo: {{$objOferta->costo}}</p>
                    <p>Fecha de inicio: {{$objOferta->fecha_inicio}}</p>
                    <p>Fecha de finalizacion: {{$objOferta->fecha_fin}}</p>

                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn btn-primary" style="background:#04153B; border:none;">Más detalles</button>
                        </div>
                        <div class="col-6 text-end">
                            <button type="button" class="btn btn-primary" style="background:#004AAD; border:none;">Inscribirse</button>
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