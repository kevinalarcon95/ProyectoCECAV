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
            <form class="row g-3 needs-validation" method="get" action="{{ url('/busquedaIcfes')}}">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="buscar" placeholder="Buscar" aria-describedby="button-addon2" style="background:#ECECEC;">
                    <button type ="submit" class="btn btn-outline-secondary" type="button" id="button-addon2" style="background:#04153B;">Buscar </button>
                </div>
            </form>
        </div>
        <div class="col"></div>
    </div>

    <!-- cards -->
    <div class="row ml-5 mr-5 mb-4">
        @foreach ($consulta as $consulta)
        <div class="col-lg-4 col-sm-12 p-3">
            <div class="card">
                <div class="box img">
                    <img class="card-img-top" src="{{ asset($consulta->imagen) }}" alt="Card image cap"" >
                </div>

                <div class=" card-body">

                    <h5 class="card-text" style="color: #800000;">{{$consulta->nombre}}</h5>                  
                    <p class=""><strong>Población Objetivo:</strong>    {{$objPreIcfes->poblacion_objetivo}} </p> 
                    <p><strong>Costo: </strong>$ {{$consulta->valor}}</p>
                    <p><strong>Fecha de inicio:</strong> {{ \Carbon\Carbon::parse($consulta->fecha_inicio)->translatedFormat('l d \d\e F \d\e\l Y')}}</p>
                    <p><strong>Fecha de finalización:</strong> {{ \Carbon\Carbon::parse($consulta->fecha_fin)->translatedFormat('l d \d\e F \d\e\l Y')}}</p>
                    <div class="row">
                        <div class="col-6">
                            <a type="button" href="{{ url('/detallePreIcfes/') }}{{'/'}}{{ $consulta->id }}" class="btn btn-primary" style="background:#04153B; border:none;">Más detalles</a>
                        </div>
                        <div class="col-6 text-end">
                            <a type="button" href="{{ url('/inscripcionPreIcfes/') }}{{'/'}}{{ $consulta->id }}" class="btn btn-primary" style="background:#004AAD; border:none;">Inscribirse</a>
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
    
   
    /*200%*/ 
    @media (min-width: 200px) and (max-width: 699px) { 
         div.container-yo > img{
            max-width: 506px !important;
            max-height: 5000px!important;  
        }
    }
    /*175%*/ 
    @media (min-width: 700px) and (max-width: 799px) { 
         div.container-yo > img{
            max-width: 686px !important;
            max-height: 5000px!important;  
        }
    }
    /*150%*/ 
    @media (min-width: 800px) and (max-width: 1060px) { 
         div.container-yo > img{
            max-width: 686px !important;
            max-height: 5000px!important;  
        }
    }
    /*125%*/ 
    @media (min-width: 1061px) and (max-width: 1160px) { 
         div.container-yo > img{
            max-width: 286px !important;
            max-height: 5000px!important;  
        }
    }
    /*110%*/ 
    @media (min-width: 1161px) and (max-width: 1326px) { 
         div.container-yo > img{
            max-width: 346px !important;
            max-height: 5000px!important;  
        }
    }   
    /*100%*/ 
    @media (min-width: 1327px) and (max-width: 1426px) { 
         div.container-yo > img{
            max-width: 346px !important;
            max-height: 5000px!important;  
        }
    }  
    /*90%-25%*/
    @media (min-width: 1427px) and (max-width: 20000px) { 
         div.container-yo > img{
            max-width: 406px !important;
            max-height: 5000px!important;  
        }
    }
</style>