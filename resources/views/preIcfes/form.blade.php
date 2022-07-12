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
            <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" placeholder="Tu respuesta" id="nombre" style="background-color: #ececec;" value="{{ isset($preicfes->nombre)?$preicfes->nombre:old('nombre')}}" required>
            @error('nombre')
            <small class="invalid-feedback">*{{$message}}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label fw-bold">Descripcion</label>
            <textarea type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" placeholder="Tu respuesta" style="background-color: #ececec;" required>{{ isset($preicfes->descripcion)?$preicfes->descripcion:old('descripcion')}}</textarea>
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
            <input type="date" class="form-control @error('fecha_inicio_inscripcion') is-invalid @enderror" name="fecha_inicio_inscripcion" id="fecha_inicio_inscripcion" value="{{ isset($preicfes->fecha_inicio_inscripcion)?$preicfes->fecha_inicio_inscripcion:old('fecha_inicio_inscripcion')}}" style="background-color: #ececec;" required>
            @error('fecha_inicio_inscripcion')
            <small class="invalid-feedback">*{{$message}}</small>
            <br>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"><strong>Fecha fin inscripcion</strong></label>
            <?php
            $date = date('Y-m-d');
            ?>
            <input type="date" class="form-control @error('fecha_fin_inscripcion') is-invalid @enderror" name="fecha_fin_inscripcion" id="fecha_fin_inscripcion" value="{{ isset($preicfes->fecha_fin_inscripcion)?$preicfes->fecha_fin_inscripcion:old('fecha_fin_inscripcion')}}" style="background-color: #ececec;" required>
            @error('fecha_fin_inscripcion')
            <small class="invalid-feedback">*{{$message}}</small>
            <br>
            @enderror
        </div>
        <!----------------- SE ESTA TRABAJANDO AQUI ------------------------------------------------>
        <div class=" mb-3">
            <label for="exampleInputPassword1" class="form-label fw-bold">Horario</label>
            <?php $num = 1 ?>
            @if ($modo=="Añadir")
            <input type="text" name="horario[]" placeholder="Tu respuesta" class="form-control @error('horario[]') is-invalid @enderror" required>
            <button class="btn add-btn btn-info">+</button>
            <div class="newData"></div>
            @error('horario')
            <small class="invalid-feedback">*{{$message}}</small>
            @enderror
            @else
            @foreach ($horarios as $var)

            @if ($num == 1)
            <input type="text" name="horario[]" placeholder="Tu respuesta" value='{{ $var->horario}}' class="form-control @error('horario[]') is-invalid @enderror" required>
            <button class="btn add-btn btn-info">+</button>
            <?php $num++ ?>
            @if(count($horarios)==1)
            <div class="newData"></div>
            @endif
            @else
            @if ($num == 2)
            <div class="newData">
                @endif
                <div id="newRow{{$num}}" class="form-row">
                    <input type="text" name="horario[]" placeholder="Tu respuesta" value='{{ $var->horario}}' class="form-control @error('horario[]') is-invalid @enderror" required>
                    <a href="#" class="remove-lnk" id="{{$num}}">Eliminar "'{{$num}}'"</a>
                    <?php $num++ ?>
                </div>
                @endif

                @error('horario')
                <small class="invalid-feedback">*{{$message}}</small>
                @enderror
                @endforeach
                @if(count($horarios)!=1)
            </div>
            @endif
            @endif
        </div>

        <!----------------- FIN ------------------------------------------------>
        <div class="mb-3">
            <label class="form-label fw-bold">Tipo de curso</label>
            <select name="tipo_curso" id="tipo_curso" class="form-select @error('tipo_curso') is-invalid @enderror" value="{{ old('tipoCursoOferta')}}" required>
                <option selected disabled value="{{ old('tipo_curso')}}">Elige</option>
                <option value="Virtual" @if('Virtual'==old('tipo_curso') or isset($preicfes->tipo_curso) and 'Virtual' == $preicfes->tipo_curso) selected @endif>Virtual</option>
                <option value="Presencial" @if('Presencial'==old('tipo_curso') or isset($preicfes->tipo_curso) and 'Presencial' == $preicfes->tipo_curso) selected @endif>Presencial</option>
            </select>
            @error('tipo_curso')
                <small class="invalid-feedback">*{{$message}}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label fw-bold">Poblacion objetivo</label>
            <input type="text" class="form-control @error('poblacion_objetivo') is-invalid @enderror" name="poblacion_objetivo" id="poblacion_objetivo" value="{{ isset($preicfes->poblacion_objetivo)?$preicfes->poblacion_objetivo:old('poblacion_objetivo')}}" aria-describedby="emailHelp" placeholder="Tu respuesta" style="background-color: #ececec;" required>
            @error('poblacion_objetivo')
                <small class="invalid-feedback">*{{$message}}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label fw-bold">Estructura del curso</label>
            <textarea type="text" name="estructura" class="form-control @error('estructura') is-invalid @enderror" id="estructura" placeholder="Tu respuesta" style="background-color: #ececec;" required>{{ isset($preicfes->estructura)?$preicfes->estructura:old('estructura')}}</textarea>
            @error('estructura')
            <small class="invalid-feedback">*{{$message}}</small>
            <br>
            @enderror
        </div>
    </div>
    <div class="col">
        <div class="mb-3">
            <label for="formFile" class="form-label fw-bold">Seleccione una imagen</label>
            <input class="form-control  @error('$preicfes->imagen') is-invalid @enderror" type="file" name="imagen" id="imagen" accept="image/*" style="background-color: #ececec;" @if(!isset($preicfes->imagen)) required @endif>
            <img class="img-thumbnail img-fluid" id="imagenSeleccionada" src="@if(isset($preicfes->imagen)){{ asset($preicfes->imagen) }}@endif" width="100" alt="">
            @error('imagen')
            <small class="invalid-feedback">{{$message}}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"><strong>Fecha inicio</strong></label>
            <?php
            $date = date('Y-m-d');
            ?>
            <input type="date" class="form-control @error('fecha_inicio') is-invalid @enderror" name="fecha_inicio" id="fecha_inicio" value="{{ isset($preicfes->fecha_inicio)?$preicfes->fecha_inicio:old('fecha_inicio')}}" style="background-color: #ececec;" required>
            @error('fecha_inicio')
            <small class="invalid-feedback">*{{$message}}</small>
            <br>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"><strong>Fecha fin</strong></label>
            <?php
            $date = date('Y-m-d');
            ?>
            <input type="date" class="form-control @error('fecha_fin') is-invalid @enderror" name="fecha_fin" id="fecha_fin" value="{{ isset($preicfes->fecha_fin)?$preicfes->fecha_fin:old('fecha_fin')}}" style="background-color: #ececec;" required>
            @error('fecha_fin')
            <small class="invalid-feedback">*{{$message}}</small>
            <br>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label fw-bold">Duracion</label>
            <input type="text" class="form-control  @error('duracion') is-invalid @enderror" name="duracion" id="duracion" value="{{ isset($preicfes->duracion)?$preicfes->duracion:old('duracion')}}" aria-describedby="emailHelp" placeholder="Tu respuesta" style="background-color: #ececec;" required>
            @error('duracion')
            <small class="invalid-feedback">*{{$message}}</small>
            <br>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label fw-bold">Valor</label>
            <input type="number" min="0" name="valor" class="form-control @error('valor') is-invalid @enderror" id="valor" value="{{ isset($preicfes->valor)?$preicfes->valor:old('valor')}}" placeholder="Tu respuesta" style="background-color: #ececec;" required>
            @error('valor')
            <small class="invalid-feedback">*{{$message}}</small>
            <br>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label fw-bold">Pasos para inscribirse</label>
            <textarea type="text" name="pasos_inscripcion" class="form-control @error('pasos_inscripcion') is-invalid @enderror" id="pasos_inscripcion" placeholder="Tu respuesta" style="background-color: #ececec;" required>{{ isset($preicfes->pasos_inscripcion)?$preicfes->pasos_inscripcion:old('pasos_inscripcion')}}</textarea>
            @error('pasos_inscripcion')
            <small class="invalid-feedback">*{{$message}}</small>
            <br>
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
        var modo = '<?= $modo ?>';

        if (modo == "Añadir") {
            var i = 1;
        } else {
            var i = <?= $num - 1 ?>;
        }
        $('.add-btn').click(function(e) {
            e.preventDefault();
            i++;

            $('.newData').append('<div id="newRow' + i + '" class="form-row">' +
                '<input type="text" name="horario[]" placeholder="Tu respuesta" class="form-control " required>' +
                '<a href="#" class="remove-lnk" id="' + i + '">Eliminar "' + i + '"</a>' +
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