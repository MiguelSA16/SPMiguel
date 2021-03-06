@extends('layouts.front.vertical')

@section('titulo')
    Contactanos
@endsection

@section('cuerpo')
    <div class="container py-4">
        <!-- Titulo -->
        <div class="row subrayar">
            <div class="col-md-12 text-center">
                <h1 class="title">
                    Contactanos
                    <i class="far fa-grin-wink text-sunpro"></i>
                </h1>
                <p class="sub-subtitle pb-2">
                    PONTE EN CONTACTO CON NOSOTROS
                </p>
            </div>
        </div>

        <div class=" line-subrayar ml-m-15"></div>
        <div class="row pb-4">
            <div class="col-4 pt-5">
                <h3 class=" font-weight-light">
                    <i class="fas fa-paper-plane text-sunpro"></i>
                    Dirección
                </h3>
                <p>Calle Electrónica,<br>
                    24 28923 Alcorcón Madrid</p>
            </div>
            <div class="col-4 pt-5">
                <h3 class=" font-weight-light">
                    <i class="fas fa-phone text-sunpro"></i>
                    Contactanos
                </h3>
                <p>
                    Este número es gratuito si llamas desde España;<br>
                    de lo contrario, le recomendamos que utilice la <br>
                    forma de comunicación electrónica <br>
                    <strong>+34 915 00 79 63</strong>
                </p>
            </div>
            <div class="col-4 pt-5">
                <h3 class=" font-weight-light">
                    <i class="fas fa-envelope text-sunpro"></i>
                    Correo electrónico
                </h3>
                <p>
                    Por favor, siéntase libre de escribirnos un correo <br>
                    electrónico
                </p>

                <ul class="font-weight-bold">
                    <li>info@sunprored.es</li>
                    <li>comercial@sunprored.es</li>
                </ul>
            </div>
        </div>
        <div class="hr2"></div>
        <form method="POST" action="{{ route('contacto') }}" class="py-4" id="form-contactos" >
            <div class="row">
                @csrf
                <div class="form-group col-4">
                    <input type="text" name="nombre" placeholder="Nombres" value='{{ old('nombre') }}' class=" form-control">
                    {!! $errors->first('nombre', '<small class="text-danger">:message</small><br>') !!}
                </div>
                <div class="form-group col-4">
                    <input type="text" name="email" placeholder="e-mail..." value='{{ old('email') }}' class=" form-control">
                    {!! $errors->first('email', '<small class="text-danger">:message</small><br>') !!}
                </div>
                <div class=" form-group col-4">
                    <input type="number" name="subject" placeholder="Telefóno" value='{{ old('subject') }}' class=" form-control">
                    {!! $errors->first('subject', '<small class="text-danger">:message</small><br>') !!}
                </div>
                <div class=" form-group col-12 ">
                    <textarea name="content" rows="5" class=" form-control">{{ old('content') }}</textarea>
                    {!! $errors->first('content', '<small class="text-danger">:message</small>') !!}
                </div>
                <div class="form-group col-12">
                    <div class="form-check">
                        <input type="checkbox" name="checkbox" class="form-check-input" }}>
                        <label class="form-check-label" for="checkbox">
                            He leído y acepto el tratamiento de los datos acorde a la
                            <a class="text-sunpro text-decoration-none " href="{{ route('privacidad') }}" target="_black">
                                POLITICA DE PRIVACIDAD
                            </a>
                        </label>
                        {!! $errors->first('checkbox', '<br><small class="text-danger">:message</small>') !!}
                    </div>
                </div>
                <div class=" col-12">
                    <button
                        type="button" 
                        class="btn btn-sunpro"
                        id="butonContactanos"
                    >
                            @lang('send')
                    </button>
                </div>


            </div>


        </form>


    </div>





    <div id="map" style="height: 400px;">


        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3041.353719613158!2d-3.8178543842955364!3d40.33449866855983!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd41895093ecb86d%3A0x90b622711a808832!2sCalle+Electr%C3%B3nica%2C+24%2C+28923+Alcorc%C3%B3n%2C+Madrid!5e0!3m2!1ses!2ses!4v1543581574103"
            width="100%" height="400" frameborder="0" style="border:0" allowfullscreen=""></iframe>


    </div>
@endsection
