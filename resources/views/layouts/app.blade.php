<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-TT59N7D');</script>
        <!-- End Google Tag Manager -->
    
        <!-- Google Recaptcha V3-->
        <script src="https://www.google.com/recaptcha/api.js?render=6Ld84mQfAAAAAJKRPE3Ch6MrchF6DPJtm22Dq3WH"></script>
    <script>
        $(document).ready(function(){
            $('#butonRegistro').click(function(){
                grecaptcha.ready(function() {
                    grecaptcha.execute('6Ld84mQfAAAAAJKRPE3Ch6MrchF6DPJtm22Dq3WH',{
                        action: 'validarRegistro'
                    }).then(function(token) {
                        $('#form-registro').prepend('<input type="hidden" name="token" value="' + token + '" >'); 
                        $('#form-registro').prepend('<input type="hidden" name="action" value="validarRegistro" >');
                        $('#form-registro').submit();
                    });
                });
            })
        })
    </script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" class=" titulo">                 
                    <img src="{{asset('images/favicon.png')}}" alt="Sunpro Redes y Sistemas" class="favicon">
                    Sunpro Redes y Sistemas
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">     
                    <ul class=" nav ml-auto">
                        @if (Route::has('login'))
                            @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    Hola, {{ Auth::user()->name }} <span class="caret"></span>
                                </a>  
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">                                
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="{{route('admin.articulos-alta')}}" target="_black" >
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        {{ __('Settings') }}
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link  text-decoration-none">
                                    <i class="fas fa-fingerprint"></i> 
                                    {{ __('Login') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="nav-link text-decoration-none">
                                    <i class="fas fa-user-plus"></i>
                                    {{ __('Register') }}
                                </a>
                                @endif
                            </li>          
                            @endauth
                        </div>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class=" container pt-4">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('flash::message')
                </div>
            </div>
        </div>
        
        <main class="pb-4 pt-2">            
            @yield('content')
        </main>
    </div>
    <!--JS-->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>


