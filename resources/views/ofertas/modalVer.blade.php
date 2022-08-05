<div class="modal fade" id="exampleModalVer{{$varOferta->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Más detalles</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mx-3">
                <div class="mb-3 mx-2">
                    <label for="exampleFormControlTextarea1" class="form-label fw-bold">Descripción</label>
                    {!!$varOferta->descripcion!!}
                </div>
                <div class="mb-3 mx-2">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Población objetivo</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varOferta->poblacion_objetivo}}" disabled>
                </div>
                <div class="mb-3 mx-2">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Categoría</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varOferta->nombreCategoria}}" disabled>
                </div>
                <div class="mb-3 mx-2">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Tipo de pago</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varOferta->tipo_pago}}" disabled>
                </div>
                <div class="mb-3 mx-2">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Costo</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varOferta->costo}}" disabled>
                </div>
                <div class="mb-3 mx-2">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Unidad académica</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varOferta->unidad_academica}}" disabled>
                </div>
                <div class="mb-3 mx-2">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Tipo de curso</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varOferta->tipo_curso}}" disabled>
                </div>
                <div class="mb-3 mx-2">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Intensidad horaria</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varOferta->intensidad_horario}}" disabled>
                </div>
                <div class="mb-3 mx-2">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Resolución</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varOferta->resolucion}}" disabled>
                </div>
                <div class="mb-3 mx-2">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Límite de cupos</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varOferta->limite_cupos}}" disabled>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>