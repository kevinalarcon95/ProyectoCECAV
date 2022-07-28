@extends('layouts.template')
@section('css')

@endsection
@section('content')
<div class="contenedor mt-5">
    <div class="row mx-3">
        <div class="d-flex justify-content-between align-baseline">
            <h4>Listado estudiantes inscritos Preicfes</h4>
        </div>
    </div>
    <hr>
    <div class="row ">
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
    <div class="row my-3">
        <div class="col-6  py-1">
            <div class="input-group text-center">
                <div class="group-text mx-2">
                    <i class="bi bi-funnel-fill" style="color:gray;"></i>
                    <label for="text" class="col-form-label fw-bold" style="color:gray;">Cursos ofertados</label>
                </div>
                <select class="form-select" aria-label="Default select example" style="background-color: #ececec;">
                    <option selected disabled>Seleccione</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
        </div>
        <div class="col-6 text-end py-1" style="background-color: #ececec;">
            <div class="form-check form-check-inline my-2">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                <label class="form-check-label fw-bold" for="inlineRadio1" style="color:gray;">Pagos</label>
            </div>
            <div class="form-check form-check-inline my-2">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                <label class="form-check-label fw-bold" for="inlineRadio2" style="color:gray;">Estudiantes aprobados</label>
            </div>
            <label class="form-check-label fw-bold mx-3" for="inlineRadio2" style="color:gray;">Archivo Excel: </label>
            <button type="button" class="btn btn-success" aria-describedby="btnGroupAddon2"><i class="bi bi-upload"></i> Importar</button>
        </div>
    </div>

    <table id="datatables" class="display nowrap " style="width:100%">
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