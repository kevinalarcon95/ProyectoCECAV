@extends('layouts.template')

@section('content')

<!--Formulario inscripcion preicfes-->

<div class="container m-5">
    <div class="row mx-3 ">

        <div class="col-sm-11 botones me-2" style=" color: #3E4C60">
            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="#4285F4" class="bi bi-plus-circle-fill " viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
            </svg>
            <h5 class="titulo">Añadir funcionario</h5>
        </div>

    </div>
    <form action="{{route('/admin/saveFuncionario')}}" method="POST" class="needs-validation" novalidate>
        @csrf
        <hr />
        <div class="row">
            <div class="col-6">

            
                <div class="mb-3">
                    <label class="form-label fw-bold">Nombre completo</label>
                    <input type="text" class="form-control @error('nombreFunc') is-invalid @enderror" value="{{old('nombreFunc')}}" name="nombreFunc" placeholder="Tu respuesta" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32)|| (event.charCode == 209) ||(event.charCode == 241))" required>
                    @error('nombreFunc')
                    <small class="invalid-feedback">*{{$message}}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Cargo</label>
                    <input type="text" class="form-control @error('cargoFunc') is-invalid @enderror" value="{{old('cargoFunc')}}" name="cargoFunc" placeholder="Tu respuesta" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32)|| (event.charCode == 209) ||(event.charCode == 241))" required>
                    @error('cargoFunc')
                    <small class="invalid-feedback">*{{$message}}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Teléfono</label>
                    <input type="number" class="form-control @error('telefonoFunc') is-invalid @enderror" value="{{old('telefonoFunc')}}" name="telefonoFunc" placeholder="Tu respuesta" required>
                    @error('telefonoFunc')
                    <small class="invalid-feedback">*{{$message}}</small>
                    @enderror
                </div>

            </div>
            <div class="col-6">

                <div class="mb-3">
                    <label class="form-label fw-bold">Número de extensión</label>
                    <input type="number" class="form-control @error('extensionFunc') is-invalid @enderror" value="{{old('extensionFunc')}}" name="extensionFunc" placeholder="Tu respuesta" required>
                    @error('extensionFunc')
                    <small class="invalid-feedback">*{{$message}}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Correo</label>
                    <input type="email" class="form-control @error('correoFunc') is-invalid @enderror" value="{{old('correoFunc')}}" name="correoFunc" placeholder="Tu respuesta" onkeypress="return ((event.charCode != 209) && (event.charCode != 241))" required >
                    @error('correoFunc')
                    <small class="invalid-feedback">*{{$message}}</small>
                    @enderror
                </div>

            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col" style="text-align: right;">
                <a type="button" class="btn btn-secondary" href="{{url('/admin/listFuncionario') }}"><i class="bi bi-x"></i> Cancelar</a>
                <button type="submit" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Guardar</button>
            </div>
        </div>
    </form>
    <!--Fin formulario inscripcion preicfes-->
</div>
@endsection