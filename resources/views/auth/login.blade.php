@extends('layouts.app')

@section('content')

<div class="row justify-content-center" style="min-height: 100vh; width: 100%;">
    <div class="col-6 px-4 justify-content-center" style="justify-content: center !important;align-items: center; background-color: white;">
        <h3 class="fw-bold text-center py-5 mt-5" style="color:#04153B;">INICIO DE SESIÓN</h3>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4 mx-5" style="padding-left: 15%; padding-right: 15%;">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Usuario o correo electronico" required autocomplete="email" autofocus style="background-color: #ececec;">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-4 mx-5" style="padding-left: 15%; padding-right: 15%;">
                <div class="col-md-12">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" style="background-color: #ececec;">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="mb-4 mx-5 d-grid btnEntrar" style="padding-left: 15%; padding-right: 15%;">
                <button type="submit" class="btn btn-primary" style="color: white; background-color: #04153B; border: none;padding-left: 60px; padding-right: 60px;font-size: 12pt;">
                    {{ __('Entrar') }}
                </button>

                <!--@if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif-->
            </div>

            <div class="mb-4 mx-5 d-grid btnGoogle" style="padding-left: 15%; padding-right: 15%;">
                <button type="submit" class="btn btn-outline-light" style="color:#04153B;border-color: black; padding-left: 60px; padding-right: 60px;font-size: 12pt;">
                    <div class="row align-item-center">
                        <div class="col-2 text-end">
                        <img src="{{ asset('img/iconGoogle.png') }}" alt="" width="20" height="20" class="d-inline-block align-text-top">
                        </div>
                        <div class="col-10">
                         Continuar con Google
                        </div>
                    </div>

                </button>
            </div>

           <!-- <div class="mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember" style="color: #cfcfcf;">
                        {{ __('Mantenerme conectado') }}
                    </label>
                </div>
            </div>-->

            <div class="mb-1 text-center">
                <div class="col-md-12">
                    ¿No tienes una cuenta?
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" style="color:#04153B;">
                        {{ __('Registrate') }}
                    </a>
                    @endif
                </div>
            </div>

            <div class="mb-4 text-center">
                <div class="col-md-12">
                    ¿Olvidaste tú contraseña?
                    @if (Route::has('password.request'))
                    <a class="" href="{{ route('password.request') }}" style="color:#04153B;">
                        {{ __('Click Aquí') }}
                    </a>
                    @endif
                </div>
            </div>
        </form>
    </div>
    
    <div class="col-6 text-white bg" style="justify-content: center !important;align-items: center; display: flex; flex-wrap: wrap; background-color: #04153B;">
        <div class="row mt-5">
            <img src="{{ asset('img/logo.png') }}" alt="logoUnicauca" width="180" height="180" style="margin-top: -11%; opacity:0.8;">
        </div>
        <div class="row text-center mx-5">
            <h4 class="" style="font-family: 'Libre Bodoni', serif; opacity: 0.8; line-height: 5%">CECAV</h4>
            <p class="fw-bold" style="font-family: 'Montserrat', sans-serif; opacity: 0.8;">CENTRO DE EDUCACIÓN <br> CONTINUA, ABIERTA Y VIRTUAL</p>
        </div>
    </div>
</div>


<style>
    .bg {
        background: #04153B;
        background: linear-gradient(60deg, #291331, #04153B);
        ;
    }
</style>
<!-- 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->
@endsection