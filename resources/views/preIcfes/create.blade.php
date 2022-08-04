@extends('layouts.template')

@section('content')
<div class="conteiner m-5">
    <form class="row g-3 needs-validation" method="post" action="{{ url('/admin/savePreicfes')}}" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="row mx-3 ">

            <div class="col-sm-11 botones me-2" style=" color: #3E4C60">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="#4285F4" class="bi bi-plus-circle-fill " viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                </svg>
                <h5 class="titulo">Añadir curso preicfes</h5>
            </div>
        </div>
        <hr />
        <div class="row m-3 pt-3">

            <div class="col">
                <!----- Nombre ----->
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fw-bold">Nombre</label>
                    <input type="text" class="form-control @error('nombrePreicfes') is-invalid @enderror" name="nombrePreicfes" placeholder="Tu respuesta" id="nombrePreicfes" style="background-color: #ececec;" value="{{ old('nombrePreicfes')}}" required>
                    @error('nombrePreicfes')
                    <small class="invalid-feedback">*{{$message}}</small>
                    @enderror
                </div>
                <!----- Descripcion ----->
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label fw-bold">Descripción</label>
                    <textarea type="text" name="descripcionPreicfes" class="form-control @error('descripcionPreicfes') is-invalid @enderror" id="editor" placeholder="Tu respuesta" style="background-color: #ececec; font-size: 14px;" required>{{ isset($preicfes->descripcionPreicfes)?$preicfes->descripcionPreicfes:old('descripcionPreicfes')}}</textarea>
                    @error('descripcionPreicfes')
                    <small class="invalid-feedback">*{{$message}}</small>
                    <br>
                    @enderror
                </div>
                <!----- Fecha inicio inscripcion ----->
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"><strong>Fecha inicio de inscripción</strong></label>
                    <?php
                    $date = date('Y-m-d');
                    ?>
                    <input type="date" class="form-control @error('fecha_inicio_inscripcionPreicfes') is-invalid @enderror" name="fecha_inicio_inscripcionPreicfes" id="fecha_inicio_inscripcionPreicfes" value="{{ old('fecha_inicio_inscripcionPreicfes')}}" style="background-color: #ececec;" required>
                    @error('fecha_inicio_inscripcionPreicfes')
                    <small class="invalid-feedback">*{{$message}}</small>
                    <br>
                    @enderror
                </div>
                <!----- Fecha fin inscripcion ----->
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"><strong>Fecha fin de inscripción</strong></label>
                    <?php
                    $date = date('Y-m-d');
                    ?>
                    <input type="date" class="form-control @error('fecha_fin_inscripcionPreicfes') is-invalid @enderror" name="fecha_fin_inscripcionPreicfes" id="fecha_fin_inscripcionPreicfes" value="{{ old('fecha_fin_inscripcionPreicfes')}}" style="background-color: #ececec;" required>
                    @error('fecha_fin_inscripcionPreicfes')
                    <small class="invalid-feedback">*{{$message}}</small>
                    <br>
                    @enderror
                </div>
                <!----- Tipo de curso ----->
                <div class="mb-3">
                    <label class="form-label fw-bold">Tipo de curso</label>
                    <select name="tipo_cursoPreicfes" id="tipo_cursoPreicfes" class="form-select @error('tipo_cursoPreicfes') is-invalid @enderror" value="{{ old('tipoCursoOfertaPreicfes')}}" required>
                        <option selected disabled value="{{ old('tipo_cursoPreicfes')}}">Elige</option>
                        <option value="Virtual" @if('Virtual'==old('tipo_cursoPreicfes')) selected @endif>Virtual</option>
                        <option value="Presencial" @if('Presencial'==old('tipo_cursoPreicfes')) selected @endif>Presencial</option>
                    </select>
                    @error('tipo_cursoPreicfes')
                    <small class="invalid-feedback">*{{$message}}</small>
                    @enderror
                </div>
                <!----- Poblacion objetivo  ----->
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fw-bold">Población objetivo</label>
                    <input type="text" class="form-control @error('poblacion_objetivoPreicfes') is-invalid @enderror" name="poblacion_objetivoPreicfes" id="poblacion_objetivoPreicfes" value="{{ old('poblacion_objetivoPreicfes')}}" aria-describedby="emailHelp" placeholder="Tu respuesta" style="background-color: #ececec;" required>
                    @error('poblacion_objetivoPreicfes')
                    <small class="invalid-feedback">*{{$message}}</small>
                    @enderror
                </div>
                <!----- Estructura del curso ----->
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label fw-bold">Estructura del curso</label>
                    <textarea type="text" name="estructuraPreicfes" class="form-control @error('estructuraPreicfes') is-invalid @enderror" id="estructuraPreicfes" placeholder="Tu respuesta" style="background-color: #ececec;" required>{{ old('estructuraPreicfes')}}</textarea>
                    @error('estructuraPreicfes')
                    <small class="invalid-feedback">*{{$message}}</small>
                    <br>
                    @enderror
                </div>
            </div>
            <div class="col">
                <!----- Imagen  ----->
                <div class="mb-3">
                    <label for="formFile" class="form-label fw-bold">Seleccione una imagen</label>
                    <input class="form-control  @error('imagenPreicfes') is-invalid @enderror" type="file" name="imagenPreicfes" id="imagenPreicfes" accept="image/*" value="{{old('imagenPreicfes')}}" style="background-color: #ececec;" required>
                    <img class="img-thumbnail img-fluid" id="imagenSeleccionada" width="100" alt="">
                    @error('imagenPreicfes')
                    <small class="invalid-feedback">{{$message}}</small>
                    @enderror
                </div>
                <!----- Fecha inicio  ----->
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"><strong>Fecha inicio de clases</strong></label>
                    <?php
                    $date = date('Y-m-d');
                    ?>
                    <input type="date" class="form-control @error('fecha_inicioPreicfes') is-invalid @enderror" name="fecha_inicioPreicfes" id="fecha_inicioPreicfes" value="{{ old('fecha_inicioPreicfes')}}" style="background-color: #ececec;" required>
                    @error('fecha_inicioPreicfes')
                    <small class="invalid-feedback">*{{$message}}</small>
                    <br>
                    @enderror
                </div>
                <!----- Fecha Fin  ----->
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"><strong>Fecha final de clases</strong></label>
                    <?php
                    $date = date('Y-m-d');
                    ?>
                    <input type="date" class="form-control @error('fecha_finPreicfes') is-invalid @enderror" name="fecha_finPreicfes" id="fecha_finPreicfes" value="{{ old('fecha_finPreicfes')}}" style="background-color: #ececec;" required>
                    @error('fecha_finPreicfes')
                    <small class="invalid-feedback">*{{$message}}</small>
                    <br>
                    @enderror
                </div>
                <!----- Duracion  ----->
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fw-bold">Duración</label>
                    <input type="text" class="form-control  @error('duracionPreicfes') is-invalid @enderror" name="duracionPreicfes" id="duracionPreicfes" value="{{ old('duracionPreicfes')}}" aria-describedby="emailHelp" placeholder="Tu respuesta" style="background-color: #ececec;" required>
                    @error('duracionPreicfes')
                    <small class="invalid-feedback">*{{$message}}</small>
                    <br>
                    @enderror
                </div>
                <!----- Valor ----->
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label fw-bold">Valor</label>
                    <input type="number" min="0" name="valorPreicfes" class="form-control @error('valorPreicfes') is-invalid @enderror" id="valorPreicfes" value="{{ old('valorPreicfes')}}" placeholder="Tu respuesta" style="background-color: #ececec;" required>
                    @error('valorPreicfes')
                    <small class="invalid-feedback">*{{$message}}</small>
                    <br>
                    @enderror
                </div>
                <!----- Pasos para inscribirse ----->
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label fw-bold">Pasos para inscribirse</label>
                    <textarea type="text" name="pasos_inscripcionPreicfes" class="form-control @error('pasos_inscripcionPreicfes') is-invalid @enderror" id="pasos_inscripcionPreicfes" placeholder="Tu respuesta" style="background-color: #ececec;" required>{{ old('pasos_inscripcionPreicfes')}}</textarea>
                    @error('pasos_inscripcionPreicfes')
                    <small class="invalid-feedback">*{{$message}}</small>
                    <br>
                    @enderror
                </div>
                <!----- Horario Dinamico ----->
                <div class=" mb-3">
                    <label for="exampleInputPassword1" class="form-label fw-bold">Horario</label>
                    <?php $num = 1 ?>
                    <div class="botones col-12 ">
                        <button class="btn add-btn botones btn-añadir">+</button>
                        <input type="text" id="horario1" name="horario[]" placeholder="Tu respuesta" class=" ms-2 form-control @error('horario[]') is-invalid @enderror" value="{{ old('input#horario1')}}" required>
                    </div>
                    <div class="newData"></div>
                    @error('horario')
                    <small class="invalid-feedback">*{{$message}}</small>
                    @enderror
                </div>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col" style="text-align: right;">
                <a type="button" class="btn btn-secondary" href="{{url('/admin/listPreicfes') }}"><i class="bi bi-x"></i> Cancelar</a>
                <button type="submit" class="btn btn-primary"><i class="bi bi-pencil-square"></i>Guardar</button>
            </div>
        </div>
    </form>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $(document).ready(function(e) {

        $('#imagenPreicfes').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#imagenSeleccionada').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>

<script type="text/javascript">
    $(function() {

        var i = 1;
        $('.add-btn').click(function(e) {
            e.preventDefault();
            i++;

            $('.newData').append('<div id="newRow' + i + '" class=" col-12 botones form-row mt-2">' +
                '<a href="#" class="btn btn-danger  remove-lnk" id="' + i + '">-</a>' +
                '<input type="text" name="horario[]" placeholder="Tu respuesta" class=" ms-2 form-control "  required>' +
                '</div>'
            );
        });

        $(document).on('click', '.remove-lnk', function(e) {
            e.preventDefault();

            var id = $(this).attr("id");
            $('#newRow' + id + '').remove();

        });

    });
</script>