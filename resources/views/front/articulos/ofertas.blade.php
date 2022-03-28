@extends('layouts.front.nav-left')

@section('titulo')
    Oferta
@endsection

@section('cuerpo')
    <div class="container-fluid mt-3">
        <!-- Titulo -->
        <div class="row subrayar">
            <div class="col-md-12 text-center">            
                <h1 class="title">
                    Productos en Oferta
                    <small>
                        <i class="fas fa-gift text-sunpro"></i>
                    </small> 
                </h1>
                <p class="sub-subtitle pb-2">
                    ARTÍCULOS EN OFERTA
                </p>
            </div> 
        </div>
        <div class=" line-subrayar ml-m-15"></div>

        <div class="row">       
            
            @foreach ($articulos as $item)
                <!-- Muestra los articulos -->
                <div class="col-12 col-md-4 mb-3 ">
                    <a href="{{url('articulo/'.$item->slug.'/ver') }}" class="text-decoration-none">                    
                        <div class="card">                        
                            <div class="card-imagen">
                                <img src="{{asset('images/articulos/'.$item->imagen)}}"  alt="...">                            
                            </div>	
                            <!-- en oferta -->
                            @if ($item->oferta=='SI')               
                            <div class="card-img-overlay">
                                <span href="#" class="badge badge-pill badge-danger text-uppercase " style=" margin-left: 165px; font-size: 10px;">
                                    en oferta
                                </span>
                            </div>	
                            @endif
                            <!-- fin en oferta -->
                            <div class="card-body text-center">
                                <h5 class="card-title min-height-card titulo-articulo">
                                    {{$item->nombre}}       
                                </h5>
                                @if($item->art <= 1)
                                <button class="btn btn-gris btn-sm text-uppercase">
                                    Visita este articulo 
                                </button>
                            @else
                            <button class="btn btn-warning btn-sm text-uppercase">
                                {{$item->art}}                            
                                Medidas disponibles
                            </button>
                            @endif
    
                                <hr class="my-3">
                                <h6>
                                    Referencia: <span class="badge badge-ref size-13">{{$item->codigo}}</span>
                                </h6>
                                <!-- Precios Oferta -->
                                @if ($item->oferta=='SI')
                                <div class="price text-success">
                                    <h5 class=" font-weight-bold m-0">
                                        <small>desde</small>  {{$item->pvpoferta}} € <small>und.</small> 
                                    </h5> 
                                </div>
                                @endif	
                                <!-- Fin Precios Oferta -->    
                                    
                            </div>
                            
                            <div class="card-footer text-center">
                                <div class="row">
                                    <div class="col-12">         
                                        <i class="far fa-file-pdf text-danger" style="font-size:18px;"></i>
                                        <small class="py-1">
                                            Ficha Tecnica
                                        </small>              
                                        
                                        @if ($item->pdf=='-')
                                        <i class="fas fa-times text-danger pl-1" style="font-size:18px;"></i>
                                        @else
                                        <i class="fas fa-check text-success pl-1" style="font-size:18px;"></i>
                                        @endif
    
                                        
                                    </div>
                                </div>                        
                            </div>
                        </div>
                        
                        
                    </a>								
                </div>
                <!-- Fin Muestra los articulos -->
            @endforeach
    
            <div class="col-12">
                {!!$articulos->links()!!}
            </div>
                   
        </div> 

@endsection