@extends('layouts.template')

@section('content')
<div class="container my-4">
    <div class="row mx-3 text-justify">
        <div class="col-6">
            <div class="row mb-2">
                <strong>
                    <h2>¿Quiénes Somos?</h2>
                </strong>
            </div>
            <div class="row">
                <p align="justify">
                    El Centro de Educación Continua, Abierta y Virtual, Cecav, se
                    encuentra adscrito a la Vicerrectoría Académica y fue creado
                    mediante el Acuerdo Superior 006 del 29 de enero de 2013.
                    <br><br>
                    Comenzó sus labores en el primer semestre de este año como un
                    mecanismo de servicio, apoyo y acompañamiento a las unidades
                    académicas de la Unicauca...
                </p>
            </div>
            <div class="col-7">
                <a href="{{(route('/homeInfo/quienesSomos'))}}" type="submit" class="btn btn-primary" style="color: white; background-color: #08153A; border: none; border-radius: 20px; padding-left: 40px; padding-right: 40px;font-size: 14pt;">
                    Leer más
                </a>
            </div>
        </div>
        <div class="col-6 text-end">
            <img src="{{ asset('img/facultadContables.jpg') }}" alt="" width="420" height="340" class="d-inline-block align-text-top" style="border-radius: 15px;">
        </div>
    </div>
    <hr style="margin-top: 3rem; color: inherit; border: 0; border-top: 2px solid; opacity: 0.25; width: 100%;">
    <div class="row mx-3 text-justify">
        <div class="row text-center">
            <strong>
                <h2>Funcionarios</h2>
            </strong>
        </div>
        <div class="row">
            @include('infoCecav.funcionariosCecav')
        </div>
    </div>
    <hr style="margin-top: 3rem; color: inherit; border: 0; border-top: 2px solid; opacity: 0.25; width: 100%;">
    <div class="row mx-5 mb-1" style="text-align:justify;">
        <div class="row text-center mb-2 ">
            <strong>
                <h2>Funciones</h2>
            </strong>
        </div>
        <div class="row">
            <p>
                1. Proponer, coordinar, impulsar, articular y evaluar políticas de educación continua, abierta y a distancia.
                <br>
                2. Orientar y estimular a las distintas dependencias académicas para que diseñen, desarrollen y evalúen los programas que se oferten en
                educación continua, abierta y a distancia.
                <br>
                3. Coordinar, con la Vicerrectoría Académica, el plan de capacitación en modalidades innovadoras y flexibles en el campo pedagógico, en
                especial el uso de las TIC, para los profesores que se vinculen a la educación virtual.
                <br>
                4. Impulsar un proceso de capacitación y gestión de estrategias en educación abierta y a distancia donde el componente de producción de
                materiales de apoyo para esta modalidad debe convertirse en uno de los puntos centrales de trabajo.
            </p>
        </div>
        <div class="col-7">
            <a href="{{(route('/homeInfo/funcionesCecav'))}}" type="submit" class="btn btn-primary" style="color: white; background-color: #08153A; border: none; border-radius: 20px; padding-left: 40px; padding-right: 40px;font-size: 14pt;">
                Leer más
            </a>
        </div>
        <hr style="margin: 3rem 0; color: inherit; border: 0; border-top: 2px solid; opacity: 0.25; width: 100%;">
    </div>

    <div class="row mx-5 mt-5 mb-1 text-justify">
        <div class="col-6">
            <br>
            <strong>
                <h2>Misión</h2>
            </strong>
            <p align="justify">
                El CECAV es la unidad de gestión administrativa de la Universidad del Cauca que contribuye a la actualización, profundización y perfeccionamiento de las personas en diversos campos del saber que les permiten adquirir conocimientos y habilidades mediante programas de educación continua, abierta y virtual, con altos estándares de calidad y profesionalismo en el ámbito local, regional e internacional.
            </p>
            <br>
        </div>
        <div class="col-1">
        </div>
        <div class="col-5">
            <img src="{{ asset('img/mision.jpg') }}" alt="" width="420" height="340" class="d-inline-block align-text-top" style="border-radius: 15px;">
        </div>
    </div>
    <div class="row mx-3 mt-3 mb-1 text-justify">
        <div class="col-7">
            <img src="{{ asset('img/vision.jpg') }}" alt="" width="500" height="340" class="d-inline-block align-text-top" style="border-radius: 15px;">
        </div>
        <div class="col-5">
            <br>
            <strong>
                <h2>Visión</h2>
            </strong>
            <p align="justify">
                <br>
                Ser el centro de educación continua, abierta y virtual líder en el departamento del Cauca para el año 2027, año del bicentenario.
            </p>
            <br>
        </div>
        <hr style="margin: 3rem 0; color: inherit; border: 0; border-top: 2px solid; opacity: 0.25; width: 100%;">
    </div>
</div>
@endsection