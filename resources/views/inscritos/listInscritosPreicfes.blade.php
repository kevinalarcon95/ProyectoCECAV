@extends('layouts.template')
@section('css')

@endsection
@section('content')
<div class="contenedor mt-5">
    <div class="row">
        <div class="row mx-3">
            <div class="d-flex justify-content-between align-baseline">
                <h4>Listado estudiantes inscritos Preicfes</h4>
            </div>
        </div>
        <hr>
    </div>

    <div class="row mb-5">
        <div class="col-4">
            <div class="input-group text-center">
                <div class="group-text mx-2">
                    <i class="bi bi-funnel-fill" style="color:gray;"></i>
                    <label for="text" class="col-form-label fw-bold" style="color:gray;">Fecha de Inicio</label>
                </div>
                <input class="form-control" type="text" id="min" name="min" aria-describedby="btnGroupAddon">
                <div class="input-group-text" id="btnGroupAddon">
                    <i class="bi bi-calendar" style="color:gray;"></i>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="input-group text-center">
                <div class="group-text mx-2">
                    <i class="bi bi-funnel-fill" style="color:gray;"></i>
                    <label for="text" class="col-form-label fw-bold" style="color:gray;">Fecha de Inicio</label>
                </div>
                <input class="form-control" type="text" id="max" name="max" aria-describedby="btnGroupAddon">
                <div class="input-group-text" id="btnGroupAddon">
                    <i class="bi bi-calendar" style="color:gray;"></i>
                </div>
            </div>
        </div>
    </div>

    <table id="datatables" class="display nowrap tabla1" style="width:100%">
        <thead>
            <tr>

                <th scope="col" class="celda"> No</th>
                <th scope="col" class="celda"> Tipo identificacion</th>
                <th scope="col" class="celda"> Identificacion</th>
                <th scope="col" class="celda"> Nombre y Apellido</th>
                <th scope="col" class="celda"> Direccion residencia</th>
                <th scope="col" class="celda"> Telefono</th>
                <th scope="col" class="celda"> Correo</th>
                <th scope="col" class="celda"> Colegio</th>
                <th scope="col" class="celda"> Departamento Colegio</th>
                <th scope="col" class="celda"> Municipio Colegio</th>
                <th scope="col" class="celda"> Nombre acudiente</th>
                <th scope="col" class="celda"> Correo acudiente</th>
                <th scope="col" class="celda"> Tipo curso</th>
                <th scope="col" class="celda"> Pregrado</th>
                <th scope="col" class="celda"> Horario</th>
                <th scope="col" class="celda"> Fecha de la inscripción</th>
                <th scope="col" class="celda"> Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $aspiIcfes as $varInscrito)
            <tr>
                <td class="celda">{{$varInscrito->id_icfes}}</td>
                <td class="celda">{{$varInscrito->tipo_identificacion}}</td>
                <td class="celda">{{$varInscrito->identificacion}}</td>
                <td class="celda">{{$varInscrito->nombre_apellido}}</td>
                <td class="celda">{{$varInscrito->direccion_residencia}}</td>
                <td class="celda">{{$varInscrito->telefono}}</td>
                <td class="celda">{{$varInscrito->correo}}</td>
                <td class="celda">{{$varInscrito->colegio}}</td>
                <td class="celda">{{$varInscrito->departamento_colegio}}</td>
                <td class="celda">{{$varInscrito->municipio_colegio}}</td>
                <td class="celda">{{$varInscrito->nombre_apellido_acudiente}}</td>
                <td class="celda">{{$varInscrito->correo_acudiente}}</td>
                <td class="celda">{{$varInscrito->tipo_curso}}</td>
                <td class="celda">{{$varInscrito->pregrado}}</td>
                <td class="celda">{{$varInscrito->horario}}</td>
                <td class="celda">{{\Carbon\Carbon::parse($varInscrito->created_at)->format('Y-m-d')}}</td>

                <td>
                    <div class="d-flex flex-row">

                        <a type="button" href="" class="botones btn btn-editar me-1"><i class="bi bi-pencil-square me-1"></i>Editar</a>

                        <button type="button" class="botones btn btn-eliminar" data-bs-toggle="modal" data-bs-target=""><i class="bi bi-trash3 me-1"></i>Eliminar</button>

                    </div>
                </td>

            </tr>
            @endforeach
        </tbody>

    </table>
    <hr />
</div>
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
        margin-left: 1135px;
    }

    .datatables_filter>label {
        padding-left: 310px;
        margin-left: 100%;
    }

    .dt-buttons>.buttons-excel {
        background-color: #FF914D !important;
        border: #FF914D !important;
        border-color: #f4e006 !important;
        border-radius: 3px;
        color: white;
        z-index: 100;
        margin-top: -38%;
        padding-bottom: 5%;
    }
</style>