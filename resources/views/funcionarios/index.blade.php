@extends('layouts.template')

@section('content')

<div class="contenedor mt-5">
    <div class="row mx-3">
        <div class="d-flex justify-content-between align-baseline">
            <h4>Gestión FUNCIONARIOS</h4>
            <a href="{{ route('/admin/createFuncionario')}}" class="botones btn btn-añadir me-1">
                <i class="bi bi-plus me-1"></i>Añadir
            </a>
        </div>
    </div>
    <hr>

    <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th scope="col" class="celda"> Nombre </th>
                <th scope="col" class="celda"> Cargo </th>
                <th scope="col" class="celda"> Teléfono </th>
                <th scope="col" class="celda"> Extensión </th>
                <th scope="col" class="celda"> Correo </th>
            </tr>
        </thead>
        <tbody>
            @foreach( $objFuncionario as $varFuncionario)
            <tr>
                <td  class="celda">{{$varFuncionario->nombre}}</td>
                <td  class="celda">{{$varFuncionario->cargo}}</td>
                <td  class="celda">{{$varFuncionario->telefono}}</td>
                <td  class="celda">{{$varFuncionario->extension}}</td>
                <td  class="celda">{{$varFuncionario->correo}}</td>
                <td>
                    <div class="d-flex flex-row">
                        <a type="button" href="{{ url('/admin/editPreicfes/'.$varFuncionario->id)}}" class="botones btn btn-editar me-1" ><i class="bi bi-pencil-square me-1"></i>Editar</a>
                        <button type="button" class="botones btn btn-eliminar" data-bs-toggle="modal" data-bs-target="#modalEliminar{{$varFuncionario->id}}"><i class="bi bi-trash3 me-1"></i>Eliminar</button>

                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
    <hr />

</div>

@endsection