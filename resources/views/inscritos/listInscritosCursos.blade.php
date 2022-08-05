@extends('layouts.template')
@section('css')

@endsection
@section('content')

<div class="contenedor mt-5">

    <div class="row mx-3">
        <div class="d-flex justify-content-between align-baseline">
            <h4>Listado estudiantes inscritos</h4>
        </div>
    </div>
    <hr>
    <div class="row my-3">
        <div class="col-6">
            <div class="input-group text-center row">
                <div class="group-text col-4">
                    <i class="bi bi-funnel-fill" style="color:gray;"></i>
                    <label for="text" class="col-form-label fw-bold" style="color:gray;">Fecha de inicio: </label>
                </div>
                <input class="form-control col-7 " type="text" id="min" name="min" aria-describedby="btnGroupAddon">
                <div class="input-group-text col-1" id="btnGroupAddon">
                    <i class="bi bi-calendar" style="color:gray;"></i>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="opcionImportar" id="inlineRadio1" value="pagos">
                <label class="form-check-label fw-bold" for="inlineRadio1" style="color:gray;">Pagos</label>
            </div>
            <div class="form-check form-check-inline ">
                <input class="form-check-input" type="radio" name="opcionImportar" id="inlineRadio2" value="estudiantesAprobados">
                <label class="form-check-label fw-bold" for="inlineRadio2" style="color:gray;">Estudiantes aprobados</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="input-group text-center">
                <div class="group-text col-4">
                    <i class="bi bi-funnel-fill" style="color:gray;"></i>
                    <label for="text" class="col-form-label fw-bold" style="color:gray;">Fecha de fin:</label>
                </div>
                <input class="form-control col-7 d-grid" type="text" id="max" name="max" aria-describedby="btnGroupAddon">
                <div class="input-group-text col-1" id="btnGroupAddon">
                    <i class="bi bi-calendar" style="color:gray;"></i>
                </div>
            </div>
        </div>
        <div class="col-6">
            <form action="/import" method="POST" enctype="multipart/form-data">
                @csrf
                @if(Session::has('message'))
                <p>{{Session::get('message')}}</p>
                @endif
                <div class="input-group">
                    <input type="file" class="form-control" name="student_file" accept=".xlsx,.xls" required id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                    <button class="btn btn-success" type=" submit" id="inputGroupFileAddon04"><i class="bi bi-download"></i> Importar</button>
                </div>
            </form>
        </div>
    </div>

    <table id="datatables" class="display nowrap " style="width:100%">
        <thead>
            <tr>

                <th scope="col" class="celda"> No</th>
                <th scope="col" class="celda"> Oferta</th>
                <th scope="col" class="celda"> Nombre</th>
                <th scope="col" class="celda"> Apellido</th>
                <th scope="col" class="celda"> Tipo identificación</th>
                <th scope="col" class="celda"> Identificación</th>
                <th scope="col" class="celda"> Referencia</th>
                <th scope="col" class="celda"> Estado</th>
                <th scope="col" class="celda"> Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($aspiOferta as $varInscrito)
            <tr>
                <td class="celda">{{$varInscrito->id}}</td>
                <td class="celda">{{$varInscrito->nombreOferta}}</td>
                <td class="celda">{{$varInscrito->nombreEstudiante}}</td>
                <td class="celda">{{$varInscrito->apellido}}</td>
                <td class="celda">{{$varInscrito->tipo_identificacion}}</td>
                <td class="celda">{{$varInscrito->identificacion}}</td>
                <td class="celda">{{$varInscrito->referencia}}</td>
                <td class="celda">{{$varInscrito->estado}}</td>
                <td>
                    
                    <div class="d-flex flex-row">
                        <button type="button" class="btn btn-outline-secondary me-1" data-bs-toggle="modal" data-bs-target="#exampleModalVer{{$varInscrito->id}}">
                            <i class="bi bi-plus-lg"></i> Ver más
                        </button>
                        <a type="button" href="" class="botones btn btn-editar me-1"><i class="bi bi-pencil-square me-1"></i>Editar</a>
                    </div>
                </td>
                @include('inscritos.modalVerOferta')
            </tr>
            @endforeach
        </tbody>
    </table>
    <hr />
</div>

@section ('js')


@endsection
@endsection
<style>
    

    .dataTables_filter {
        margin-top: -30px;
        position: absolute;
    }

    .dataTables_wrapper>.dt-buttons {
        margin-left: 1140px;
    }

    .datatables_filter>label {
        padding-left: 305px;
        margin-left: 100%;
    }

    .dt-buttons>.buttons-excel {
        background-color: #FF914D !important;
        border: #FF914D !important;
        border-color: #f4e006 !important;
        border-radius: 3px;
        color: white;
        z-index: 1000;
        margin-top: -5%;
        padding-bottom: 5%;
    }

    div.dataTables_wrapper div.dataTables_paginate ul.pagination{
        padding-left: 500px;
    }

</style>
