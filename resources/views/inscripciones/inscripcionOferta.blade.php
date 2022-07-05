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
                <label class="form-label fw-bold">Seleccione el evento al cual se quiere inscribir</label>
                <select class="form-select" name="idOferta" style="background-color: #ececec;" value="{{$objOferta->id}}" required>
                    <option selected readonly="true" value="{{$objOferta->id}}">{{$objOferta->nombre}}</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" style="color: gray;">Por favor escribir los nombres completos en mayúsculas y sin tildes, esté requisito es fundamental para la expedición del recibo de pago.</label>
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
                    <select class="form-select" name="tipoIdentificacion" aria-label="Default select example" style="background-color: #ececec;" required>
                        <option selected readonly="true" value="{{old('tipoIdentificacion',$objUser->tipoId)}}">{{$objUser->tipoId}}</option>
                    </select>
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
                    <select class="form-select @error('tipoInscripcion') is-invalid @enderror" name="tipoInscripcion" aria-label="Default select example" style="background-color: #ececec;" required>
                        <option selected disabled>Elige</option>
                        <option value="Estudiante Pregrado">Estudiante Pregrado</option>
                        <option value="Estudiante posgrado">Estudiante posgrado</option>
                        <option value="Profesor Universitario">Profesor Universitario</option>
                        <option value="Profesional">Profesional</option>
                        <option value="Otro">Otro</option>
                    </select>
                    @error('tipoInscripcion')
                        <small class="invalid-feedback">*{{$message}}</small>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Si es estudiante de Unicauca, Por favor escriba su codigo</label>
                    <input type="text" class="form-control" name="codigoUser" placeholder="Tu respuesta (Opcional)">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Si es estudiante indicar el programa al cual pertenece</label>
                    <input type="text" class="form-control" name="programaUser" placeholder="Tu respuesta (Opcional)">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Si el recibo lo paga la entidad en la que trabaja, por favor escribir el NIT</label>
                    <input type="text" class="form-control" name="nitUser" placeholder="Tu respuesta (Opcional)">
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
                    <input type="text" class="form-control @error('telefonoUser') is-invalid @enderror" name="telefonoUser" placeholder="Tu respuesta">
                    @error('telefonoUser')
                    <small id="validationServer03Feedback" class="invalid-feedback">*{{$message}}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Tipo de vinculacion con Unicauca</label>
                    <select class="form-select @error('vinculacion') is-invalid @enderror" name="vinculacion" aria-label="Default select example" style="background-color: #ececec;">
                        <option selected disabled>Elige</option>
                        <option value="Estudiante (Pregrado o Posgrado)">Estudiante (Pregrado o Posgrado)</option>
                        <option value="Docente">Docente</option>
                        <option value="Administrativo">Administrativo</option>
                        <option value="Exalumno">Exalumno</option>
                        <option value="Particular">Particular</option>
                    </select>
                    @error('vinculacion')
                    <small id="validationServer03Feedback" class="invalid-feedback">*{{$message}}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Si es profesional, indicar su profesión y/o especialidad</label>
                    <input type="text" class="form-control" name="profesionUser" placeholder="Tu respuesta (Opcional)">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Entidad</label>
                    <h6 style="color: gray; font-size:14px;">Por favor informar a que Institución pertenece y el cargo
                        que ocupa</h6>
                    <input type="text" class="form-control" name="entidadUser" placeholder="Tu respuesta (Opcional)">
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