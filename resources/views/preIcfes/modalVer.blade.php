<div class="modal fade" id="exampleModalVer{{$varPreicfes->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Más detalles</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mx-3">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Fecha inicio de inscripciones</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varPreicfes->fecha_inicio_inscripcion}}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Fecha fin de inscripciones</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varPreicfes->fecha_fin_inscripcion}}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Horario</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varPreicfes->horario}}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Duración</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varPreicfes->duracion}}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Tipo de curso</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varPreicfes->tipo_curso}}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Valor</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varPreicfes->valor}}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Población objetivo</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varPreicfes->poblacion_objetivo}}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Pasos para inscribirse</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varPreicfes->pasos_inscripcion}}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Estructura del curso</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varPreicfes->estructura}}">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>