@extends('layouts.template')
@section('css')

@endsection
@section('content')

<div class="contenedor mt-5">
    <div class="row">
            <div class="row mx-3">
                <div class="d-flex justify-content-between align-baseline">
                    <h4>Listado Estudiantes Inscritos</h4>           
                </div>
            </div>
            <hr>
            <div class="row ">
                <div class="col-4">
                    <div class="input-group text-center">
                        <div class="group-text mx-2">
                            <i class="bi bi-funnel-fill" style="color:gray;"></i>
                            <label for="text" class="col-form-label fw-bold" style="color:gray;">Fecha de inicio</label>
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
                            <label for="text" class="col-form-label fw-bold" style="color:gray;">Fecha de fin</label>
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
                <form action="/import" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(Session::has('message'))
                    <p>{{Session::get('message')}}</p>                
                    @endif
                    <input type="file" name="student_file" accept=".xlsx,.xls" required>
                    <br> <br>
                    <input type="submit" value="Upload">
                </form>
            </div>
            <table id="datatables" class="display nowrap " style="width:100%">
                <thead>
                    <tr>
                        
                        <th scope="col" class="celda"> No</th>
                        <th scope="col" class="celda"> Curso</th>
                        <th scope="col" class="celda"> Nombre</th>
                        <th scope="col" class="celda"> Apellido</th>
                        <th scope="col" class="celda"> Tipo identificacion</th>
                        <th scope="col" class="celda"> Identificacion</th>
                        <th scope="col" class="celda"> Direccion residencia</th>
                        <th scope="col" class="celda"> Telefono</th>
                        <th scope="col" class="celda"> Tipo inscripcion</th>
                        <th scope="col" class="celda"> Tipo vinculacion</th>
                        <th scope="col" class="celda"> Codigo universitario</th>
                        <th scope="col" class="celda"> Profesion</th>
                        <th scope="col" class="celda"> Programa</th>
                        <th scope="col" class="celda"> Entidad</th>                
                        <th scope="col" class="celda"> Nit entidad</th>                        
                        <th scope="col" class="celda"> fecha</th>
                        <th scope="col" class="celda"> Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $aspiOferta as $varInscrito)
                    <tr>
                        <td class="celda">{{$varInscrito->id_oferta}}</td>
                        <td class="celda">{{$varInscrito->nomOferta}}</td>
                        <td  class="celda">{{$varInscrito->nombre}}</td>
                        <td  class="celda">{{$varInscrito->apellido}}</td>
                        <td  class="celda">{{$varInscrito->tipo_identificacion}}</td>
                        <td  class="celda">{{$varInscrito->identificacion}}</td>
                        <td  class="celda">{{$varInscrito->direccion_residencia}}</td>
                        <td  class="celda">{{$varInscrito->telefono}}</td>
                        <td  class="celda">{{$varInscrito->tipo_inscripcion}}</td>
                        <td  class="celda">{{$varInscrito->tipo_vinculacion}}</td>
                        <td  class="celda">{{$varInscrito->codigo_universitario}}</td>
                        <td  class="celda">{{$varInscrito->profesion}}</td>
                        <td  class="celda">{{$varInscrito->programa}}</td>
                        <td  class="celda">{{$varInscrito->entidad}}</td>
                        <td  class="celda">{{$varInscrito->nit_entidad}}</td>
                        <td  class="celda">{{\Carbon\Carbon::parse($varInscrito->created_at)->format('Y-m-d')}}</td>
                        
                        <td>
                            <div class="d-flex flex-row">

                                <a type="button" href="" class="botones btn btn-editar me-1"><i class="bi bi-pencil-square me-1"></i>Editar</a>

                                <button type="button" class="botones btn btn-eliminar" data-bs-toggle="modal" data-bs-target=""><i class="bi bi-trash3 me-1"></i>Borrar</button>

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