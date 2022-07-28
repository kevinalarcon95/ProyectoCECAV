<div class="row">
        @foreach($objInscripcionI as $objInscripcionI)
        <div class="row mb-3">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{$objInscripcionI->id}}">
                        <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$objInscripcionI->id}}" aria-expanded="true" aria-controls="collapseOne">
                            <div class="col-6" style="color: #800000;">
                                {{$objInscripcionI->nombre}}
                            </div>
                            <div class="col-5 text-end" style="color:#181D40;">
                                Inscrito el {{\Carbon\Carbon::parse($objInscripcionI->created_at, 'UTC')->translatedFormat('l d \d\e F \d\e\l Y')}}
                            </div>
                        </button>
                    </h2>
                    <div id="collapse{{$objInscripcionI->id}}" class="accordion-collapse collapse " aria-labelledby="heading{{$objInscripcionI->id}}">
                        <div class="accordion-body justify-content row">
                            <div class="col-2" style="text-align: center; display: flex; justify-content: center; align-items: center;"><img class="img-thumbnail img-fluid" id="imagenSeleccionada" src="@if(isset($objInscripcionI->imagen)){{ asset($objInscripcionI->imagen) }}@endif" width="150" alt=""></div>
                            <div class="col-10 my-2">
                                @if($objInscripcionI->costo == '0')
                                <div class="row mt-2">
                                    <p><strong>Costo o Inversión: Gratuito</strong></p>
                                </div>
                                @else
                                <div class="row mt-2">
                                    <p><strong>Costo o Inversión: {{$objInscripcionI->valor}} </strong></p>
                                </div>
                                @endif
                                <p><strong>Fecha inicio:</strong> {{\Carbon\Carbon::parse($objInscripcionI->fecha_inicio)->translatedFormat('l d \d\e F \d\e\l Y')}}</p>
                                <p><strong>Fecha fin:</strong> {{\Carbon\Carbon::parse($objInscripcionI->fecha_fin)->translatedFormat('l d \d\e F \d\e\l Y')}}</p>
                                <p><strong>Tipo de curso:</strong> {{$objInscripcionI->tipo_curso}}</p>
                                <p><strong>Población objetivo:</strong> {{$objInscripcionI->poblacion_objetivo}}</p>
                            </div>
                            <div class="row m-2" style="text-align: justify;">
                                <h4 style="color: #800000;">Presentación</h4>
                                <p class="text-justify mt-4" style="text-align: justify;">
                                    {{$objInscripcionI->descripcion}}
                                </p>
                            </div>
                            <div class="row mt-3">
                                <div class="col" style="text-align: right;">
                                    <a type="button" class=" btn btn-secondary btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$objInscripcionI->id}}">Eliminar Inscripción</a>
                                </div>
                            </div>
                            @include('cursosEstudiante.modalEliminarPreicfes')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>