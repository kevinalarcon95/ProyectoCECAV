@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-6">
        <h3 class="fw-bold text-center py-5 mt-5" style="color:#04153B;">INICIO DE SESIÓN</h3>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4 mx-5">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Usuario o correo electronico" required autocomplete="email" autofocus style="background-color: #ececec;border-radius: 20px;border: none;">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-4 mx-5">
                <div class="col-md-12">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" style="background-color: #ececec;border-radius: 20px;border: none;">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="mb-4 mx-5 d-grid">
                <button type="submit" class="btn btn-primary" style="color: white; background-color: #04153B; border: none;border-radius: 20px; padding-left: 60px; padding-right: 60px;font-size: 14pt;">
                    {{ __('Entrar') }}
                </button>

                <!--@if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif-->
            </div>

            <div class="mb-4 mx-5">
                <button class="btn btn-outline-primary w-100" style="border-radius: 20px; padding-left: 60px; padding-right: 60px;font-size: 14pt;">
                    <div class="row align-item-center">
                        <div class="col-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                                <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                            </svg>
                        </div>
                        <div class="col-10">
                            Continuar con Google
                        </div>
                    </div>

                </button>
            </div>

            <div class="mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember" style="color: #cfcfcf;">
                        {{ __('Mantenerme conectado') }}
                    </label>
                </div>
            </div>

            <div class="mb-4 text-center">
                <div class="col-md-12">
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" style="color:#04153B;">
                        {{ __('¿No tienes una cuenta? Registrate') }}
                    </a>
                    @endif
                </div>
            </div>

            <div class="mb-4 text-center">
                <div class="col-md-12">
                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tú contraseña?') }}
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