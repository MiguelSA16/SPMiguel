<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>       

        <link rel="stylesheet" href="{{ asset('css/admin.css') }}">  
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">         

    </head>

    <body id="page-top" class="sidebar-toggled">

        <div id="app">  
            <div id="wrapper">

                <section id="menu-lateral" class=" bg-gradient-dark">
                    @include('front.componentes.menu-lateral')
                </section>

                <div id="content-wrapper" class="d-flex flex-column">
                    <div id="content">                        
                        <section id="menu-superior">
                            @include('front.componentes.cabecera')
                        </section>   

                        <section id="cuerpo">    
                            <div class="container-fluid">
                                @yield('cuerpo')
                            </div>
                        </section>
                    </div>
                    <section id="footer">                      

                    </section>           

                </div>
            </div>
        </div>



       



        <!--JS-->            

        <script src="{{ asset('js/app.js') }}"></script>

        <script src="{{ asset('js/admin.js') }}"></script>

        

        <script>


            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
              'use strict';
              window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                  form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                      event.preventDefault();
                      event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                  }, false);
                });
              }, false);
            })();
        </script>
        <script>
            $(document).ready(function(){
              $('[data-toggle="tooltip"]').tooltip();   
            });
        </script>

        

       

    </body>

</html>