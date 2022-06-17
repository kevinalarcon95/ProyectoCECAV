@extends('layouts.template')

@section('content')
<div class="container my-4">
    <div class="row mx-5 mt-5 mb-1 text-justify">
        <div class="col-7">
            <strong>
                <h1>¿Quiénes Somos?</h1>
            </strong>
            <p align="justify">
                El Centro de Educación Continua, Abierta y Virtual, Cecav, se
                encuentra adscrito a la Vicerrectoría Académica y fue creado
                mediante el Acuerdo Superior 006 del 29 de enero de 2013.
                <br><br>                 
                Comenzó sus labores en el primer semestre de este año como un
                mecanismo de servicio, apoyo y acompañamiento a las unidades
                académicas de la Unicauca, para el desarrollo exitoso de sus
                cursos, programas y eventos de educación no formal. Se
                constituye, en un sentido figurado, en el corazón de la proyección
                social de la institución para Popayán y el Cauca. Expresamente el
                artículo 2 de dicho Acuerdo reza:
                <br><br>                         
                “El Cecav es la instancia encargada de planificar, fomentar, dirigir,
                coordinar, ejecutar y evaluar los programas que mediante esta
                estrategia implementará la Universidad. Su presencia se dará tanto
                en la sede principal, en las sedes regionales, en los Ceres, y en los
                territorios del Cauca en que la presencia de la Universidad es
                requerida.”
                <br><br>
                En el aspecto legal, se circunscribe a lo expuesto en la Constitución
                Política de Colombia de 1991, la Ley General de Educación, la Ley
                de Educación Superior y los estatutos General y Académico, el
                Proyecto Educativo Institucional y el Acuerdo Superior 006 de 2013
                de la Universidad del Cauca. 
            </p>             
            <br>                  
        </div>
        <div class="col-5">
            <img src="{{ asset('img/facultadContables.jpg') }}" alt="" width="420" height="340" class="d-inline-block align-text-top" style="border-radius: 15px;">
        </div>
       
    </div>    
</div>
@endsection