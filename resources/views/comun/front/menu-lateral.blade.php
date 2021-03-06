
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">       
    
    @isset($familia_actual->padre->categorias)
        <li class=" nav-item pb-1 pt-3 text-uppercase">
            <span class="menu-titulo">                   
                {{$familia_actual->padre->nomfam}}
            </span>
        </li>    
        @foreach ($familia_actual->padre->categorias as $familia)                       
            <li class=" nav-item ml-4 p-0 pr-2">
            @if ($familia->grupo == '1')
                <a href="{{url('familia/'.$familia->slug.'/categorias')}}" class="text-decoration-none ml-0 menu-sub-categoria p-0" style="display: -webkit-flex; align-items: center;">     
            @else
                <a href="{{url('familia/'.$familia->slug.'/articulos')}}" class="text-decoration-none ml-0 menu-sub-categoria p-0" style="display: -webkit-flex; align-items: center;">     
            @endif                                       
    
                @if ($familia_actual->nomfam ==$familia->nomfam)
                    <button class=" btn btn-warning py-0 my-1 size-13">    
                        <small>
                            <i class="fab fa-slack-hash"></i> 
                            {{$familia->nomfam}}            
                        </small>                     
                    </button>   
                @else
                    <button class=" btn btn-secondary py-0 my-1 size-13">    
                        <small>
                            <i class="fab fa-slack-hash"></i> 
                            {{$familia->nomfam}}            
                        </small>                     
                    </button>                        
                @endif
                                           
                </a> 
            </li>                           
        @endforeach  
        <li class="border-bottom pt-1 mr-2 ml-2"></li>
    @endisset

    @isset($colores)
        @if($colores->count() != 0)
            <li class=" nav-item pb-1 pt-3 text-uppercase">
                <span class=" menu-titulo">                
                    {{'Colores disponibles'}}
                </span>
            </li> 
            <li class=" nav-item ml-4 p-0 pr-2">
                @foreach ($colores as $color)
                    <a href="?c={{$color->color}}" class=" text-decoration-none">
                        <button class="btn btn-outline-{{$color->color}} py-0 my-1">                    
                            {{$color->color}}
                        </button>
                    </a>
                @endforeach
                
            </li>
            <li class="border-bottom pt-1 mr-2 ml-2"></li>
        @endif
    @endisset
    

    @isset($longitudes)
        @if($longitudes->count() != 0)
            <li class=" nav-item pb-1 pt-3 text-uppercase">
                <span class=" menu-titulo">                
                    {{'Medidas disponibles'}}
                </span>
            </li> 
            <li class=" nav-item ml-4 p-0 pr-2">
                @foreach ($longitudes as $longitud)
                <a href="?l={{$longitud->longitud}} " class="text-decoration-none">
                    <button class="btn btn-outline-sunpro py-0 my-1">                    
                        {{$longitud->longitud}}
                    </button>
                </a>
                @endforeach                
            </li>
            <li class="border-bottom pt-1 mr-2 ml-2"></li>
        @endif
    @endisset


    @isset($familia_actual->padre->padre->categorias)
        <li class=" nav-item pb-1 pt-3 text-uppercase">
            <span class=" menu-titulo">                
                {{'Categor??as relacionadas'}}
            </span>
        </li>         
        @foreach ($familia_actual->padre->padre->categorias as $familia)                                     
            <li class=" nav-item pl-3">                    
            @if($familia_actual->padre->nomfam != $familia->nomfam)       
                @if($familia->grupo == '1')
                <a href="{{url('familia/'.$familia->slug.'/categorias')}}" class="text-decoration-none ml-0 menu-categoria pl-2" style="display: -webkit-flex; align-items: center;">     
                @else
                <a href="{{url('familia/'.$familia->slug.'/articulos')}}" class="text-decoration-none ml-0 menu-categoria  pl-2" style="display: -webkit-flex; align-items: center;">     
                @endif                              
                    <button class=" btn btn-warning py-0 my-1 size-13">    
                        <small>
                            <i class="fab fa-slack-hash"></i> 
                            {{$familia->nomfam}}        
                        </small>                     
                    </button>                                        
                </a> 
            @endif
            </li>                           
        @endforeach  
            <li class="border-bottom pt-1 mr-2 ml-2"></li>
    @endisset

    @isset($familias)
        <li class=" nav-item pb-1 pt-3 text-uppercase">
            <span class=" menu-titulo">                
                Nuestros Productos
            </span>
        </li> 
        @foreach ($familias as $familia)                                     
            <li class=" nav-item pl-3">       
                @if($familia->grupo == '1')
                <a href="{{url('familia/'.$familia->slug.'/categorias')}}" class="text-decoration-none ml-0 menu-categoria pl-2" style="display: -webkit-flex; align-items: center;">     
                @else
                <a href="{{url('familia/'.$familia->slug.'/articulos')}}" class="text-decoration-none ml-0 menu-categoria  pl-2" style="display: -webkit-flex; align-items: center;">     
                @endif                              
                    <button class=" btn btn-primary py-0 my-1 size-13">    
                        <small>
                            <i class="fab fa-slack-hash"></i> 
                            {{$familia->nomfam}}        
                        </small>                     
                    </button>                                        
                </a> 
            </li>                           
        @endforeach     
    @endisset
    
    </ul>
</nav>
    
    
    
    