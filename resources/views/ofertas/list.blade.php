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

    <table id="example" class="display nowrap" style="width:50%">
        <thead>
            <tr>
                <th scope="col" class="celda"> No. </th>
                <th scope="col" class="celda"> Imagen</th>
                <th scope="col" class="celda"> Nombre </th>
                <th scope="col" class="celda"> Fecha inicio de clases</th>
                <th scope="col" class="celda"> Fecha final de clases</th>
                <th scope="col" class="celda"> Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $ofertas as $varOferta)
            <tr>
                <td class="celda">{{$varOferta->id}}</td>
                <td class="celda"><img class="img-thumbnail" src="{{ asset($varOferta->imagen) }}" width="100" alt=""></td>
                <td class="celda">{{$varOferta->nombre}}</td>
                <td class="celda">{{$varOferta->fecha_inicio}}</td>
                <td class="celda">{{$varOferta->fecha_fin}}</td>
                <td>
                    <div class="d-flex flex-row">
                        <button type="button" class="btn btn-outline-secondary me-1" data-bs-toggle="modal" data-bs-target="#exampleModalVer{{$varOferta->id}}">
                            <i class="bi bi-plus-lg"></i> Ver más
                        </button>
                        <a type="button" href="{{ route('/admin/editOferta')}}/{{$varOferta->id}}" class="botones btn btn-editar me-1"><i class="bi bi-pencil-square me-1"></i>Editar</a>
                        <a type="button" href="{{ url('/admin/copyOferta/'.$varOferta->id)}}" class="botones btn btn-duplicar me-1"><i class="bi bi-clipboard"></i>Duplicar</a>
                        <button type="button" class="botones btn btn-eliminar" data-bs-toggle="modal" data-bs-target="#exampleModal{{$varOferta->id}}"><i class="bi bi-trash3 me-1"></i>Eliminar</button>

                    </div>
                </td>
                @include('ofertas.modalVer')
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