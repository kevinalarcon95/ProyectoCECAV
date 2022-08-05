@extends('layouts.template')
@section('content')
<!--Formulario inscripcion oferta-->

<div class="container">
    <div class="row mb-4">
        <div class="row text-center mt-5 mb-3">
            <h3 class="fw-bold">FORMULARIO DE INSCRIPCIÓN EN LINEA</h3>
        </div>
    </div>
    <form action="{{route('/saveInscripcion')}}" method="POST" class="row g-3 needs-validation" novalidate>
        @csrf
        <div class="row">
        <div class="mb-3">
                <label class="form-label fw-bold">Evento al cual se quiere inscribir</label>
                <select class="form-select" name="idOferta" style="background-color: #ececec;" value="{{$objOferta->id}}" required>
                    <option selected readonly="true" value="{{$objOferta->id}}">{{$objOferta->nombre}}</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label class="form-label fw-bold">Nombre</label>
                    <input type="text" class="form-control" name="nombreUser" placeholder="{{$objUser->name}}" value="{{old('nombreUser',$objUser->name)}}" readonly="true">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Tipo de identificación</label>
                    <input type="text" class="form-control" name="tipoIdentificacion" placeholder="{{old('tipoIdentificacion',$objUser->tipoId)}}" value="{{old('tipoIdentificacion',$objUser->tipoId)}}" readonly="true">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Dirección de residencia (Incluir Ciudad)</label>
                    <input type="text" class="form-control @error('direccionUser') is-invalid @enderror" name="direccionUser" placeholder="Tu respuesta" value="{{ old('direccionUser')}}">
                    @error('direccionUser')
                    <small id="validationServer03Feedback" class="invalid-feedback">*{{$message}}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Tipo de inscripción</label>
                    <select class="form-select @error('tipoInscripcion') is-invalid @enderror" name="tipoInscripcion" aria-label="Default select example" value="{{ old('tipoInscripcion')}}" style="background-color: #ececec;" required>
                        <option selected disabled value="{{ old('tipoInscripcion')}}">Elige</option>
                        <option value="Estudiante-Pregrado" @if(old('tipoInscripcion')== 'Estudiante-Pregrado' ) selected @endif>Estudiante-Pregrado</option>
                        <option value="Estudiante-Posgrado" @if(old('tipoInscripcion')== 'Estudiante-Posgrado' ) selected @endif>Estudiante-Posgrado</option>
                        <option value="Profesor-Universitario" @if(old('tipoInscripcion')== 'Profesor-Universitario' ) selected @endif>Profesor-Universitario</option>
                        <option value="Profesional" @if(old('tipoInscripcion')== 'Profesional' ) selected @endif>Profesional</option>
                        <option value="Otro" @if(old('tipoInscripcion')== 'Otro' ) selected @endif>Otro</option>
                    </select>
                    @error('tipoInscripcion')
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Si es estudiante de Unicauca, Por favor escriba su codigo</label>
                    <input type="number" class="form-control" name="codigoUser" placeholder="Tu respuesta (Opcional)" value="{{old('codigoUser')}} ">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Si es estudiante indicar el programa al cual pertenece</label>
                    <input type="text" class="form-control" name="programaUser" placeholder="Tu respuesta (Opcional)" value="{{old('programaUser')}}" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32)|| (event.charCode == 209) ||(event.charCode == 241))">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Si el recibo lo paga la entidad en la que trabaja, por favor escribir el NIT</label>
                    <input type="text" class="form-control" name="nitUser" placeholder="Tu respuesta (Opcional)" value="{{old('nitUser')}}">
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label class="form-label fw-bold">Apellido</label>
                    <input type="text" class="form-control" name="apellidoUser" placeholder="{{$objUser->lastname}}" value="{{old('apellidoUser',$objUser->lastname)}}" readonly="true">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Número de identificación</label>
                    <input type="text" class="form-control" name="numeroIdentificacion" placeholder="{{$objUser->numIdentificacion}}" value="{{old('numeroIdentificacion',$objUser->numIdentificacion)}}" readonly="true">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Teléfono o número de celular</label>
                    <input type="number" class="form-control @error('telefonoUser') is-invalid @enderror" name="telefonoUser" placeholder="Tu respuesta" value="{{old('telefonoUser')}}">
                    @error('telefonoUser')
                    <small id="validationServer03Feedback" class="invalid-feedback">*{{$message}}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Tipo de vinculacion con Unicauca</label>
                    <select class="form-select @error('vinculacion') is-invalid @enderror" name="vinculacion" aria-label="Default select example" value="{{ old('vinculacion')}}" style="background-color: #ececec;">
                        <option selected disabled value="{{ old('vinculacion')}}">Elige</option>
                        <option value="Estudiante(Pregrado/Posgrado)" @if(old('vinculacion') == 'Estudiante(Pregrado/Posgrado)' ) selected @endif>Estudiante(Pregrado/Posgrado)</option>
                        <option value="Docente" @if(old('vinculacion')== 'Docente' ) selected @endif>Docente</option>
                        <option value="Administrativo" @if(old('vinculacion')== 'Administrativo' ) selected @endif>Administrativo</option>
                        <option value="Exalumno" @if(old('vinculacion')== 'Exalumno' ) selected @endif>Exalumno</option>
                        <option value="Particular" @if(old('vinculacion')== 'Particular' ) selected @endif>Particular</option>
                    </select>
                    @error('vinculacion')
                    <small id="validationServer03Feedback" class="invalid-feedback">*{{$message}}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Si es profesional, indicar su profesión y/o especialidad</label>
                    <input type="text" class="form-control" name="profesionUser" placeholder="Tu respuesta (Opcional)" value="{{old('profesionUser')}}" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 209) ||(event.charCode == 241))">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Entidad</label>
                    <h6 style="color: gray; font-size:14px;">Por favor informar a que Institución pertenece y el cargo que ocupa</h6>
                    <input type="text" class="form-control" name="entidadUser" placeholder="Tu respuesta (Opcional)" value="{{old('entidadUser')}}" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32)|| (event.charCode == 209) ||(event.charCode == 241))">
                </div>

            </div>
        </div>
        <div class="row text-center mt-3">
            <div class="mb-3">
                <label class="form-label fw-bold" style="color: #0B1439">¡ GRACIAS POR PARTICIPAR !</label>
                <h6 style="color: gray; font-size:14px;">EL RECIBO DE PAGO SE ENVIARÁ A SU CORREO ELECTRÓNICO, A MAS TARDAR DURANTE LAS 48 HORAS SIGUIENTES A SU INSCRIPCIÓN (DÍAS HÁBILES).</h6>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary" style="background: #0B1439; width: 50%;">Enviar formulario</button>
            </div>
        </div>
    </form>
</div>
@endsection