@extends('layouts.template')

@section('content')

<div class="conteiner m-5">
    <div class="row">
        <form action="{{route('/admin/createOferta')}}" method="POST">
            @csrf
            <div class="row mx-3">
                <div class="col-sm-1 mr-0" style="text-align: left;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="#4285F4" class="bi bi-plus-circle-fill " viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                    </svg>
                </div>
                <div class="col-sm-11" style="text-align: left; color: #3E4C60">
                    <h5>Añadir registro</h5>
                </div>
            </div>
            <hr />
            <div class="row m-3 pt-3">
                <div class="col">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Nombre (Diplomado, curso, charla, etc)</label>
                        <input type="text" class="form-control" name="nombreOferta" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tu respuesta" style="background-color: #ececec;">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label fw-bold">Descripcion</label>
                        <textarea type="text" name="descripcionOferta" class="form-control" id="exampleInputPassword1" placeholder="Tu respuesta" style="background-color: #ececec;"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Tipo de pago</label>
                        <select class="form-select" name="tipoPagoOferta" aria-label="Default select example" style="background-color: #ececec;">
                            <option selected>Elige</option>
                            <option>Pago</option>
                            <option>No pago</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Unidad académica</label>
                        <input type="text" class="form-control" name="unidadAcademicaOferta" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tu respuesta" style="background-color: #ececec;">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"><strong>Fecha inicio</strong></label>
                        <?php
                        $date = date('Y-m-d');
                        ?>
                        <input type="date" class="form-control" name="fechaInicioOferta" id="exampleInputEmail1" style="background-color: #ececec;">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Resolución</label>
                        <input type="text" class="form-control" name="resolucionOferta" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tu respuesta" style="background-color: #ececec;">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Intensidad horaria</label>
                        <input type="text" class="form-control" name="nombreOferta" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tu respuesta" style="background-color: #ececec;">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Limite de cupos</label>
                        <input type="text" class="form-control" name="nombreOferta" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tu respuesta" style="background-color: #ececec;">
                    </div>

                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="formFile" class="form-label fw-bold">Seleccione una imagen</label>
                        <input class="form-control" type="file" name="imagenOferta" id="formFile" style="background-color: #ececec;">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Población objetivo</label>
                        <input type="text" class="form-control" name="poblacionOferta" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tu respuesta" style="background-color: #ececec;">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Categoria</label>
                        <select class="form-select" name="categoriaOferta" aria-label="Default select example" style="background-color: #ececec;">
                            <option selected>Elige</option>
                            <option>Pago</option>
                            <option>No pago</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label fw-bold">Costo o inversión</label>
                        <textarea type="text" name="costoOferta" class="form-control" id="exampleInputPassword1" placeholder="Valor de inversión" style="background-color: #ececec;"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"><strong>Fecha fin</strong></label>
                        <?php
                        $date = date('Y-m-d');
                        ?>
                        <input type="date" class="form-control" name="fechaFinOferta" id="exampleInputEmail1" style="background-color: #ececec;">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Tipo de curso</label>
                        <select class="form-select" name="tipoCursoOferta" aria-label="Default select example" style="background-color: #ececec;">
                            <option selected>Elige</option>
                            <option>Virtual</option>
                            <option>Presencial</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"><strong>Fecha cierre de inscripciones</strong></label>
                        <?php
                        $date = date('Y-m-d');
                        ?>
                        <input type="date" class="form-control" name="fechaCierreOferta" id="exampleInputEmail1" style="background-color: #ececec;">
                    </div>
                </div>

            </div>
            <hr />
            <div class="row">
                <div class="col" style="text-align: right;">
                    <button type="submit" class="btn btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                        </svg> Cancelar</button>
                    <button type="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-down-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M9.636 2.5a.5.5 0 0 0-.5-.5H2.5A1.5 1.5 0 0 0 1 3.5v10A1.5 1.5 0 0 0 2.5 15h10a1.5 1.5 0 0 0 1.5-1.5V6.864a.5.5 0 0 0-1 0V13.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z" />
                            <path fill-rule="evenodd" d="M5 10.5a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 0-1H6.707l8.147-8.146a.5.5 0 0 0-.708-.708L6 9.293V5.5a.5.5 0 0 0-1 0v5z" />
                        </svg> Guardar</button>
                </div>
            </div>
        </form>
    </div>
    <!--<div class="row">
        
        <div class="col bg-success">
            <div class="card my-5" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card my-5" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>-->
</div>
@endsection