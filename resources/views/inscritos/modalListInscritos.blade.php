<div class="modal face" tabindex="-1" id="miModal">
  <div class="modal-dialog bg-success">
    <div class="modal-content">
      <div class="modal-header bg-success" >
        <h5 class="modal-title bg-success">Exportar registros</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>¿Está seguro que desea exportar los registros desde fehaInicio hasta fechafin?.</p>
      </div>
      <div class="modal-footer">
        <form action="{{url('/admin/expexcel')}}" method="get" enctype="multipart/form-data">          
            <button class="btn btn-success">Aceptar</button>                   
        </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>        
      </div>
    </div>
  </div>
</div>