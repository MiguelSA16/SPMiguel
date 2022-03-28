@extends('layouts.admin.nav-left')

@section('cuerpo')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <!--Articulos Nuevos-->
                @foreach ($new_articulos as $new_articulo)                    
                    <span class=" d-block text-success">
                        INSERT INTO articulos (id, codigo, grupo, color, ancho, longitud, nombre, refprov, clapro, pvp1, pvp2, pvp1iva, pvp2iva, prulcom, familia_id,
                        escandallo, exist1, exist2, baja, orden, pvpoferta, oferta,baja_web, imagen, pdf, certificado, slug, descripcion, sunpro_2018, kai_2018 )
                        VALUE ({{$new_articulo->claart}}, '{{$new_articulo->codigo}}', '-', NULL, NULL, NULL, '{{$new_articulo->nombre}}', '{{$new_articulo->refprov}}'
                        , {{$new_articulo->clapro}} ,{{ str_replace(',','.',$new_articulo->pvp1)}} ,{{ str_replace(',','.',$new_articulo->pvp2)}} 
                        , {{ str_replace(',','.',$new_articulo->pvp1iva)}} ,{{ str_replace(',','.',$new_articulo->pvp2iva)}} ,'{{$new_articulo->prulcom}}' 
                        , {{$new_articulo->clafam}} , @if ($new_articulo->escandallo == 0)
                            'FALSO'
                        @else
                            'VERDADERO'
                        @endif ,
                        0 ,0 ,'{{$new_articulo->baja}}' ,{{$new_articulo->orden}} ,{{$new_articulo->pvpoferta}} 
                        , @if ($new_articulo->oferta == 0)
                            'NO'
                        @else
                            'SI'
                        @endif,'NO',
                        'PND.jpg' ,'-' ,'-' ,'-' ,'<li>Descripción del articulo actualmente no esta disponible, para mas información póngase en contacto con nosotros.</li>' ,0 ,0);
                    </span>                   
                @endforeach
            </div>

            <div class="col-lg-12">
                @foreach ($borrar_articulo as $item)
                    <span class=" d-block text-danger">
                        DELETE FROM articulos WHERE id = {{$item->id}};     
                    </span>                 
                @endforeach
            </div>

            <div class="col-lg-12">
                @foreach ($actualizar_pvp1 as $item)
                    @php
                        $pvp1 = str_replace(',','.',$item->pvp1clasic);
                        $pvp1 = str_replace(',','',$pvp1);
                    @endphp
                    
                    @if ((float)$item->pvp1 !== (float)$pvp1)
                        <!--<span class="d-block">
                            {{$item->pvp1}}
                        </span>
                        <span class="d-block">
                            {{$item->pvp1clasic}}
                        </span>-->
                        <span class="d-block">
                            UPDATE articulos SET pvp1 ='{{$pvp1}}' WHERE id = {{$item->id}}; 
                        </span>             
                    @endif        
                @endforeach
            </div>
 
            <div class="col-lg-12">
                @foreach ($actualizar_pvp1iva as $item)
                    @php
                        $pvp1iva = str_replace(',','.',$item->pvp1ivaclasic);
                        $pvp1iva = str_replace(',','',$pvp1iva);
                    @endphp
                    
                    @if ((float)$item->pvp1iva !== (float)$pvp1iva)
                        <!--<span class="d-block">
                            {{$item->pvp1iva}}
                        </span>
                        <span class="d-block">
                            {{$item->pvp1ivaclasic}}
                        </span>-->
                        <span class="d-block">
                            UPDATE articulos SET pvp1iva ='{{$pvp1iva}}' WHERE id = {{$item->id}}; 
                        </span>             
                    @endif        
                @endforeach
            </div>

            <div class="col-lg-12">
                @foreach ($actualizar_pvp2 as $item)
                    @php
                        $pvp2 = str_replace(',','.',$item->pvp2clasic);
                        $pvp2 = str_replace(',','',$pvp2);                        
                    @endphp
                    @if ((float)$item->pvp2 !== (float)$pvp2)
                        <span class="d-block text-info ">
                            UPDATE articulos SET pvp2 = '{{$pvp2}}' WHERE id = {{$item->id}};
                        </span>            
                    @endif
                       
                @endforeach
            </div>

            <div class="col-lg-12">
                @foreach ($actualizar_pvp2iva as $item)
                    @php
                        $pvp2iva = str_replace(',','.',$item->pvp2ivaclasic);
                        $pvp2iva = str_replace(',','',$pvp2iva);
                    @endphp
                    
                    @if ((float)$item->pvp2iva !== (float)$pvp2iva)
                        <!--<span class="d-block">
                            {{$item->pvp2iva}}
                        </span>
                        <span class="d-block">
                            {{$item->pvp2ivaclasic}}
                        </span>-->
                        <span class="d-block">
                            UPDATE articulos SET pvp2iva ='{{$pvp2iva}}' WHERE id = {{$item->id}}; 
                        </span>             
                    @endif        
                @endforeach
            </div>

            <div class="col-lg-12">
                @foreach ($actualizar_refprov as $item)
                    
                    @if ((string)$item->refprov !== (string)$item->refprovclasic)
                        <span class="d-block text-primary">
                            UPDATE articulos SET refprov = '{{$item->refprovclasic}}' WHERE id = {{$item->id}};
                        </span>
                    @endif
                @endforeach
            </div>

            <div class="col-lg-12">
                @foreach ($actualizar_nombre as $item)
                    @if ($item->nombre !== $item->nombreclasic)
                        <span class="d-block">
                            UPDATE articulos SET nombre = '{{$item->nombreclasic}}' WHERE id = {{$item->id}};
                        </span>
                    @endif
                @endforeach
            </div>

            <div class="col-lg-12">
                @foreach ($actualizar_codigo as $item)
                    @if ($item->codigo !== $item->codigoclasic)
                        <span class="d-block text-danger">
                            UPDATE articulos SET codigo = '{{$item->codigoclasic}}' WHERE id = {{$item->id}};
                        </span>
                    @endif                    
                @endforeach
            </div>

            <div class="col-lg-12">
                @foreach ($actualizar_clapro as $item)
                    @if ($item->clapro !== $item->claproclasic)
                        <span class="d-block text-success">
                            UPDATE articulos SET clapro = '{{$item->claproclasic}}' WHERE id = {{$item->id}};
                        </span>        
                    @endif                    
                @endforeach
            </div>
            
            <div class="col-lg-12">
                @foreach ($actualizar_familia as $item)
                    @if ($item->familia_id != $item->familiaidclasic)
                        <span class="d-block text-primary">
                            UPDATE articulos SET familia_id = '{{$item->familiaidclasic}}' WHERE id = {{$item->id}};
                        </span>                                       
                    @endif
                @endforeach
            </div>

            <div class="col-lg-12">
                @foreach ($actualizar_baja as $item)
                    @if ($item->baja !== (string)$item->bajaclasic)
                        <span class="d-block">
                            UPDATE articulos SET baja = '{{$item->bajaclasic}}' WHERE id = {{$item->id}};
                        </span>
                    @endif
                @endforeach
            </div>

            <div class="col-lg-12">
                @foreach ($actualizar_slug as $item)        
                    @php
                        $url = str_slug($item->nombre.'-'.$item->id);
                    @endphp                    
                    <span class="d-block text-success">
                        UPDATE articulos SET slug = '{{$url}}' WHERE id = {{$item->id}};
                    </span>
                @endforeach
            </div>
        </div>
    </div>


   
@endsection