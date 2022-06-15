<!-- modal delete user -->
<div class="modal fade" id="exampleModal{{$varOferta->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        
            <?php $num = App\Http\Controllers\OfertaController::existeInscritos($varOferta->id) ?>
            <div class="modal-header" style="border: none;">
                <h5 class="modal-title" id="exampleModalLabel">
                    @if ($num == 0)
                    <i class="bi bi-trash3 me-1"></i>Eliminar Registro
                    @else
                    <i class="bi bi-x-lg me-1"></i> Error al eliminar el registro
                    @endif
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="text-align: center; font-size: 14pt;">



                @if ($num == 0)
                ¿Esta seguro de eliminar este registro?
                @else
                No se puede eliminar el resgistro, existen estudiantes inscritos.
                @endif
                <p id="nameOfer"></p>
                <input id="idOfer" type="hidden" value="">
            </div>
            <hr class="linea"/>
            <div class="modal-footer" style="border: none;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x me-1"></i>Cerrar</button>
                @if ($num == 0)
                <form action="{{url('/admin/deleteOferta/'.$varOferta->id)}}" method="post">
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
<!-- fin -->
<script>
    /*

    function launchModal(nameuser, idinver) {
        //seteamos el nombre del usuario a eliminar
        $('#nameOfer').text(nameuser);
        $('#idOfer').val(idinver);
        $('#exampleModal').modal('show');
    }

    function hidemodal() {
        $('#exampleModal').modal('hide');
    }

    function deleteOfert() {

        var idOfer = $('#idOfer').val();

        $.ajax({
            type: 'POST',
            url: '<?php #echo (route('/admin/deleteOferta')); 
                    ?>',
            data: {
                "_token": "{{ csrf_token() }}",
                "id": idOfer,
            },
            success: function(data) {
                if (data == 1) {
                    //agregar mensaje
                    location.reload(true);
                } else {
                    //agregar mensaje
                    location.reload(true);
                }
                //$("#msg").html(data.msg);
            }
        });
    }*/
</script>