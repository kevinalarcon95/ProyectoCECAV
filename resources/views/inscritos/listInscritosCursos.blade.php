@extends('layouts.template')
@section('css')

@endsection
@section('content')

<div class="contenedor mt-5">
    <div class="row">
            <div class="row mx-3">
                <div class="d-flex justify-content-between align-baseline">
                    <h4>Listado estudiantes inscritos</h4>           
                </div>
            </div>
            <hr>
            <div class="row m-3 pt-3">  
                <div class="col-2">
                    <table border="0" cellspacing="5" cellpadding="5">
                        <tbody><tr>
                            <td>Minimum date:</td>
                            <td><input type="text" id="min" name="min"></td>
                        </tr>
                        <tr>
                            <td>Maximum date:</td>
                            <td><input type="text" id="max" name="max"></td>
                        </tr>
                    </tbody></table>
                </div>
                <div class="col-1">     
                </div>       
                <div class="col-2">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Cursos Ofertados</label>
                        <select class="form-select" name="cursosOfertados"  aria-label="Default select example" style="background-color: #ececec;">
                            @foreach($oferta as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        @error('cursosOfertados')
                            <br>
                            <small>*{{$message}}</small>
                            <br>
                        @enderror
                    
                    </div>
                    <form method="POST" name="Busqueda" action="index.php" class="form-inline">
                    <button name="buscar" type="submit">Buscar</button>      
                    <select class="form-select" name="cursos"  aria-label="Default select example" style="background-color: #ececec;">
                            <option value="">Curso</option>
                            <?
                               if (! empty($oferta)) {
                                foreach ($oferta as $keyy => $value) {
                                echo '<option value="' . $oferta[$keyy]['nombre'] . '">' . $oferta[$keyy]['nombre'] . '</option>';
                                     }
                               }
                            ?>
                    </select>   
                    </form>                 
                </div>   
                
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