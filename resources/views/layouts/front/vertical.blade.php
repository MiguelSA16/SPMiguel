<!DOCTYPE html>
<html lang="Es-es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title> @yield('titulo') | Sunpro Redes y Sistemas</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">



    </head>
    <body>

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

        </section>


        <!--JS-->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>

        <script>
            $('div.alert').not('.alert-important').delay(4000).fadeOut(500);
        </script>

        <script>
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
        </script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </body>
</html>
