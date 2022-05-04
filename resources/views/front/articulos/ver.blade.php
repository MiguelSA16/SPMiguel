@extends('layouts.front.vertical')

@section('titulo')
    {{$articulo->nombre}}
@endsection

@section('cuerpo')
    @include('comun.front.camino-migas')
    <div class="container-fluid py-4 ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                     <!-- Titulo -->
                    <div class="row text-center">
                        <div class="col-md-12 pb-2">                   
                            <h1 class="title">
                                {{$articulo->nombre}}                        
                            </h1>
                            <p class="sub-subtitle  ">
                                Articulos al por mayor en Madrid
                            </p>
                        </div>                
                    </div>
                    <div class=" subrayar"></div>
                    <div class=" line-subrayar"></div>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-5">
                            <div class=" bg-white">
                                <img src="{{asset('images/articulos/'.$articulo->imagen)}}" class=" img-fluid w-100 " />
                            </div>                     
                        </div> 
                        <div class="col-7">                    
                            <p class="subtitle pb-3 font-weight-bold">                
                                Caracteristicas:
                            </p>                     
                            <table class="table table-striped ">
                                <tbody>
                                    <tr>
                                        <th class="text-uppercase border-0">
                                            Nombre:
                                        </th>
                                        <td class="text-muted border-0" colspan="3" >
                                            {{$articulo->nombre}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-uppercase">
                                            Referencia:
                                        </th>
                                        <td class="text-muted">
                                            <span class="badge badge-ref size-13">
                                                {{$articulo->codigo}}
                                            </span>
                                        </td>    
                                        <th class="text-uppercase">
                                            F. Tecnica:
                                        </th>

                                    @if ($articulo->pdf == '-')
                                        <td class="text-muted"> 
                                            <span class=" badge badge-warning size-13">
                                                <i class="far fa-file-pdf text-danger" style="font-size:18px;"></i> 
                                                NO DISPONIBLE 
                                            </span>
                                        </td>
                                    @else
                                        <td class="text-muted" > 
                                            <a href="{{asset('pdfs/'.$articulo->pdf)}}" class="text-decoration-none" target="_black">                                                   
                                                <span class=" badge badge-dark size-13 ">                             
                                                    <i class="far fa-file-pdf text-danger" style="font-size:18px;"></i> 
                                                    DESCARGAR PDF
                                                </span> 
                                            </a>         
                                        </td>
                                    @endif
                                    </tr>
                                    <tr>
                                        <th class="text-uppercase border-0">
                                            Certificado:
                                        </th>

                                    @if ($articulo->certificado == '-')
                                        <td class="text-muted" > 
                                        <td class="text-muted" colspan="3"> 
                                            <span class=" badge badge-warning size-13">
                                                <i class="far fa-file-pdf text-danger" style="font-size:18px;"></i> 
                                                NO DISPONIBLE 
                                            </span>
                                        </td>
                                    @else
                                        <td class="text-muted" colspan="3"> 
                                            <a href="{{asset('certificados/'.$articulo->certificado)}}" class="text-decoration-none" target="_black">                                                   
                                                <span class=" badge badge-dark size-13 ">                             
                                                    <i class="far fa-file-pdf text-danger" style="font-size:18px;"></i> 
                                                    DESCARGAR CERTIFICADO
                                                </span> 
                                            </a>         
                                        </td>
                                    @endif
                                    </tr>
                                    <tr >
                                        <th class="text-uppercase ">
                                            Color:
                                        </th>
                                        <td class="text-muted"> 
                                            {{$articulo->color}} 
                                        </td>
                                        <th class="text-uppercase ">
                                            Medida:
                                        </th>
                                        <td class="text-muted"> 
                                            {{$articulo->longitud}} 
                                        </td>
                                    </tr>

                                    <!-- Precios Cliente -->
                                    @if (Route::has('login'))
                                        @auth
                                            @if (Auth::user()->role_id == 3)
                                                <tr class=" border-bottom">
                                                    <th class="text-uppercase ">
                                                        Precio:
                                                    </th>
                                                    <!--Codigo antiguo-->
                                                    <th class="text-primary"> 
                                                        @php
                                                            $pvp1 = number_format($articulo->pvp1,2);
                                                        @endphp
                                                        @if ($pvp1 == 0.00)
                                                            <span class=" badge-warning badge-pill">
                                                                Consultar precio
                                                            </span>    
                                                        @else
                                                            {{$pvp1}} € <small>und.</small> 
                                                        @endif
                                                    </th>
                                                     <!--Fin Codigo antiguo-->
                                                        
                                                    <th class="text-uppercase ">
                                                        stock:
                                                    </th>
                                                    <th style="padding-bottom: 5px; padding-top: 5px;"> 
                                                        @if ($articulo->stock[0]->total == '' || $articulo->stock[0]->total == 0 )
                                                            <span>
                                                                <i class="fas fa-battery-empty text-danger" style=" font-size:35px; "></i>   
                                                            </span>
                                                        @elseif($articulo->stock[0]->total < 0)
                                                            <i class="fas fa-battery-empty text-danger" style=" font-size:35px; "></i>   
                                                        @else
                                                            @if(isset($consumo[0]))
                                                                @if ($articulo->stock[0]->total > $consumo[0]->avisar)
                                                                    <i class="fas fa-battery-full text-success" style=" font-size:35px;  "></i>
                                                                @elseif($articulo->stock[0]->total < $consumo[0]->avisar)
                                                                    <i class="fas fa-battery-half " style=" color:#f8bf3b; font-size:35px;"></i>
                                                                @elseif($articulo->stock[0]->total == $consumo[0]->avisar)
                                                                    <i class="fas fa-battery-full text-success" style=" font-size:35px;  "></i>
                                                                @endif
                                                            @elseif(!isset($consumo[0]))
                                                                @if($articulo->stock[0]->total)    
                                                                    <i class="fas fa-battery-full text-success" style=" font-size:35px;  "></i>
                                                                @endif
                                                            @endif
                                                        @endif  
                                                    </th>
                                                </tr>                                                
                                            @elseif(Auth::user()->role_id == 4 || Auth::user()->role_id == 1)     
                                                <tr class=" border-bottom">
                                                    <th class="text-uppercase ">
                                                        Precio:
                                                    </th>
                                                    <th class="text-primary"> 
                                                        @php
                                                            $pvp1 = number_format($articulo->pvp1,2);
                                                        @endphp
                                                        @if ($pvp1 == 0.00)
                                                            <span class=" badge-warning badge-pill">
                                                                Consultar precio
                                                            </span>    
                                                        @else
                                                            {{$pvp1}} € <small>und.</small> 
                                                        @endif
                                                    </th>
                                                    <th class="text-uppercase ">
                                                        stock:
                                                    </th>  
                                                        <th style="font-size: 18px; padding-top: 8px;"> 
                                                        @if ($articulo->stock[0]->total == '' || $articulo->stock[0]->total == 0 )
                                                            <span class="text-danger">
                                                                0 <small>und.</small>  
                                                            </span>
                                                        @elseif($articulo->stock[0]->total < 0)
                                                            <span class="text-danger">
                                                                {{$articulo->stock[0]->total}} <small>und.</small>  
                                                            </span>
                                                        @else
                                                            <span class="text-success">
                                                                {{$articulo->stock[0]->total}} <small>und.</small>  
                                                            </span>
                                                        @endif       
                                                    </th>    
                                                </tr>  
                                            @endif         
                                        @endauth
                                    @endif
                                </tbody>
                            </table>
                        </div>   
                    </div>
                </div>

                @if($longitudes->count() != 0)
                <div class="col-6">
                    <p class="subtitle pt-3 pb-2 font-weight-bold">
                        Medidas Disponibles:
                    </p> 
                    @foreach ($longitudes as $longitud)
                        <a href="{{url('articulo/'.$longitud->slug.'/ver') }}" class="text-decoration-none">
                            <button class=" btn btn-outline-sunpro py-0 my-1">{{$longitud->longitud}}</button>
                        </a>
                    @endforeach
                </div>
                @endif
                @if($anchos->count() != 0)
                <div class=" col-6">
                    <p class="subtitle pt-3 pb-2 font-weight-bold"> 
                        Anchos Disponibles:
                    </p> 
                    @foreach ($anchos as $ancho)
                        <a href="{{url('articulo/'.$ancho->slug.'/ver') }}" class="text-decoration-none">
                            <button class=" btn btn-outline-primary py-0 my-1">{{$ancho->ancho}}</button>
                        </a>
                    @endforeach
                </div>

                @endif  
                @if($colores->count() != 0)
                <div class=" col-6">
                    <p class="subtitle pt-3 pb-2 font-weight-bold"> 
                        Colores Disponibles:
                    </p> 
                    @foreach ($colores as $color)
                        <a href="{{url('articulo/'.$color->slug.'/ver') }}" class="text-decoration-none">
                            <button class=" btn btn-outline-{{$color->color}} py-0 my-1">{{$color->color}}</button>
                        </a>
                    @endforeach
                </div>

                @endif
                <div class="col-12">
                    <p class="subtitle pt-3 pb-2 font-weight-bold">    
                        Descripcion:
                    </p> 
                    <span>
                        {!!$articulo->descripcion!!}
                    </span>
                </div>
            </div>
        </div>
    </div>



    @if($art_relacionados->count() != 0)
    <div class="container-fluid py-4 bg-white">
        <div class="container">
            <div class="row">  
                <div class="col-12">
                    <p class="subtitle pb-2 font-weight-bold"> 
                        Otros Clientes Tambien Compraron:
                    </p> 
                    <div class="row">
                        @foreach ($art_relacionados as $art_relacionado)
                           <div class="col-2 py-1 ">
                                <a href="{{url('articulo/'.$art_relacionado->slug.'/ver')}}" class=" text-decoration-none">  
                                    <div class="card border-success" data-toggle="tooltip" data-placement="top" title="{{$art_relacionado->nombre}}">
                                        <div class="card-imagen border-0">
                                            <img src="{{url('/images/articulos/'.$art_relacionado->imagen)}}" alt="{{$art_relacionado->nombre}}" class=" img-fluid p-2">
                                        </div>
                                        <div class="card-body p-2 bg-success text-center">
                                            @php
                                            if (strlen($art_relacionado->nombre) > 30) {
                                                $nombre = substr($art_relacionado->nombre,0,30).'...';
                                            }else{
                                                $nombre = $art_relacionado->nombre;
                                            }                                           

                                            @endphp
                                            <span class=" text-white " >
                                                {{$nombre}}
                                            </span>
                                        </div>	
                                    </div>     
                                </a>  
                            </div>   
                        @endforeach
                    </div>    
                </div>
            </div>
        </div>
    </div>
    @endif   
    @include('comun.front.carusel-items')    
@endsection