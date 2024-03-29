@extends('layouts.template')

@section('content')

<div class="conteiner m-5">
    <div class="row mx-3">
        <div class="col-sm-2" style="text-align: left;">
            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="#4285F4" class="bi bi-plus-circle-fill " viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
            </svg>
        </div>
        <div class="col-sm-10">
            <h5 style="margin-left: -9.2rem; margin-top: 0.5rem;">Duplicar registro</h5>
        </div>
    </div>
    <div class="row">
        <form action="{{ url('/admin/saveCopyOferta/'.$oferta->id)}}" class="row g-3 needs-validation" method="POST" enctype="multipart/form-data" novalidate>
            @csrf
            <hr />
            <div class="row m-3 pt-3">
                <div class="col">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Nombre (Diplomado, curso, charla, etc)</label>
                        <input type="text" class="form-control @error('nombreOferta') is-invalid @enderror" name="nombreOferta" placeholder="Tu respuesta" id="nombreOferta" style="background-color: #ececec;" value="{{isset($oferta->nombre)?$oferta->nombre:old('nombreOferta')}}" required>
                        @error('nombreOferta')
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label fw-bold">Descripción</label>
                        <textarea type="text" class="form-control  @error('descripcionOferta') is-invalid @enderror" id="editor" name="descripcionOferta" placeholder="Tu respuesta" style="background-color: #ececec;" required>{{ isset($oferta->descripcion)?$oferta->descripcion:old('descripcionOferta') }}</textarea>
                        @error('descripcionOferta')
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>
                    <!-- Para ela entrada de costo se requiere que el selector este en "Pago"-->
                    <div class="mb-3">
                        <label class="form-label fw-bold ">Tipo de pago</label>
                        <select class="form-select" name="tipoPagoOferta" id="tipoPagoOferta" value="{{$oferta->tipo_pago}}" style="background-color: #ececec;" required onchange="if(this.value=='Pago') {document.getElementById('costoOfertaa').disabled = false; console.log(this.value)} else {document.getElementById('costoOfertaa').disabled = true}">
                            <option selected disabled value="">Elige</option>
                            <option value="Pago" @if('Pago'==old('tipoPagoOferta') or isset($oferta->tipo_pago) and 'Pago' == $oferta->tipo_pago) selected @endif/>Pago</option>
                            <option value="Gratuito" @if('Gratuito'==old('tipoPagoOferta') or isset($oferta->tipo_pago) and 'Gratuito' == $oferta->tipo_pago) selected @endif/>Gratuito</option>

                        </select>
                        @error('tipoPagoOferta')
                        <div class="valid-feedback">Looks good!</div>
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Costo o inversión</label>
                        <textarea type="text" class="form-control @error('costoOferta') is-invalid @enderror" name="costoOferta" id="costoOfertaa" placeholder="Valor de inversión" style="background-color: #ececec;" disabled required>{{ old('costoOferta',$oferta->costo) }}</textarea>
                        @error('costoOferta')
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"><strong>Fecha inicio</strong></label>
                        <input type="date" class="form-control @error('fechaInicioOferta') is-invalid @enderror"" name=" fechaInicioOferta" value="{{isset($oferta->fecha_inicio)?$oferta->fecha_inicio:old('fechaInicioOferta')}}" style="background-color: #ececec;" required>
                        @error('fechaInicioOferta')
                        <div class="valid-feedback">Looks good!</div>
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"><strong>Fecha fin</strong></label>
                        <input type="date" class="form-control @error('fechaFinOferta') is-invalid @enderror"" name=" fechaFinOferta" value="{{isset($oferta->fecha_fin)?$oferta->fecha_fin:old('fechaFinOferta')}}" style="background-color: #ececec;" required>
                        @error('fechaFinOferta')
                        <div class="valid-feedback">Looks good!</div>
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Intensidad horaria</label>
                        <input type="text" class="form-control @error('intensidadHorarioOferta') is-invalid @enderror" name="intensidadHorarioOferta" placeholder="Tu respuesta" value="{{isset($oferta->intensidad_horario)?$oferta->intensidad_horario:old('intensidadHorarioOferta')}}" style="background-color: #ececec;" required>
                        @error('intensidadHorarioOferta')
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Limite de cupos</label>
                        <input type="number" class="form-control @error('cuposOferta') is-invalid @enderror" name="cuposOferta" placeholder="Tu respuesta" value="{{isset($oferta->limite_cupos)?$oferta->limite_cupos:old('cuposOferta')}}" min="0" style="background-color: #ececec;" required>
                        @error('cuposOferta')
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="formFile" class="form-label fw-bold">Seleccione una imagen</label>
                        <input class="form-control @error('imagenOferta') is-invalid @enderror" type="file" name="imagenOferta" id="imagen" accept="image/*" value="{{old('imagenOferta')}}" style="background-color: #ececec;" required>
                        <img class="mt-1 img-thumbnail img-fluid" id="imagenSeleccionada" src="{{ asset($oferta->imagen) }}" width="100" alt="">
                        @error('imagenOferta')
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Población objetivo</label>
                        <input type="text" class="form-control @error('poblacionOferta') is-invalid @enderror" name="poblacionOferta" placeholder="Tu respuesta" value="{{ isset($oferta->poblacion_objetivo)?$oferta->poblacion_objetivo:old('poblacionOferta')}}" style="background-color: #ececec;" required>
                        @error('poblacionOferta')
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Categoria</label>
                        <select class="form-select @error('categoriaOferta') is-invalid @enderror" name="categoriaOferta" value="" style="background-color: #ececec;" required>
                            <option selected disabled value="">Elige</option>
                            @foreach($categoria as $key => $value)
                            <option value="{{ $key }}" @if(old('categoriaOferta')==$key or ($oferta->id_categoria==$key)) selected @endif />{{ $value }}</option>
                           
                            @endforeach
                        </select>
                        @error('categoriaOferta')
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Unidad académica</label>
                        <input type="text" class="form-control @error('unidadAcademicaOferta') is-invalid @enderror" name="unidadAcademicaOferta" placeholder="Tu respuesta" value="{{old('unidadAcademicaOferta',$oferta->unidad_academica)}}" style="background-color: #ececec;" pattern="/^[\pL\s\-]+$/u" required>
                        @error('unidadAcademicaOferta')
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Resolución</label>
                        <input type="text" class="form-control  @error('resolucionOferta') is-invalid @enderror" name="resolucionOferta" placeholder="Tu respuesta" value="{{old('resolucionOferta', $oferta->resolucion)}}" style="background-color: #ececec;" required>
                        @error('resolucionOferta')
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Tipo de curso</label>
                        <select name="tipoCursoOferta" id="tipoCursoOferta" class="form-select @error('tipoCursoOferta') is-invalid @enderror" value="{{ old('tipoCursoOferta')}}" style="background-color: #ececec;" required>
                            <option selected disabled value="{{ old('tipoCursoOferta')}}">Elige</option>
                            <option value="Virtual" @if('Virtual'==old('tipoCursoOferta') or 'Virtual' == $oferta->tipo_curso) selected @endif/>Virtual</option>
                            <option value="Presencial" @if('Presencial'==old('tipoCursoOferta') or 'Presencial' == $oferta->tipo_curso) selected @endif/>Presencial</option>
                        </select>
                        @error('tipoCursoOferta')
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"><strong>Fecha cierre de inscripciones</strong></label>
                        <input type="date" class="form-control @error('fechaCierreOferta') is-invalid @enderror" name="fechaCierreOferta" value="{{old('fechaCierreOferta',$oferta->fecha_cierre_inscripcion)}}" style="background-color: #ececec;" required>
                        @error('fechaCierreOferta')
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col" style="text-align: right;">
                    <a type="button" class="btn btn-secondary" href="{{url('/admin/listOferta') }}"><i class="bi bi-x"></i> Cancelar</a>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Guardar</button>
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
<script>
    $(document).ready(function(e) {
        //Para editar el costo
        const $tipoPago = $('#tipoPagoOferta');
        if($tipoPago.val()=='Pago') { document.getElementById('costoOfertaa').disabled = false;}
        
        $('#imagen').change(function() {
            const $tipoPago = $('#stipoPago');
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#imagenSeleccionada').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>