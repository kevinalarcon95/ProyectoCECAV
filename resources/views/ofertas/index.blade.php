@extends('layouts.layout_home')


@section('content')
<!--Inicia sección Agro oferta-->
<section name="oferta" id="oferta" class="container-fluid">
    <div class="title text-center">
        <strong>
            <h1>Ofertas</h1>
        </strong>
    </div>
    <!--Barra de busqueda -->
    <div class="row">
        <div class="col">
            <div class="container">
                <div class="wrap">
                    <div class="search">
                        <input type="text" id="searchTerm" class="searchTerm" placeholder=" ¿Qué deseas buscar?">
                        <button type="submit" id="buttonSearch" class="searchButton">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Fin Barra de busqueda -->

    <div class="row ml-5 mr-5 mb-4">

    
        <!-- inicio oferta -->
        <div class="col-lg-4">
            <div class="container" style="margin-top: 0px;">
                <div class="content" style="padding-bottom: 12%;">
                    <a href="#" target="_blank">  
                    <div class="content-overlay">
                    </div>
                    <img class="content-image" src="#">
                    <div class="content-details fadeIn">
                        <h3 class="content-title"></h3>
                        <p class="content-description">Ver oferta</p>
                    </div>
                    </a>
                </div>
            </div>
        </div>        
        <!-- fin oferta -->
      

    </div>    
</section>
@endsection