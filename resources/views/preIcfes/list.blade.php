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
    <div class="row m-3 pt-3">
        <div class="col-2">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"><strong>Fecha Inicio</strong></label>
                <?php
                $date = date('Y-m-d');
                ?>
                <input type="date" class="form-control" name="fechaFinConsulta" value="" id="exampleInputEmail1" style="background-color: #ececec;">
                @error('fechaFinConsulta')
                    <br>
                    <small>*{{$message}}</small>
                    <br>
                @enderror
            </div>
        </div>
        <div class="col-2">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"><strong>Fecha Fin</strong></label>
                <?php
                $date = date('Y-m-d');
                ?>
                <input type="date" class="form-control" name="fechaFinConsulta" value="" id="exampleInputEmail1" style="background-color: #ececec;">
                @error('fechaFinConsulta')
                    <br>
                    <small>*{{$message}}</small>
                    <br>
                @enderror
            </div>
        </div>
        <div class="col-2">
            <div class="mb-3">
                <label class="form-label fw-bold">Cursos Ofertados</label>
                <select class="form-select" name="cursosOfertados" aria-label="Default select example" style="background-color: #ececec;">
                    <option>Consultar</option>
                </select>
                @error('cursosOfertados')
                    <br>
                    <small>*{{$message}}</small>
                    <br>
                @enderror
            </div>
        </div>
    </div>
    <table id="example" class="display nowrap " style="width:100%">
        <thead>
            <tr>
                
                <th scope="col" class="celda"> Tipo de ID</th>
                <th scope="col" class="celda"> Numero Id </th>
                <th scope="col" class="celda"> Nombre y Apellido</th>
                <th scope="col" class="celda"> Direccion de residencia</th>
                <th scope="col" class="celda"> Telefono</th>
                <th scope="col" class="celda"> Correo personal</th>
                <th scope="col" class="celda"> Nombre Colegio</th>
                <th scope="col" class="celda"> Departamento Colegio</th>
                <th scope="col" class="celda"> Municipio Colegio</th>
                <th scope="col" class="celda"> Nombre y Apellido del acudiente</th>
                <th scope="col" class="celda"> Correo acudiente</th>
                <th scope="col" class="celda"> Tipo Curso</th>
                <th scope="col" class="celda"> Pregrado</th>                
                <th scope="col" class="celda"> Horario</th>
                <th scope="col" class="celda"> Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $aspiIcfes as $varInscrito)
            <tr>
                <td class="celda">{{$varInscrito->tipo_identificacion}}</td>
                <td  class="celda">{{$varInscrito->identificacion}}</td>

                <td  class="celda">{{$varInscrito->nombre_apellido}}</td>
                <td  class="celda">{{$varInscrito->direccion_residencia}}</td>
                <td  class="celda">{{$varInscrito->telefono}}</td>
                <td  class="celda">{{$varInscrito->correo}}</td>
                <td  class="celda">{{$varInscrito->colegio}}</td>
                <td  class="celda">{{$varInscrito->departamento_colegio}}</td>
                <td  class="celda">{{$varInscrito->municipio_colegio}}</td>
                <td  class="celda">{{$varInscrito->nombre_apellido_acudiente}}</td>
                <td  class="celda">{{$varInscrito->correo_acudiente}}</td>
                <td  class="celda">{{$varInscrito->tipo_curso}}</td>
                <td  class="celda">{{$varInscrito->pregrado}}</td>
                <td  class="celda">{{$varInscrito->horario}}</td>
                
                <td>
                    <div class="d-flex flex-row">

                        <a type="button" href="{{ route('/admin/editOferta')}}/{{$varOferta->id}}" class="botones btn btn-editar me-1"><i class="bi bi-pencil-square me-1"></i>Editar</a>

                        <button type="button" class="botones btn btn-eliminar" data-bs-toggle="modal" data-bs-target="#exampleModal{{$varOferta->id}}"><i class="bi bi-trash3 me-1"></i>Borrar</button>

                    </div>
                </td>
                
            </tr>
            @endforeach
        </tbody>

    </table>
    <hr />

</div>

@section ('js')


@endsection
@endsection