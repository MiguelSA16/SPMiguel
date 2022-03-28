@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" id="login">
            <div class="card">
                <div class="card-header text-center">
                    BIENVENIDO
                </div>

                <div class="card-body">                    
                    @if (session('status'))
                        <div class="alert alert-success " role="alert" >                        
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (Auth::user()->role->nombre == 'admin')
                        {{ 'eres un adminstrador' }}                       
                    @else
                    ¡Estás conectado!
                    @endif                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


