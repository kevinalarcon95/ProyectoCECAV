<div class="row mx-3 ">

    <div class="col-sm-11 botones me-2" style=" color: #3E4C60">
        @if($modo=='Añadir')
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="#4285F4" class="bi bi-plus-circle-fill " viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
        </svg>
        <h5 class="titulo">Añadir registro</h5>
        @else
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
        </svg>
        <h5 class="titulo">Editar registro</h5>
        @endif
    </div>
</div>
<hr />
<div class="row m-3 pt-3">

    <div class="col">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label fw-bold">Nombre</label>
            <input type="text" class="form-control  @error('nombre') is-invalid @enderror" name="nombre" placeholder="Tu respuesta" id="nombre" style="background-color: #ececec;" value="{{ isset($preicfes->nombre)?$preicfes->nombre:old('nombre')}}" >
            @error('nombre')
            <small id="validationServer03Feedback" class="invalid-feedback">*{{$message}}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label fw-bold">Descripcion</label>
            <textarea type="text" name="descripcion" class="form-control" id="descripcion" placeholder="Tu respuesta" style="background-color: #ececec;"> {{ isset($preicfes->descripcion)?$preicfes->descripcion:old('descripcion'); }}</textarea>
            <div class="invalid-feedback">*Campo obligatorio.</div>
            @error('descripcion')
            <small class="invalid-feedback">*{{$message}}</small>
            <br>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"><strong>Fecha inicio inscripcion</strong></label>
            <?php
            $date = date('Y-m-d');
            ?>
            <input type="date" class="form-control" name="fecha_inicio_inscripcion" id="fecha_inicio_inscripcion" value="{{ isset($preicfes->fecha_inicio_inscripcion)?$preicfes->fecha_inicio_inscripcion:old('fecha_inicio_inscripcion')}}" style="background-color: #ececec;">
            @error('fecha_inicio_inscripcion')
            <small class="text-danger">*{{$message}}</small>
            <br>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"><strong>Fecha fin inscripcion</strong></label>
            <?php
            $date = date('Y-m-d');
            ?>
            <input type="date" class="form-control" name="fecha_fin_inscripcion" id="fecha_fin_inscripcion" value="{{ isset($preicfes->fecha_fin_inscripcion)?$preicfes->fecha_fin_inscripcion:old('fecha_fin_inscripcion')}}" style="background-color: #ececec;">
            @error('fecha_fin_inscripcion')
            <small class="text-danger">*{{$message}}</small>
            <br>
            @enderror
        </div>
        <div class=" mb-3">
            <label for="exampleInputPassword1" class="form-label fw-bold">Horario</label>
            <textarea type="text" name="horario" class="form-control" id="horario" placeholder="Tu respuesta" style="background-color: #ececec;"> {{ isset($preicfes->horario)?$preicfes->horario:old('horario'); }}</textarea>
            <div class="invalid-feedback">*Campo obligatorio.</div>
            @error('horario')
            <small class="invalid-feedback">*{{$message}}</small>
            <br>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Tipo de curso</label>
            <select class="form-select" name="tipo_curso" aria-label="Default select example" style="background-color: #ececec;">
                <option selected>Elige</option>
                @foreach ($opcionesTipoCurso as $tipo)
                <option value="{{ $tipo }}" @if ($tipo==old('tipo_curso') or isset($preicfes->tipo_curso) and $tipo == $preicfes->tipo_curso)
                    selected="selected"
                    @endif
                    >{{ $tipo }}</option>
                @endforeach
            </select>
            @error('tipo_curso')
            <small class="text-danger">*{{$message}}</small>
            <br>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label fw-bold">Poblacion objetivo</label>
            <input type="text" class="form-control" name="poblacion_objetivo" id="poblacion_objetivo" value="{{ isset($preicfes->poblacion_objetivo)?$preicfes->poblacion_objetivo:old('poblacion_objetivo')}}" aria-describedby="emailHelp" placeholder="Tu respuesta" style="background-color: #ececec;">
            @error('poblacion_objetivo')
            <small class="text-danger">*{{$message}}</small>
            <br>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label fw-bold">Estructura del curso</label>
            <textarea type="text" name="estructura" class="form-control" id="estructura" placeholder="Tu respuesta" style="background-color: #ececec;">{{ isset($preicfes->estructura)?$preicfes->estructura:old('estructura')}}</textarea>
            @error('estructura')
            <small class="text-danger">*{{$message}}</small>
            <br>
            @enderror
        </div>
    </div>
    <div class="col">
        <div class="mb-3">
            <label for="formFile" class="form-label fw-bold">Seleccione una imagen</label>
            <input class="form-control" type="file" name="imagen" id="imagen" accept="image/*" style="background-color: #ececec;">

            <img class="img-thumbnail img-fluid" id="imagenSeleccionada" src="@if(isset($preicfes->imagen)){{ asset($preicfes->imagen) }}@endif" width="100" alt="">

            @error('imagen')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
       
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"><strong>Fecha inicio</strong></label>
            <?php
            $date = date('Y-m-d');
            ?>
            <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" value="{{ isset($preicfes->fecha_inicio)?$preicfes->fecha_inicio:old('fecha_inicio')}}" style="background-color: #ececec;">
            @error('fecha_inicio')
            <small class="text-danger">*{{$message}}</small>
            <br>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"><strong>Fecha fin</strong></label>
            <?php
            $date = date('Y-m-d');
            ?>
            <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" value="{{ isset($preicfes->fecha_fin)?$preicfes->fecha_fin:old('fecha_fin')}}" style="background-color: #ececec;">
            @error('fecha_fin')
            <small class="text-danger">*{{$message}}</small>
            <br>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label fw-bold">Duracion</label>
            <input type="text" class="form-control" name="duracion" id="duracion" value="{{ isset($preicfes->duracion)?$preicfes->duracion:old('duracion')}}" aria-describedby="emailHelp" placeholder="Tu respuesta" style="background-color: #ececec;">
            @error('duracion')
            <small class="text-danger">*{{$message}}</small>
            <br>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label fw-bold">Valor</label>
            <input type="number" min="0" name="valor" class="form-control" id="valor" value="{{ isset($preicfes->valor)?$preicfes->valor:old('valor')}}" placeholder="Tu respuesta" style="background-color: #ececec;">
            @error('valor')
            <small class="text-danger">*{{$message}}</small>
            <br>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label fw-bold">Pasos para inscribirse</label>
            <textarea type="text" name="pasos_inscripcion" class="form-control" id="pasos_inscripcion" placeholder="Tu respuesta" style="background-color: #ececec;">{{ isset($preicfes->pasos_inscripcion)?$preicfes->pasos_inscripcion:old('pasos_inscripcion')}}</textarea>
            @error('pasos_inscripcion')
            <small class="text-danger">*{{$message}}</small>
            <br>
            @enderror
        </div>
    </div>
</div>
<hr />
<div class="row">
    <div class="col" style="text-align: right;">

        <button type="button" class="btn btn-secondary"><i class="bi bi-x"></i><a class="btn-secondary btn-cancelar" href="{{url('/admin/listPreicfes') }}">Cancelar</a> </button>

        <button type="submit" class="btn btn-primary"><i class="bi bi-pencil-square"></i>Guardar</button>
    </div>
</div>

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