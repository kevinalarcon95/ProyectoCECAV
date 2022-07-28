@extends('layouts.app')

@section('content')

<div class="row justify-content-center" style="min-height: 100vh; width: 100%;">
    <div class="col-6 bg pt-5 align-text-bottom" style="background-color: #04153B; ">
        <div class="row mt-5 pt-5">
            <div class="col mt-5 pt-5" style="justify-content: center !important;align-items: center; display: flex;">
                <img src="{{ asset('img/logo.png') }}" alt="logoUnicauca" width="200" height="200" style="margin-top: -11%; opacity:0.8;">
            </div>
        </div>
        <div class="row mt-4 pt-4">
            <div class="col text-center mt-4 pt-4">
                <h4 class="m-0" style="font-family: 'Libre Bodoni', serif; color:#bfb2b2;">CECAV</h4>
                <p class="fw-bold" style="font-family: 'Montserrat', sans-serif; color:#bfb2b2">
                    <br> CENTRO DE EDUCACIÓN <br> CONTINUA, ABIERTA Y VIRTUAL
                </p>
            </div>
        </div>
    </div>
    <div class="col-6 px-4 justify-content-center" style="justify-content: center !important;align-items: center; background-color: white;">
        <h3 class="fw-bold text-center py-5 mt-4" style="color:#04153B;">Crear Cuenta</h3>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3 mx-5" style="padding-left: 15%; padding-right: 15%;">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ ($userNew->name) }}" required autocomplete="name" placeholder="{{ old($userNew->lastname) }}" autofocus style="background-color: #ececec;">

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-3 mx-5" style="padding-left: 15%; padding-right: 15%;">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="lastname" value="{{ ($userNew->lastname) }}" required autocomplete="name" placeholder="{{ old($userNew->lastname) }}" autofocus style="background-color: #ececec;" disabled>

                @error('lastname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-3 mx-5" style="padding-left: 15%; padding-right: 15%;">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ ($userNew->email) }}" required autocomplete="email" placeholder="{{ old($userNew->email) }}" style="background-color: #ececec;">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-3 mx-5" style="padding-left: 15%; padding-right: 15%;">
                <select class="form-select" name="tipoId" aria-label="Default select example" style="background-color: #ececec;">
                    <option selected>Tipo de identificación</option>
                    <option value="Cedula de ciudadania">Cedula de ciudadania</option>
                    <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                    <option value="Cedula de extranjeria">Cedula de extranjeria</option>
                </select>
                @error('tipoId')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-3 mx-5" style="padding-left: 15%; padding-right: 15%;">
                <input id="password" type="text" class="form-control @error('numId') is-invalid @enderror" name="numId" required autocomplete="" placeholder="Numero de identificación" style="background-color: #ececec;">

                @error('numId')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-3 mx-5" style="padding-left: 15%; padding-right: 15%;">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Contraseña" style="background-color: #ececec;">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-3 mx-5" style="padding-left: 15%; padding-right: 15%;">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar contraseña" style="background-color: #ececec;">
            </div>

            <div class="mb-4 mx-5 d-grid" style="padding-left: 15%; padding-right: 15%;">
                <button type="submit" class="btn btn-primary" style="color: white; background-color: #04153B; border: none;padding-left: 60px; padding-right: 60px;font-size: 12pt;">
                    {{ __('Crear cuenta') }}
                </button>

            </div>
        </form>
    </div>

</div>
<style>
    .bg {
        background: #04153B;
        background: linear-gradient(90deg, #291331, #04153B);
        ;
    }
</style>
@endsection