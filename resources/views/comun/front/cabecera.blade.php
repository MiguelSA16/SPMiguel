<div class="container-fluid borde-inferior bg-white ">
    <div class="container">
        <ul class="nav nav-pills nav-fill ">
            <li class="nav-item mr-auto d-none d-sm-block ">
                <a class="nav-link disabled">
                    <i class="fas fa-phone"></i> +34 915 00 79 63
                </a>
            </li>

            <li class="nav-item d-none d-sm-block">
                <a class="nav-link disabled">
                    <i class="fas fa-envelope"></i> comercial@sunprored.es
                </a>
            </li>

            <li class="nav-item d-none d-sm-block">
                <a class="redes-sociales" href="#">
                    <i class="fab fa-linkedin"></i>
                </a>

                <a class="redes-sociales" href="#">
                    <i class="fab fa-youtube"></i>
                </a>

                <a class="redes-sociales" href="#">
                    <i class="fab fa-instagram"></i>
                </a>

                <a class="redes-sociales" href="#">
                    <i class="fab fa-facebook-square"></i>
                </a>
            </li>
        @if (Route::has('login'))
        @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                    aria-haspopup="true" aria-expanded="false">
                    Hola, <b>{{ Auth::user()->name }}</b>
                    <img class="img-profile rounded-circle" src="{{ asset('images/profile.jpg') }}" style="width: 30px;">
                    <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in  mt-1"
                    aria-labelledby="userDropdown">
                    <!-- solo se ve cuando tienes rol cliente  rol 1 => Admin-->
                    @if (Auth::user()->role_id == 1)
                        <a class="dropdown-item" href="{{ route('admin.articulos-alta') }}" target="_black">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            {{ __('Settings') }}
                        </a>
                        <!-- rol 3 => Cliente -->
                    @elseif (Auth::user()->role_id == 3 && Auth::user()->cliente_id != 0)
                        <a class="dropdown-item" href="cliente/incidencias" target="_black">
                            <i class="fas fa-user-cog mr-2"></i>
                            Area de cliente
                        </a>
                    @endif
                    <!-- rol 5 => Operario -->
                    @if (Auth::user()->role_id == 5)
                        <a class="dropdown-item" href="operario/incidencias" target="_black">
                            <i class="fas fa-user-cog mr-2"></i>
                            Incidencias
                        </a>
                    @endif

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @else
            <li class="nav-item ">
                <a href="{{ route('login') }}" class="nav-link  text-decoration-none">
                    <i class="fas fa-fingerprint"></i>
                    {{ __('Login') }}
                </a>
            </li>

            <li class="nav-item ">
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="nav-link text-decoration-none">
                        <i class="fas fa-user-plus"></i>
                        {{ __('Register') }}
                    </a>
                @endif
            </li>
        @endauth
        </ul>
    </div>

    @endif





    </ul>

</div>

</div>
