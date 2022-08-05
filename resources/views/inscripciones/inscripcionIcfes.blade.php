@extends('layouts.template')

@section('content')

<!--Formulario inscripcion preicfes-->

<div class="container">
    <div class="row text-center mt-5 mb-3">
        <h2 class="fw-bold">FORMULARIO DE INSCRIPCIÓN CURSO PREICFES</h2>
    </div>
    <form action="{{route('/saveInscripPreIcfes')}}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="row form-floating px-2">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 275px;font-size:18px; color:#8F8E8E;" disabled>
        PASOS PARA LA MATRICULA 

        1. Revise spam, correos no deseados (algunas veces el recibo llega a estas carpetas).
        2. Imprimir el recibo en impresión laser.
        3. Pagar el recibo en el Banco de Bogotá, Banco Popular, Banco de Occidente, Puntos Supergiros o Pagos a través del Botón PSE
           página Web Unicauca.
        4. TIENE 3 DÍAS HÁBILES PARA PAGAR DESPUÉS DE QUE LE LLEGUE EL RECIBO AL CORREO ELECTRÓNICO.
        5. Envíe el recibo escaneado a recaudo.unicauca@gmail.com para asignarle el cupo.
        6. Conserve su recibo de pago.
    </textarea>
        </div>

        <div class="row">
            <div class="my-3">
                <label class="form-label fw-bold">Curso al cual se quiere inscribir</label>
                <select class="form-select" name="idIcfes" value="{{$objPreIcfes->id}}" style="background-color: #ececec;" required>
                    <option selected readonly="true" value="{{$objPreIcfes->id}}">{{$objPreIcfes->nombre}}</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-6">

                <div class="mb-3">
                    <label class="form-label fw-bold">Tipo identificación</label>
                    <input type="text" class="form-control" name="tipoIdIcfes" placeholder="{{$objUser->tipoId}}" value="{{$objUser->tipoId}}" readonly="true">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Nombres y apellidos completos</label>
                    <input type="text" class="form-control" name="nombreIcfes" placeholder="{{$objUser->name}} {{$objUser->lastname}}" value="{{$objUser->name}} {{$objUser->lastname}}" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122)|| (event.charCode == 209) ||(event.charCode == 241))" readonly="true">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Número teléfono</label>
                    <input type="number" class="form-control @error('telefonoIcfes') is-invalid @enderror" value="{{old('telefonoIcfes')}}" name="telefonoIcfes" placeholder="Tu respuesta" required>
                    @error('telefonoIcfes')
                    <small class="invalid-feedback">*{{$message}}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Correo electrónico personal</label>
                    <input type="text" class="form-control" name="correoIcfes" placeholder="{{$objUser->email}}" value="{{$objUser->email}}" readonly="true">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Municipio en el que está ubicado el nombre del colegio</label>
                    <input type="text" class="form-control @error('municipioIcfes') is-invalid @enderror" value="{{old('municipioIcfes')}}" name="municipioIcfes" placeholder="Tu respuesta" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32)|| (event.charCode == 209) ||(event.charCode == 241))" required>
                    @error('municipioIcfes')
                    <small class="invalid-feedback">*{{$message}}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Correo electrónico ó número telefónico del acudiente</label>
                    <input type="text" class="form-control @error('numAcuIcfes') is-invalid @enderror" value="{{old('numAcuIcfes')}}" name="numAcuIcfes" placeholder="Tu respuesta" onkeypress="return ((event.charCode != 209) && (event.charCode != 241))" required>
                    @error('numAcuIcfes')
                    <small class="invalid-feedback">*{{$message}}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Programa de pregrado al cual aspira</label>
                    <input type="text" class="form-control @error('programaIcfes') is-invalid @enderror" value="{{old('programaIcfes')}}" name="programaIcfes" placeholder="Tu respuesta" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32)|| (event.charCode == 209) ||(event.charCode == 241))" required>
                    @error('programaIcfes')
                    <small class="invalid-feedback">*{{$message}}</small>
                    @enderror
                </div>

            </div>
            <div class="col-6">

                <div class="mb-3">
                    <label class="form-label fw-bold">Número de identificación</label>
                    <input type="text" class="form-control" name="numIdIcfes" placeholder="{{$objUser->numIdentificacion}}" value="{{$objUser->numIdentificacion}}" readonly="true">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Dirección de residencia</label>
                    <input type="text" class="form-control @error('dirResIcfes') is-invalid @enderror" value="{{old('dirResIcfes')}}" name="dirResIcfes" placeholder="Tu respuesta" required>
                    @error('dirResIcfes')
                    <small class="invalid-feedback">*{{$message}}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Nombre del colegio en que está estudiando o estudió</label>
                    <input type="text" class="form-control @error('nomColIcfes') is-invalid @enderror" value="{{old('nomColIcfes')}}" name="nomColIcfes" placeholder="Tu respuesta" required>
                    @error('nomColIcfes')
                    <small class="invalid-feedback">*{{$message}}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Departamento en que está ubicado el nombre del colegio</label>
                    <input type="text" class="form-control @error('departamentoIcfes') is-invalid @enderror" value="{{old('departamentoIcfes')}}" name="departamentoIcfes" placeholder="Tu respuesta" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 209) ||(event.charCode == 241))" required>
                    @error('departamentoIcfes')
                    <small class="invalid-feedback">*{{$message}}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Nombres y apellidos completos del acudiente</label>
                    <input type="text" class="form-control @error('nomAcuIcfes') is-invalid @enderror" value="{{old('nomAcuIcfes')}}" name="nomAcuIcfes" placeholder="Tu respuesta" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 209) ||(event.charCode == 241))" required>
                    @error('nomAcuIcfes')
                    <small class="invalid-feedback">*{{$message}}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Tipo de curso</label>
                    <input type="text" class="form-control" name="tipoCursoIcfes" placeholder="{{$objPreIcfes->tipo_curso}}" value="{{$objPreIcfes->tipo_curso}}" readonly="true">
                </div>

                <div class="mb-3">
                        <label class="form-label fw-bold">Horario</label>
                        <select class="form-select @error('horarioIcfes') is-invalid @enderror" name="horarioIcfes" value="{{old('horarioIcfes')}}" style="background-color: #ececec;" required>
                            <option selected disabled value="">Elige</option>
                            @foreach($objHorario as $key => $value)
                            <option value="{{ $key }}" {{ (collect(old('horarioIcfes'))->contains($key)) ? 'selected':'' }} />{{ $value }}</option>
                            @endforeach
                        </select>
                        @error('horarioIcfes')
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                    </div>

            </div>
        </div>

        <div class="row mt-2">
            <div class="col text-center">
                <p style="font-size:18px; color:#8F8E8E;">
                    EL RECIBO DE PAGO SE ENVIARÁ AL CORREO ELECTRÓNICO AL
                    CABO DE MÁXIMO 48 HORAS SIN CONTAR SÁBADOS, DOMINGOS Y
                    FESTIVOS.
                </p>
                <button type="submit" class="btn btn-primary" style="background-color:#04153B; border:none">Enviar formulario</button>
            </div>
        </div>
    </form>
    <!--Fin formulario inscripcion preicfes-->
</div>
@endsection