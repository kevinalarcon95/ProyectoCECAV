@extends('layouts.template')

@section('content')

<!--Formulario inscripcion preicfes-->

<div class="container">
    <div class="row text-center mt-5 mb-3">
        <h2 class="fw-bold">FORMULARIO DE INSCRIPCIÓN FUNCIONARIOS</h2>
    </div>
    <form action="#" method="POST" class="needs-validation" novalidate>
        @csrf

        <div class="row">
            <div class="col-6">

                <div class="mb-3">
                    <label class="form-label fw-bold">Nombre completo</label>
                    <input type="text" class="form-control @error('nombreFunc') is-invalid @enderror" value="{{old('nombreFunc')}}" name="nombreFunc" placeholder="Tu respuesta" required>
                    @error('nombreFunc')
                    <small class="invalid-feedback">*{{$message}}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Cargo</label>
                    <input type="text" class="form-control @error('cargoFunc') is-invalid @enderror" value="{{old('cargoFunc')}}" name="cargoFunc" placeholder="Tu respuesta" required>
                    @error('cargoFunc')
                    <small class="invalid-feedback">*{{$message}}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Teléfono</label>
                    <input type="text" class="form-control @error('telefonoFunc') is-invalid @enderror" value="{{old('telefonoFunc')}}" name="telefonoFunc" placeholder="Tu respuesta" required>
                    @error('telefonoFunc')
                    <small class="invalid-feedback">*{{$message}}</small>
                    @enderror
                </div>

            </div>
            <div class="col-6">

                <div class="mb-3">
                    <label class="form-label fw-bold">Número de extensión</label>
                    <input type="text" class="form-control @error('extensionFunc') is-invalid @enderror" value="{{old('extensionFunc')}}" name="extensionFunc" placeholder="Tu respuesta" required>
                    @error('extensionFunc')
                    <small class="invalid-feedback">*{{$message}}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Correo</label>
                    <input type="text" class="form-control @error('correoFunc') is-invalid @enderror" value="{{old('correoFunc')}}" name="correoFunc" placeholder="Tu respuesta" required>
                    @error('correoFunc')
                    <small class="invalid-feedback">*{{$message}}</small>
                    @enderror
                </div>

            </div>
        </div>

    </form>
    <!--Fin formulario inscripcion preicfes-->
</div>
@endsection