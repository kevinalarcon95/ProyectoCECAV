<div class="modal fade" id="exampleModalVer{{$varInscrito->id_icfes}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Más detalles</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mx-3">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Dirección de residencia</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varInscrito->direccion_residencia}}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Teléfono</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varInscrito->telefono}}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Correo</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varInscrito->correo}}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Colegio</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varInscrito->colegio}}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Departamento colegio</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varInscrito->departamento_colegio}}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Municipio colegio</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varInscrito->municipio_colegio}}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Nombre acudiente</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varInscrito->nombre_apellido_acudiente}}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Correo acudiente</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varInscrito->correo_acudiente}}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Tipo de curso</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varInscrito->tipo_curso}}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Pregrado</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varInscrito->pregrado}}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Horario</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varInscrito->horario}}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Fecha de la inscripción</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{\Carbon\Carbon::parse($varInscrito->created_at)->format('Y-m-d')}}">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>