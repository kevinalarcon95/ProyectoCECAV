@extends('layouts.template')

@section('content')

<!--Formulario inscripcion preicfes-->


<div class="row">
    <div class="row text-center mt-5 mb-3">
        <h2 class="fw-bold">FORMULARIO DE INSCRIPCIÓN CURSO SABER 11 (CALENDARIO A)</h2>
    </div>
</div>

<div class="row mx-5">
    <div class="col-6">

        <div class="mb-3">
            <label class="form-label fw-bold">TIPO DE IDENTIFICACIÓN</label>
            <select class="form-select" name="tipoIdIcfes" aria-label="Default select example" style="background-color: #ececec;">
                <option selected>Elige</option>
                <option value="1">Cedula</option>
                <option value="2">Tarjeta de identidad</option>
                @error('tipoIdIcfes')
                <br>
                <small class="text-danger"> *{{$message}}</small>
                <br>
                @enderror
            </select>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label fw-bold">NOMBRES Y APELLIDOS COMPLETOS</label>
            <input type="text" class="form-control" name="nombreIcfes" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tu respuesta" style="background-color: #ececec;" required>
            @error('nombreIcfes')
            <br>
            <small class="text-danger">*{{$message}}</small>
            <br>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label fw-bold">NÚMERO TÉLEFONO</label>
            <input type="text" class="form-control" name="telefonoIcfes" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tu respuesta" style="background-color: #ececec;" required>
            @error('telefonoIcfes')
            <br>
            <small class="text-danger">*{{$message}}</small>
            <br>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label fw-bold">CORREO ELECTRÓNICO PERSONAL</label>
            <input type="text" class="form-control" name="correoIcfes" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tu respuesta" style="background-color: #ececec;" required>
            @error('correoIcfes')
            <br>
            <small class="text-danger">*{{$message}}</small>
            <br>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label fw-bold">MUNICIPIO EN EL QUE ESTÁ UBICADO EL NOMBRE DEL COLEGIO</label>
            <input type="text" class="form-control" name="municipioIcfes" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tu respuesta" style="background-color: #ececec;" required>
            @error('municipioIcfes')
            <br>
            <small class="text-danger">*{{$message}}</small>
            <br>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label fw-bold">CORREO ELECTRONICO Ó NÚMERO TELEFÓNICO DEL ACUDIENTE</label>
            <input type="text" class="form-control" name="numAcuIcfes" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tu respuesta" style="background-color: #ececec;" required>
            @error('numAcuIcfes')
            <br>
            <small class="text-danger">*{{$message}}</small>
            <br>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label fw-bold">PROGRAMA DE PREGRADO AL CUAL ASPIRA</label>
            <input type="text" class="form-control" name="programaIcfes" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tu respuesta" style="background-color: #ececec;" required>
            @error('programaIcfes')
            <br>
            <small class="text-danger">*{{$message}}</small>
            <br>
            @enderror
        </div>

    </div>
    <div class="col-6">

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label fw-bold">NÚMERO DE IDENTIFICACIÓN</label>
            <input type="text" class="form-control" name="numIdIcfes" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tu respuesta" style="background-color: #ececec;" required>
            @error('numIdIcfes')
            <br>
            <small class="text-danger">*{{$message}}</small>
            <br>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label fw-bold">DIRECCIÓN DE RESIDENCIA</label>
            <input type="text" class="form-control" name="dirResIcfes" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tu respuesta" style="background-color: #ececec;" required>
            @error('dirResIcfes')
            <br>
            <small class="text-danger">*{{$message}}</small>
            <br>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label fw-bold">NOMBRE DEL COLEGIO EN EL QUE ESTÁ ESTUDIANDO O ESTUDIÓ</label>
            <input type="text" class="form-control" name="nomColIcfes" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tu respuesta" style="background-color: #ececec;" required>
            @error('nomColIcfes')
            <br>
            <small class="text-danger">*{{$message}}</small>
            <br>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label fw-bold">DEPARTAMENTO EN QUE ESTÁ UBICADO EL NOMBRE DEL COLEGIO</label>
            <input type="text" class="form-control" name="departamentoIcfes" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tu respuesta" style="background-color: #ececec;" required>
            @error('departamentoIcfes')
            <br>
            <small class="text-danger">*{{$message}}</small>
            <br>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label fw-bold">NOMBRES Y APELLIDOS COMPLETOS DEL ACUDIENTE*</label>
            <input type="text" class="form-control" name="nomAcuIcfes" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tu respuesta" style="background-color: #ececec;" required>
            @error('nomAcuIcfes')
            <br>
            <small class="text-danger">*{{$message}}</small>
            <br>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">TIPO DE CURSO</label>
            <select class="form-select" name="tipoCursoIcfes" aria-label="Default select example" style="background-color: #ececec;">
                <option selected>Elige</option>
                <option value="1">CURSO SABER 11 MODALIDAD VIRTUAL (200 HORAS) $520.000</option>
                <option value="2">CURSO SABER 11 MODALIDAD PRESENCIAL (200 HORAS) $650.000</option>
                @error('tipoCursoIcfes')
                <br>
                <small class="text-danger"> *{{$message}}</small>
                <br>
                @enderror
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">HORARIO</label>
            <select class="form-select" name="horarioIcfes" aria-label="Default select example" style="background-color: #ececec;">
                <option selected>Elige</option>
                <option value="1">7:30AM A 12:00PM (LUNES A VIERNES) VIRTUAL</option>
                <option value="2">2:00PM A 6:30PM (LUNES A VIERNES) PRESENCIAL</option>
                @error('horarioIcfes')
                <br>
                <small class="text-danger"> *{{$message}}</small>
                <br>
                @enderror
            </select>
        </div>

    </div>
</div>


<!--Fin formulario inscripcion preicfes-->

@endsection