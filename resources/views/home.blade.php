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
                académicas de la Unicauca...
            </p>
            <br>            
            <a href="{{(route('/homeInfo/quienesSomos'))}}" type="submit" class="btn btn-primary" style="color: white; background-color: #08153A; border: none; border-radius: 20px; padding-left: 40px; padding-right: 40px;font-size: 14pt;">
                Leer más
            </a>
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
        <div class="col mt-3">
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
        <div class="col mt-3">
            <div class="row text-center">
                <h3>Yuly Andrea Ordoñez</h3>
            </div>
            <div class="row text-center">
                <p>Teléfono: 8209800 ext. 3204. <br>
                    Correo:yuordonez@unicauca.edu.co
                </p>
            </div>
        </div>
        <div class="col mt-3">
            <div class="row">
                <h3>Olga Lucía Correa Lasso</h3>
            </div>
            <div class="row ">
                <p>Contratista.<br>
                    Teléfono: 8209800 ext. 3203. <br>
                    Correo:olgacorrea@unicauca.edu.co
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col mt-3">
                <div class="row">
                    <h3>Doris Stella Muñoz Cruz</h3>
                </div>
                <div class="row ">
                    <p>Contratista. <br>
                        Teléfono: 8209800 ext. 3203. <br>
                        Correo: dsmunoz@unicauca.edu.co
                    </p>
                </div>        
            </div>
        </div>
        <hr style="margin: 3rem 0; color: inherit; border: 0; border-top: 2px solid; opacity: 0.25; width: 100%;">
    </div>
    
    <div class="row mx-5 mt-5 mb-1 text-justify">
            <strong>
                <h1>Funciones</h1>
            </strong>
            <p align="justify">
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
            <br>
            <div class="col-7">
                <a href="{{(route('/homeInfo/funcionesCecav'))}}" type="submit" class="btn btn-primary" style="color: white; background-color: #08153A; border: none; border-radius: 20px; padding-left: 40px; padding-right: 40px;font-size: 14pt;">
                    Leer más
                </a>
            </div>
        <hr style="margin: 3rem 0; color: inherit; border: 0; border-top: 2px solid; opacity: 0.25; width: 100%;">
    </div>

    <div class="row mx-5 mt-5 mb-1 text-justify">
        <div class="col-7">
            <strong>
                <h1>Misión</h1>
            </strong>
            <p align="justify">
                Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the industry's standard dummy text
                ever since the 1500s, when an unknown printer took a galley of type
                and scrambled it to make a type specimen book. It has survived not
                only five centuries, but also the leap into electronic typesetting,
                remaining essentially unchanged. It was popularised in the 1960s
                with the release of Letraset sheets containing Lorem Ipsum
                passages, and more recently with desktop publishing software like
                Aldus PageMaker including versions of Lorem Ipsum.
            </p>
            <br>            
        </div>
        <div class="col-5">
            <img src="{{ asset('img/facultadContables.jpg') }}" alt="" width="420" height="340" class="d-inline-block align-text-top" style="border-radius: 15px;">
        </div>        
    </div>
    <div class="row mx-5 mt-5 mb-1 text-justify">
        <div class="col-7">            
            <img src="{{ asset('img/facultadContables.jpg') }}" alt="" width="420" height="340" class="d-inline-block align-text-top" style="border-radius: 15px;">                  
        </div>
        <div class="col-5">
            <strong>
                <h1>Visión</h1>
            </strong>
            <p align="justify">
                Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the industry's standard dummy text
                ever since the 1500s, when an unknown printer took a galley of type
                and scrambled it to make a type specimen book. It has survived not
                only five centuries, but also the leap into electronic typesetting,
                remaining essentially unchanged. It was popularised in the 1960s
                with the release of Letraset sheets containing Lorem Ipsum
                passages, and more recently with desktop publishing software like
                Aldus PageMaker including versions of Lorem Ipsum.
            </p>
            <br>     
        </div>
        <hr style="margin: 3rem 0; color: inherit; border: 0; border-top: 2px solid; opacity: 0.25; width: 100%;">
    </div>
</div>
@endsection