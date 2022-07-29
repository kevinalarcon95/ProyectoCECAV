@extends('layouts.template')

@section('content')
<div class="conteiner m-5">
<form  class="row g-3 needs-validation" method="post" action="{{ url('/admin/savePreicfes')}}" enctype="multipart/form-data" novalidate>
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
            <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" placeholder="Tu respuesta" id="nombre" style="background-color: #ececec;" value="{{ old('nombre')}}" required>
            @error('nombre')
            <small class="invalid-feedback">*{{$message}}</small>
            @enderror
        </div>
        <!----- Descripcion ----->
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label fw-bold">Descripción</label>
            <textarea type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" placeholder="Tu respuesta" style="background-color: #ececec; font-size: 14px;" required>{{ old('descripcion')}}</textarea>
            @error('descripcion')
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
            <input type="date" class="form-control @error('fecha_inicio_inscripcion') is-invalid @enderror" name="fecha_inicio_inscripcion" id="fecha_inicio_inscripcion" value="{{ old('fecha_inicio_inscripcion')}}" style="background-color: #ececec;" required>
            @error('fecha_inicio_inscripcion')
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
            <input type="date" class="form-control @error('fecha_fin_inscripcion') is-invalid @enderror" name="fecha_fin_inscripcion" id="fecha_fin_inscripcion" value="{{ old('fecha_fin_inscripcion')}}" style="background-color: #ececec;" required>
            @error('fecha_fin_inscripcion')
            <small class="invalid-feedback">*{{$message}}</small>
            <br>
            @enderror
        </div>
        <!----- Tipo de curso ----->
        <div class="mb-3">
            <label class="form-label fw-bold">Tipo de curso</label>
            <select name="tipo_curso" id="tipo_curso" class="form-select @error('tipo_curso') is-invalid @enderror" value="{{ old('tipoCursoOferta')}}" required>
                <option selected disabled value="{{ old('tipo_curso')}}">Elige</option>
                <option value="Virtual" @if('Virtual'==old('tipo_curso')) selected @endif>Virtual</option>
                <option value="Presencial" @if('Presencial'==old('tipo_curso')) selected @endif>Presencial</option>
            </select>
            @error('tipo_curso')
                <small class="invalid-feedback">*{{$message}}</small>
            @enderror
        </div>
        <!----- Poblacion objetivo  ----->
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label fw-bold">Población objetivo</label>
            <input type="text" class="form-control @error('poblacion_objetivo') is-invalid @enderror" name="poblacion_objetivo" id="poblacion_objetivo" value="{{ old('poblacion_objetivo')}}" aria-describedby="emailHelp" placeholder="Tu respuesta" style="background-color: #ececec;" required>
            @error('poblacion_objetivo')
                <small class="invalid-feedback">*{{$message}}</small>
            @enderror
        </div>
        <!----- Estructura del curso ----->
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label fw-bold">Estructura del curso</label>
            <textarea type="text" name="estructura" class="form-control @error('estructura') is-invalid @enderror" id="estructura" placeholder="Tu respuesta" style="background-color: #ececec; font-size: 14px;" required>{{ old('estructura')}}</textarea>
            @error('estructura')
            <small class="invalid-feedback">*{{$message}}</small>
            <br>
            @enderror
        </div>
    </div>
    <div class="col">
        <!----- Imagen  ----->
        <div class="mb-3">
            <label for="formFile" class="form-label fw-bold">Seleccione una imagen</label>
            <input class="form-control  @error('imagen') is-invalid @enderror" type="file" name="imagen" id="imagen" accept="image/*" value="{{old('imagenOferta')}}"  style="background-color: #ececec;" required>
            <img class="img-thumbnail img-fluid" id="imagenSeleccionada"  width="100" alt="">
            @error('imagen')
            <small class="invalid-feedback">{{$message}}</small>
            @enderror
        </div>
        <!----- Fecha inicio  ----->
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"><strong>Fecha inicio de clases</strong></label>
            <?php
            $date = date('Y-m-d');
            ?>
            <input type="date" class="form-control @error('fecha_inicio') is-invalid @enderror" name="fecha_inicio" id="fecha_inicio" value="{{ old('fecha_inicio')}}" style="background-color: #ececec;" required>
            @error('fecha_inicio')
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
            <input type="date" class="form-control @error('fecha_fin') is-invalid @enderror" name="fecha_fin" id="fecha_fin" value="{{ old('fecha_fin')}}" style="background-color: #ececec;" required>
            @error('fecha_fin')
            <small class="invalid-feedback">*{{$message}}</small>
            <br>
            @enderror
        </div>
        <!----- Duracion  ----->
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label fw-bold">Duración</label>
            <input type="text" class="form-control  @error('duracion') is-invalid @enderror" name="duracion" id="duracion" value="{{ old('duracion')}}" aria-describedby="emailHelp" placeholder="Tu respuesta" style="background-color: #ececec;" required>
            @error('duracion')
            <small class="invalid-feedback">*{{$message}}</small>
            <br>
            @enderror
        </div>
        <!----- Valor ----->
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label fw-bold">Valor</label>
            <input type="number" min="0" name="valor" class="form-control @error('valor') is-invalid @enderror" id="valor" value="{{ old('valor')}}" placeholder="Tu respuesta" style="background-color: #ececec;" required>
            @error('valor')
            <small class="invalid-feedback">*{{$message}}</small>
            <br>
            @enderror
        </div>
        <!----- Pasos para inscribirse ----->
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label fw-bold">Pasos para inscribirse</label>
            <textarea type="text" name="pasos_inscripcion" class="form-control @error('pasos_inscripcion') is-invalid @enderror" id="pasos_inscripcion" placeholder="Tu respuesta" style="background-color: #ececec; font-size: 14px;" required>{{ old('pasos_inscripcion')}}</textarea>
            @error('pasos_inscripcion')
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
        
        $('#imagen').change(function() {
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