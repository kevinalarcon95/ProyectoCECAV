<div class="modal fade" id="exampleModalVer{{$varOferta->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Descripción</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mx-3">
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label fw-bold">Descripción</label>
                    {!!$varOferta->descripcion!!}
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Población objetivo</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varOferta->poblacion_objetivo}}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Categoría</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varOferta->nombreCategoria}}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Tipo de pago</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varOferta->tipo_pago}}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Costo</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{$varOferta->costo}}">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>