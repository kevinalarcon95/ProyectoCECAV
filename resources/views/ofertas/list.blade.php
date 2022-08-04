@extends('layouts.template')
@section('css')

@endsection
@section('content')

<div class="contenedor mt-5">
    <div class="row mx-3">
        <div class="d-flex justify-content-between align-baseline">
            <h4>Gestión de ofertas</h4>
            <a href="{{ route('/admin/createOferta') }}" class="botones btn btn-añadir me-1">
                <i class="bi bi-plus me-1"></i>Añadir
            </a>
        </div>
    </div>
    <hr>

    <table id="example" class="display nowrap" style="width:80%">
        <thead>
            <tr>
                <th scope="col" class="celda"> No. </th>
                <th scope="col" class="celda"> Imagen</th>
                <th scope="col" class="celda"> Nombre </th>
                <th scope="col" class="celda"> Descripción</th>
                <th scope="col" class="celda"> Población objetivo</th>
                <th scope="col" class="celda"> Categoría</th>
                <th scope="col" class="celda"> Tipo pago</th>
                <th scope="col" class="celda"> Costo</th>
                <th scope="col" class="celda"> Unidad académica</th>
                <th scope="col" class="celda"> Fecha inicio de clases</th>
                <th scope="col" class="celda"> Fecha final de clases</th>
                <th scope="col" class="celda"> Resolución</th>
                <th scope="col" class="celda"> Tipo Curso</th>
                <th scope="col" class="celda"> Intensidad Horaria</th>
                <th scope="col" class="celda"> Fecha fin inscripciones</th>
                <th scope="col" class="celda"> Límite de cupos</th>
                <th scope="col" class="celda"> Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $ofertas as $varOferta)
            <tr>
                <td class="celda">{{$varOferta->id}}</td>
                <td class="celda"><img class="img-thumbnail" src="{{ asset($varOferta->imagen) }}" width="100" alt=""></td>
                <td class="celda">{{$varOferta->nombre}}</td>

                <td>
                    <div class="d-flex flex-row">
                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModalVer{{$varOferta->id}}">
                        <i class="bi bi-plus-lg"></i> Ver
                        </button>
                    </div>
                </td>
                @include('ofertas.modalVer')
                <td class="celda">{{$varOferta->poblacion_objetivo}}</td>
                <td class="celda">{{$varOferta->nombreCategoria}}</td>
                <td class="celda">{{$varOferta->tipo_pago}}</td>
                <td class="celda">{{$varOferta->costo}}</td>
                <td class="celda">{{$varOferta->unidad_academica}}</td>
                <td class="celda">{{$varOferta->fecha_inicio}}</td>
                <td class="celda">{{$varOferta->fecha_fin}}</td>
                <td class="celda">{{$varOferta->resolucion}}</td>
                <td class="celda">{{$varOferta->tipo_curso}}</td>
                <td class="celda">{{$varOferta->intensidad_horario}}</td>
                <td class="celda">{{$varOferta->fecha_cierre_inscripcion}}</td>
                <td class="celda">{{$varOferta->limite_cupos}}</td>
                <td>
                    <div class="d-flex flex-row">

                        <a type="button" href="{{ route('/admin/editOferta')}}/{{$varOferta->id}}" class="botones btn btn-editar me-1"><i class="bi bi-pencil-square me-1"></i>Editar</a>

                        <button type="button" class="botones btn btn-eliminar" data-bs-toggle="modal" data-bs-target="#exampleModal{{$varOferta->id}}"><i class="bi bi-trash3 me-1"></i>Eliminar</button>

                    </div>
                </td>
                @include('ofertas.modalEliminar')
            </tr>
            @endforeach
        </tbody>

    </table>
    <hr />
</div>

@section ('js')


@endsection
@endsection