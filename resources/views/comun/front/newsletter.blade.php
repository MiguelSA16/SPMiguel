<div class="container-fluid bg-gris py-5">
    <div class="container">
        <!--Titulo carusel-->
        <div class="row mb-4 text-center">
            <div class="col-md-12">
                <p class="sub-subtitle">
                    ¡Enterate, de todas nuestras ofertas!
                </p>
                <h2 class="title">
                    Suscríbete a nuetra newsletter
                    <small>
                        <i class="fas fa-envelope text-sunpro"></i>
                    </small>
                </h2>
            </div>
        </div>
        <!--FIN Titulo carusel-->

        <!--Formulario Newletter-->
        <div class="col-md-12">
            <form action="{{ url('newsletter') }}" method="POST" id="form-newsleter" novalidate>
                @csrf
                <div class="row justify-content-md-center">
                    <div class="col-md-9 mb-3">
                        <div class="input-group">
                            <input type="email" class="form-control" id="nombre" value='{{old('email')}}' placeholder="Suscríbete: Introduce tu email" name="email" required>
                            <span class="input-group-btn">
                                <button 
                                    id="butonNewsleter" 
                                    class="btn btn-sunpro border-y-radius-l-0" 
                                    type="button"
                                > 
                                    Suscríbete 
                                    <i class="far fa-envelope"></i>
                                </button>                                
                            </span>                            
                        </div>
                        {!! $errors->first('email','<small class="text-danger">:message</small><br>') !!}
                        
                        <div class="form-check">
                            <input type="checkbox" name="checkbox" class="form-check-input" }}>
                            <label class="form-check-label" for="checkbox">
                                He leído y acepto el tratamiento de los datos acorde a la
                                <a class="text-sunpro text-decoration-none " href="{{ route('privacidad') }}" target="_black">
                                    POLITICA DE PRIVACIDAD
                                </a>
                            </label>                           
                        </div>
                        {!! $errors->first('checkbox', '<small class="text-danger">:message</small>') !!}
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
