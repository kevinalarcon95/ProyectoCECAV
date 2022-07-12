<!-- modal delete user -->
<div class="modal fade" id="exampleModal{{$objInscripcion->id}}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        
            <?php $num = App\Http\Controllers\EstudianteOfertaController::existeInscripcion($objInscripcion->id) ?>
            <div class="modal-header" style="border: none;">
                <h5 class="modal-title" id="exampleModalLabel">
                    @if ($num != 0)
                    <i class="bi bi-trash3 me-1"></i>Eliminar inscripción
                    @endif
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body my-4" style="text-align: center; font-size: 14pt;">
                @if ($num != 0)
                ¿Esta seguro de eliminar esta inscripción?
                @endif
            </div>
            <hr class="linea"/>
            <div class="modal-footer" style="border: none;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x me-1"></i>Cerrar</button>
                @if ($num != 0)
                <form action="{{url('/eliminarInscripcionOferta')}}/{{$objInscripcion->id}}" method="POST">
                    @csrf
                    {{method_field('DELETE')}}
                    <button type="submit" class="btn btn-eliminar"><i class="bi bi-trash3 me-1"></i>Eliminar</button>
                </form>
                @else
                <button type="button" class="btn btn-eliminar" data-bs-dismiss="modal"><i class="bi bi-check me-1"></i>Aceptar</button>
                @endif
            </div>
            
        </div>
    </div>
</div>