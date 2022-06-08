@extends('layouts.template')

@section('content')
<div class="container my-4">
    <div class="row mx-5 mt-5 mb-1 text-justify">
        <div class="col-7">
            <strong>
                <h1>¿Quiénes Somos?</h1>
            </strong>
            <p class="text text-justify mt-3 mr-3">
                El Centro de Educación Continua, Abierta y Virtual, Cecav, se
                encuentra adscrito a la Vicerrectoría Académica y fue creado
                mediante el Acuerdo Superior 006 del 29 de enero de 2013.
                <br><br>
                Comenzó sus labores en el primer semestre de este año como un
                mecanismo de servicio, apoyo y acompañamiento a las unidades
                académicas de la Unicauca...
            </p>
            <br>
            <button type="submit" class="btn btn-primary" style="color: white; background-color: #08153A; border: none; border-radius: 20px; padding-left: 40px; padding-right: 40px;font-size: 14pt;">{{ __('Leer más') }}</button>
        </div>
        <div class="col-5">
            <img src="{{ asset('img/facultadContables.jpg') }}" alt="" width="420" height="340" class="d-inline-block align-text-top" style="border-radius: 15px;">
        </div>
        <hr style="margin: 3rem 0; color: inherit; border: 0; border-top: 2px solid; opacity: 0.25; width: 100%;">
    </div>
    <div class="row text-center">
        <strong>
            <h1>Funcionarios</h1>
        </strong>
        <div class="col">
            <div class="row">
                <h3>Marisol Muñoz Ordoñez</h3>
            </div>
            <div class="row ">
                <p>Cargo: Directora. <br>
                    Teléfono: 8209800 ext. 3206. <br>
                    Correo:marisolmunoz@unicauca.edu.co
                </p>
            </div>
        </div>
        <div class="col">

        </div>
        <div class="col">

        </div>
    </div>

</div>
@endsection