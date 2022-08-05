<div class="modal fade" id="exampleModalVer{{$varInscrito->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Más detalles</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mx-3">
                <div class="mb-3 mx-2">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Nombre</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varInscrito->nombreEstudiante}}" disabled>
                </div>
                <div class="mb-3 mx-2">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Apellido</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varInscrito->apellido}}" disabled>
                </div>
                <div class="mb-3 mx-2">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Tipo de identificación</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varInscrito->tipo_identificacion}}" disabled>
                </div>
                <div class="mb-3 mx-2">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Identificación</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varInscrito->identificacion}}" disabled>
                </div>
                <div class="mb-3 mx-2">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Dirección de residencia</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varInscrito->direccion_residencia}}" disabled>
                </div>
                <div class="mb-3 mx-2">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Teléfono</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varInscrito->telefono}}" disabled>
                </div>
                <div class="mb-3 mx-2">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Tipo inscripción</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varInscrito->tipo_inscripcion}}" disabled>
                </div>
                <div class="mb-3 mx-2">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Tipo de vinculación</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varInscrito->tipo_vinculacion}}" disabled>
                </div>
                <div class="mb-3 mx-2">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Código universitario</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varInscrito->codigo_universitario}}" disabled>
                </div>
                <div class="mb-3 mx-2">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Profesión</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varInscrito->profesion}}" disabled>
                </div>
                <div class="mb-3 mx-2">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Programa</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varInscrito->programa}}" disabled>
                </div>
                <div class="mb-3 mx-2">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Entidad</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varInscrito->entidad}}" disabled>
                </div>
                <div class="mb-3 mx-2">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">NIT Entidad</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varInscrito->nit_entidad}}" disabled>
                </div>
                <div class="mb-3 mx-2">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Fecha de creación</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{\Carbon\Carbon::parse($varInscrito->created_at)->format('Y-m-d')}}" disabled>
                </div>
                <div class="mb-3 mx-2">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Referencia de pago</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varInscrito->referencia}}" disabled>
                </div>
                <div class="mb-3 mx-2">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Estado</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varInscrito->estado}}" disabled>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>