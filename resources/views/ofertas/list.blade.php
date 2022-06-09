@extends('layouts.template')
@section('css')
    
@endsection
@section('content')
<div class="contenedor mt-5">
    <div class="row mx-3">
        <div class="col-sm-6" style="text-align: left;">
            <h2>Gestión de cursos</h2>
        </div>
        <div class="col-sm-6" style="text-align: right;">
            <a href="{{ route('/admin/createOferta') }}" class="btn btn-primary" style="color: white; ; border: none;border-radius: 20px; padding-left: 20px; padding-right: 20px;font-size: 12pt;">
                + Añadir
            </a>
        </div>
    </div>
    <hr />
    <div class="input-group md-form form-sm form-1 pl-0">
        <div class="input-group-prepend ">
            <h2>Buscador: </h2>
        </div>
        <input type="search" name="Buscar: " id="form1" class="form-control" placeholder="Buscar" aria-label="Search" style="text-align: right;border-radius: 20px; padding-left: 100px; padding-right: 20px;font-size: 12pt;" />
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover mt-5">
            <thead>
                <tr ALIGN=left>
                    <th scope="col" class="text-nowrap"> No.</th>
                    <th scope="col" class="text-nowrap"> Nombre <i class="bi bi-arrow-down-up"></i> </th>
                    <th scope="col" class="text-nowrap"> Imagen</th>
                    <th scope="col" class="text-nowrap"> Descripción</th>
                    <th scope="col" class="text-nowrap"> Población Objetivo</th>
                    <th scope="col" class="text-nowrap"> Categoría</th>
                    <th scope="col" class="text-nowrap"> Tipo Pago</th>
                    <th scope="col" class="text-nowrap"> Costo</th>
                    <th scope="col" class="text-nowrap"> Unidad Académica</th>
                    <th scope="col" class="text-nowrap"> Fecha Inicio</th>
                    <th scope="col" class="text-nowrap"> Fecha Fin</th>
                    <th scope="col" class="text-nowrap"> Resolución</th>
                    <th scope="col" class="text-nowrap"> Tipo Curso</th>
                    <th scope="col" class="text-nowrap"> Intensidad Horaria</th>
                    <th scope="col" class="text-nowrap"> Fecha Cierre Inscripción</th>
                    <th scope="col" class="text-nowrap"> Limite cupos</th>
                    <th scope="col" class="text-nowrap"> Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td class="text-nowrap">Diplomado en Rehabilitación Vestibular, Una Mirada desde</td>
                    <td class="text-nowrap">diplomadoVestibular.jpg</td>
                    <td class="text-nowrap">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        when an unknown printer took a galley of type and scrambled it to make a type specimen book.</td>
                    <td class="text-nowrap">Profesionales y estudiantes de últimos semestres</td>
                    <td class="text-nowrap">Diplomado</td>
                    <td class="text-nowrap">No pago</td>
                    <td class="text-nowrap">No aplica</td>
                    <td class="text-nowrap">Facultad de Ciencias de la Salud</td>
                    <td class="text-nowrap">08/05/2022</td>
                    <td class="text-nowrap">08/05/2022</td>
                    <td class="text-nowrap">VRA-0722</td>
                    <td class="text-nowrap">Presencial</td>
                    <td class="text-nowrap">80 H</td>
                    <td class="text-nowrap">08/05/2022</td>
                    <td class="text-nowrap">150</td>
                    <td>eliminar</td>
                </tr>
            </tbody>
        </table>
    </div>
    <hr />
</div>
<!-- modal delete user -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border: none;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="hidemodal();">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align: center; font-size: 14pt;">
        Esta seguro que desea eliminar la oferta
        <p id="nameOfer"></p>
        <input id="idOfer" type="hidden" value="">
      </div>
      <div class="modal-footer" style="border: none;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="hidemodal();">Cancelar</button>
        <button type="button" class="btn btn-danger" onclick="deleteOfert();">Eliminar</button>
      </div>
    </div>
  </div>
</div>
<!-- fin -->


<script>
    function launchModal(nameuser,idinver){
        //seteamos el nombre del usuario a eliminar
        $('#nameOfer').text(nameuser);
        $('#idOfer').val(idinver);
        $('#exampleModal').modal('show');
    }

    function hidemodal(){
        $('#exampleModal').modal('hide');
    }
    function deleteOfert(){

        var idOfer = $('#idOfer').val();

        $.ajax({
               type:'POST',
               url:'<?php echo(route('/admin/deleteOferta')); ?>',
               data:{"_token": "{{ csrf_token() }}",
                     "id":idOfer,
                    },
               success:function(data) {
                   if(data==1){
                       //agregar mensaje
                    location.reload(true);
                   }else{
                       //agregar mensaje
                    location.reload(true);
                   }
                  //$("#msg").html(data.msg);
               }
            });
    }



</script>
@endsection