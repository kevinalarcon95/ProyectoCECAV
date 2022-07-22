@extends('layouts.template')

@section('content')

 <div class="conteiner m-5">
    <div class="row">
        <!--<form action="{{route('/admin/editOferta')}}" method="POST">-->
        <form action="{{route('ofertas.update',$oferta->id)}}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            
            <div class="row mx-3">
                <div class="col-sm-1 mr-0" style="text-align: left;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-plus-circle-fill " viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg>
                </div>
                <div class="col-sm-10">
                    <h5 style="margin-left: -3.2rem; margin-top: 0.5rem;">Editar registro</h5>
                 </div>
            </div>
            <hr />
            <div class="row m-3 pt-3">
                <div class="col">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Nombre (Diplomado, curso, charla, etc)</label>
                        <input type="text" class="form-control @error('nombreOferta') is-invalid @enderror" name="nombreOferta" value="{{old('nombreOferta', $oferta->nombre)}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tu respuesta" style="background-color: #ececec;">
                        @error('nombreOferta')
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label fw-bold">Descripcion</label>
                        <textarea type="text" name="descripcionOferta"  class="form-control  @error('descripcionOferta') is-invalid @enderror"  value="{{old('descripcionOferta', $oferta->descripcion)}}" id="exampleInputPassword1" placeholder="Tu respuesta" style="background-color: #ececec;">{{$oferta->descripcion}}</textarea>
                        @error('descripcionOferta')
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Tipo de pago</label>                       
                        <select class="form-select" name="tipoPagoOferta" value="{{old('tipoPagoOferta',$oferta->tipo_pago)}}" style="background-color: #ececec;" required onchange="if(this.value=='Pago') {document.getElementById('costoOferta').disabled = false; console.log(this.value)} else {document.getElementById('costoOferta').disabled = true}">
                            @if($oferta->tipo_pago == 'Pago')
                            <option selected>{{old('tipoPagoOferta',$oferta->tipo_pago)}}</option>
                            <option>Gratuito</option>
                            @else
                            <option selected>{{old('tipoPagoOferta',$oferta->tipo_pago)}}</option>
                            <option>Pago</option>
                            @endif
                        </select>
                        @error('tipoPagoOferta')
                        <div class="valid-feedback">Looks good!</div>
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label fw-bold">Costo o inversión</label>                        
                        <textarea type="text" class="form-control @error('costoOferta') is-invalid @enderror" name="costoOferta"  id="costoOferta"" placeholder="Valor de inversión" style="background-color: #ececec;" disabled required>{{old('costoOferta',$oferta->costo)}}</textarea>
                        @error('costoOferta')
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"><strong>Fecha inicio</strong></label>
                        <?php
                           $date = date('Y-m-d');
                         ?>
                        <input type="date" class="form-control @error('fechaInicioOferta') is-invalid @enderror" name="fechaInicioOferta" value="{{old('fechaInicioOferta',$oferta->fecha_inicio)}}" id="exampleInputEmail1" style="background-color: #ececec;">
                        @error('fechaInicioOferta')
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"><strong>Fecha fin</strong></label>
                        <?php
                        //$date = ;
                        ?>
                        <input type="date" class="form-control @error('fechaFinOferta') is-invalid @enderror" name="fechaFinOferta" value="{{old('fechaFinOferta',$oferta->fecha_fin)}}" id="exampleInputEmail1" style="background-color: #ececec;">
                        @error('fechaFinOferta')
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Intensidad horaria</label>
                        <input type="text" class="form-control @error('intensidadHorarioOferta') is-invalid @enderror" name="intensidadHorarioOferta" value="{{old('intensidadHorarioOferta',$oferta->intensidad_horario)}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tu respuesta" style="background-color: #ececec;">
                        @error('intensidadHorarioOferta')
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Limite de cupos</label>
                        <input type="text" class="form-control @error('cuposOferta') is-invalid @enderror" name="cuposOferta" value="{{old('cuposOferta',$oferta->limite_cupos)}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tu respuesta" style="background-color: #ececec;">
                        @error('cuposOferta')
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>

                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="formFile" class="form-label fw-bold">Seleccione una imagen</label>
                        <!--<img src="{{ asset('img/ofertasp').'/'.$oferta->imagen }}" alt="" width="420" height="340">-->
                        <!--{{$oferta->imagen}}-->
                        <input class="form-control @error('$oferta->imagen') is-invalid @enderror"  type="file" accept="image/*" name="imagenOferta" id="imagen" style="background-color: #ececec;">
                        <img class="img-thumbnail img-fluid mt-2" id="imagenSeleccionada" src="{{ asset($oferta->imagen) }}" width="150" alt="">
                        @error('imagenOferta')
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Población objetivo</label>
                        <input type="text" class="form-control @error('poblacionOferta') is-invalid @enderror"  name="poblacionOferta" value="{{old('poblacionOferta',$oferta->poblacion_objetivo)}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tu respuesta" style="background-color: #ececec;">
                        @error('poblacionOferta')
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Categoria</label>
                        <select class="form-select @error('categoriaOferta') is-invalid @enderror" name="categoriaOferta" aria-label="Default select example" style="background-color: #ececec;">
                            @foreach($categoria as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        @error('categoriaOferta')
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Unidad académica</label>
                        <input type="text" class="form-control @error('unidadAcademicaOferta') is-invalid @enderror"  name="unidadAcademicaOferta" value="{{old('unidadAcademicaOferta',$oferta->unidad_academica)}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tu respuesta" style="background-color: #ececec;">
                        @error('unidadAcademicaOferta')
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Resolución</label>
                        <input type="text" class="form-control  @error('resolucionOferta') is-invalid @enderror" name="resolucionOferta" value="{{old('resolucionOferta',$oferta->resolucion)}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tu respuesta" style="background-color: #ececec;">
                        @error('resolucionOferta')
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Tipo de curso</label>
                        <select class="form-select @error('tipoCursoOferta') is-invalid @enderror" name="tipoCursoOferta" value="{{old('tipoCursoOferta',$oferta->tipo_curso)}}"  aria-label="Default select example" style="background-color: #ececec;">
                            @if($oferta->tipo_curso == 'Virtual')
                            <option selected>{{old('tipoCursoOferta',$oferta->tipo_curso)}}</option>
                            <option>Presencial</option>
                            @else
                            <option selected>{{old('tipoCursoOferta',$oferta->tipo_curso)}}</option>
                            <option>Virtual</option>
                            @endif
                        </select>
                        @error('tipoCursoOferta')
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"><strong>Fecha cierre de inscripciones</strong></label>
                        <?php
                            $date = date('Y-m-d');
                        ?>
                        <input type="date" class="form-control @error('fechaCierreOferta') is-invalid @enderror" name="fechaCierreOferta" value="{{old('fechaCierreOferta', $oferta->fecha_cierre_inscripcion)}}" id="exampleInputEmail1" style="background-color: #ececec;">
                        @error('fechaCierreOferta')
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>
                </div>

            </div>
            <hr />
            <div class="row">
                <div class="col" style="text-align: right;">
                    <button type="submit" class="btn btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                        </svg> Cancelar</button>
                    <button type="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-down-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M9.636 2.5a.5.5 0 0 0-.5-.5H2.5A1.5 1.5 0 0 0 1 3.5v10A1.5 1.5 0 0 0 2.5 15h10a1.5 1.5 0 0 0 1.5-1.5V6.864a.5.5 0 0 0-1 0V13.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z" />
                            <path fill-rule="evenodd" d="M5 10.5a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 0-1H6.707l8.147-8.146a.5.5 0 0 0-.708-.708L6 9.293V5.5a.5.5 0 0 0-1 0v5z" />
                        </svg> Guardar</button>
                </div>
            </div>
        </form>
    </div>
    
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $(document).ready(function(e) {
        $('#imagen').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#imagenSeleccionada').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>