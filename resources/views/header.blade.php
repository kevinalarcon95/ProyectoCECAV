<nav class="navbar sticky-top navbar-expand-sm navbar-dark bg-dark gradient-custom">
    <!-- Container wrapper -->
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ URL::to('/') }}">
            <div class="row">
                <div class="col-7">
                    <img src="{{ asset('img/logo.png') }}" alt="" width="55" height="50" class="d-inline-block align-text-top">
                </div>
                <div class="col-5 p-2 unicauca">
                    <div class="row fw-bold" style="margin-bottom: -15%">Universidad</div>
                    <div class="row fw-bold">del Cauca</div>
                </div>
            </div>
        </a>
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarRightAlignExample">
            <!-- Left links -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('/ofertasInscripciones') }}">OFERTA E INSCRIPCIONES</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">PREICFES</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="#">CERTIFICADOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">ACERCA DE CECAV</a>
                </li>
                <li>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto ">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('INGRESAR') }}</a>
                        </li>
                        @endif

                        @else
                        @role('admin')
                        <li class="nav-item dropdown">
                            <a id=" navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                ADMINISTRACIÓN
                            </a>
                            <div id="menuDropdown" class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{(route('/admin/listOferta'))}}">
                                    GESTION DE CURSOS
                                </a>

                                <a class="dropdown-item" href="#">
                                    GESTION DE DIPLOMADOS
                                </a>
                            </div>
                        </li>
                        @endrole

                        <li class="nav-item dropdown">
                            <a id=" navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div id="menuDropdown" class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">
                                    PERFIL
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('CERRAR SESIÓN') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>

                        @endguest
                    </ul>
                </li>
            </ul>
            <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->
    </div>
    <!-- Container wrapper -->
</nav>