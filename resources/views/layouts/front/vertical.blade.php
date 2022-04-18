<!DOCTYPE html>
<html lang="Es-es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('titulo') | Sunpro Redes y Sistemas</title>
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
            $('#butonNewsleter').click(function(){
                grecaptcha.ready(function() {
                    grecaptcha.execute('6Ld84mQfAAAAAJKRPE3Ch6MrchF6DPJtm22Dq3WH',{
                        action: 'validarNewsleter'
                    }).then(function(token) {
                        $('#form-newsleter').prepend('<input type="hidden" name="token" value="' + token + '" >'); 
                        $('#form-newsleter').prepend('<input type="hidden" name="action" value="validarNewsleter" >');
                        $('#form-newsleter').submit();
                    });
                });
            })
        })

        $(document).ready(function(){
            $('#butonContactanos').click(function(){
                grecaptcha.ready(function() {
                    grecaptcha.execute('6Ld84mQfAAAAAJKRPE3Ch6MrchF6DPJtm22Dq3WH',{
                        action: 'validarContactanos'
                    }).then(function(token) {
                        $('#form-contactos').prepend('<input type="hidden" name="token" value="' + token + '" >'); 
                        $('#form-contactos').prepend('<input type="hidden" name="action" value="validarContactanos" >');
                        $('#form-contactos').submit();
                    });
                });
            })
        })
    </script>
    
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TT59N7D"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <section id="cabecera">
        @include('comun.front.cabecera')
        @include('comun.front.menu')
    </section>

    @include('flash::message')
    
    <section id="cuerpo">
        @yield('cuerpo')        
    </section>
    
    <section id="pie">
        @include('comun.front.footer')
        <div class="aviso-cookies" id="aviso-cookies">
            <img class="galleta" src="{{asset('images/cookie.svg')}}" alt="Galleta">
            <h3 class="titulo">Cookies</h3>
            <p class="parrafo">Utilizamos cookies propias y de terceros para mejorar nuestros servicios.</p>
            <button class="boton" id="btn-aceptar-cookies">De acuerdo</button>
            <a class="enlace" href="{{ route('cookies')}}" target="_black">Aviso de Cookies</a>
        </div>
        <div class="fondo-aviso-cookies" id="fondo-aviso-cookies"></div>
    
    </section>  

    <!--JS-->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/aviso-cookies.js') }}"></script>

    <script>
        $('div.alert').not('.alert-important').delay(4000).fadeOut(500);
    </script>

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>
