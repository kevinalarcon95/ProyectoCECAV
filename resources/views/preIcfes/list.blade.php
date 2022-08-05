@extends('layouts.template')

@section('content')

<div class="contenedor mt-5">
    <div class="row mx-3">
        <div class="d-flex justify-content-between align-baseline">
            <h4>Gestión de cursos preicfes</h4>
            <a href="{{ route('/admin/createPreicfes') }}" class="botones btn btn-añadir me-1">
                <i class="bi bi-plus me-1"></i>Añadir
            </a>
        </div>
    </div>
    <hr>

    <table id="example" class="display nowrap" style="width:100%">
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
            @foreach( $arrayPreicfes as $varPreicfes)
            <tr>
                <td class="celda">{{$varPreicfes->id}}</td>
                <td class="celda"><img class="img-thumbnail" src="{{ asset($varPreicfes->imagen) }}" width="100" alt=""></td>
                <td class="celda">{{$varPreicfes->nombre}}</td>
                @include('preicfes.modalVer')
                <td class="celda">{{$varPreicfes->fecha_inicio}}</td>
                <td class="celda">{{$varPreicfes->fecha_fin}}</td>
                <td>
                    <div class="d-flex flex-row">
                        <button type="button" class="btn btn-outline-secondary me-1" data-bs-toggle="modal" data-bs-target="#exampleModalVer{{$varPreicfes->id}}">
                            <i class="bi bi-plus-lg"></i> Ver más</button>
                        <?php $fecha_actual = date("Y-m-d"); ?>
                        @if ($fecha_actual < $varPreicfes->fecha_fin)
                            <a type="button" href="{{ url('/admin/editPreicfes/'.$varPreicfes->id)}}" class="botones btn btn-editar me-1"><i class="bi bi-pencil-square me-1"></i>Editar</a>
                            @else
                            <a type="button" class="botones btn btn-editar-deshabilitar me-1"><i class="bi bi-pencil-square me-1"></i>Editar</a>
                            @endif
                            <a type="button" href="{{ url('/admin/copyPreicfes/'.$varPreicfes->id)}}" class="botones btn btn-duplicar me-1"><i class="bi bi-clipboard"></i>Duplicar</a>
                            <button type="button" class="botones btn btn-eliminar" data-bs-toggle="modal" data-bs-target="#modalEliminar{{$varPreicfes->id}}"><i class="bi bi-trash3 me-1"></i>Eliminar</button>

                    </div>
                </td>
                @include('preicfes.modalEliminar')
            </tr>
            @endforeach
        </tbody>

    </table>
    <hr />

</div>

@endsection