@extends('layouts.template')

@section('content')

<div class="conteiner m-5">
    <div class="row">
        <form action="{{route('/admin/saveOferta')}}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="row mx-3">
                <div class="col-sm-1 mr-0" style="text-align: left;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="#4285F4" class="bi bi-plus-circle-fill " viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                    </svg>
                </div>
                <div class="col-sm-11" style="text-align: left; color: #3E4C60">
                    <h5>Añadir registro</h5>
                </div>
            </div>
            <hr />
            <div class="row m-3 pt-3">
                <div class="col">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Nombre (Diplomado, curso, charla, etc)</label>
                        <input type="text" class="form-control @error('nombreOferta') is-invalid @enderror" name="nombreOferta" placeholder="Tu respuesta" style="background-color: #ececec;" value="{{old('nombreOferta')}}" required>
                        @error('nombreOferta')
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label fw-bold">Descripción</label>
                        <textarea type="text" class="form-control  @error('descripcionOferta') is-invalid @enderror" name="descripcionOferta" placeholder="Tu respuesta" style="background-color: #ececec;" value="{{old('descripcionOferta')}}" required></textarea>
                        @error('descripcionOferta')
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold ">Tipo de pago</label>
                        <select class="form-select  @error('tipoPagoOferta') is-invalid @enderror" name="tipoPagoOferta" style="background-color: #ececec;" value="{{old('tipoPagoOferta')}}"  required>
                            <option selected disabled>Elige</option>
                            <option>Pago</option>
                            <option>No pago</option>
                        </select>
                        @error('tipoPagoOferta')
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Unidad académica</label>
                        <input type="text" class="form-control @error('unidadAcademicaOferta') is-invalid @enderror" name="unidadAcademicaOferta" placeholder="Tu respuesta" value="{{old('unidadAcademicaOferta')}}" style="background-color: #ececec;" required>
                        @error('unidadAcademicaOferta')
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label "><strong>Fecha inicio</strong></label>
                        <input type="date" class="form-control @error('fechaInicioOferta') is-invalid @enderror" name="fechaInicioOferta" value="{{old('fechaInicioOferta')}}" style="background-color: #ececec;" required>
                        @error('fechaInicioOferta')
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Resolución</label>
                        <input type="text" class="form-control  @error('resolucionOferta') is-invalid @enderror" name="resolucionOferta" placeholder="Tu respuesta" value="{{old('resolucionOferta')}}" style="background-color: #ececec;" required>
                        @error('resolucionOferta')
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Intensidad horaria</label>
                        <input type="text" class="form-control @error('intensidadHorarioOferta') is-invalid @enderror" name="intensidadHorarioOferta" placeholder="Tu respuesta" value="{{old('intensidadHorarioOferta')}}" style="background-color: #ececec;" required>
                        @error('intensidadHorarioOferta')
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Limite de cupos</label>
                        <input type="number" class="form-control @error('cuposOferta') is-invalid @enderror" name="cuposOferta" placeholder="Tu respuesta" value="{{old('cuposOferta')}}" min="0" style="background-color: #ececec;" required>
                        @error('cuposOferta')
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>

                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="formFile" class="form-label fw-bold">Seleccione una imagen</label>
                        <input class="form-control @error('imagenOferta') is-invalid @enderror" type="file" name="imagenOferta" accept="image/*" value="{{old('imagenOferta')}}" style="background-color: #ececec;" required>
                        @error('imagenOferta')
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Población objetivo</label>
                        <input type="text" class="form-control @error('poblacionOferta') is-invalid @enderror" name="poblacionOferta" placeholder="Tu respuesta" value="{{old('poblacionOferta')}}" style="background-color: #ececec;" required>
                        @error('poblacionOferta')
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Categoria</label>
                        <select class="form-select @error('categoriaOferta') is-invalid @enderror" name="categoriaOferta" value="{{old('categoriaOferta')}}" style="background-color: #ececec;" required>
                            <option selected disabled>Elige</option>
                            @foreach($categoria as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        @error('categoriaOferta')
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label fw-bold">Costo o inversión</label>
                        <textarea type="text" class="form-control @error('costoOferta') is-invalid @enderror" name="costoOferta" placeholder="Valor de inversión" value="{{old('costoOferta')}}" style="background-color: #ececec;" required></textarea>
                        @error('costoOferta')
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"><strong>Fecha fin</strong></label>
                        <input type="date" class="form-control @error('fechaFinOferta') is-invalid @enderror"" name="fechaFinOferta" value="{{old('fechaFinOferta')}}" style="background-color: #ececec;" required>
                        @error('fechaFinOferta')
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Tipo de curso</label>
                        <select class="form-select @error('tipoCursoOferta') is-invalid @enderror" name="tipoCursoOferta " value="{{old('tipoCursoOferta')}}" style="background-color: #ececec;" required>
                            <option selected disabled>Elige</option>
                            <option>Virtual</option>
                            <option>Presencial</option>
                        </select>
                        @error('tipoCursoOferta')
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"><strong>Fecha cierre de inscripciones</strong></label>
                        <input type="date" class="form-control @error('fechaCierreOferta') is-invalid @enderror" name="fechaCierreOferta" value="{{old('fechaCierreOferta')}}" style="background-color: #ececec;" required>
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