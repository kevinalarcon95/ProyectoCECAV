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
            <div class="row m-3 pt-3">  
                <div class="col-2">
                    <table border="0" cellspacing="5" cellpadding="5">
                        <tbody><tr>
                            <td>Fecha Inicio:</td>
                            <td><input type="text" id="min" name="min"></td>
                        </tr>
                        <tr>
                            <td>Fecha Fin:</td>
                            <td><input type="text" id="max" name="max"></td>
                        </tr>
                    </tbody></table>
                </div>
                <div class="col-1">     
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