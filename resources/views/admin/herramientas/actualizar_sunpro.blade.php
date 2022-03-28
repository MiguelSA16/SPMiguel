@extends('layouts.admin.nav-left')

@section('cuerpo')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <!--Articulos Nuevos
            @foreach ($new_articulos as $new_articulo)                    
                <span class=" d-block text-success">
                    INSERT INTO articulos (id, codigo, grupo, color, ancho, longitud, nombre, refprov, clapro, pvp1, pvp2, pvp1iva, pvp2iva, prulcom, familia_id,
                    escandallo, exist1, exist2, baja, orden, pvpoferta, oferta, imagen, pdf, slug, descripcion, sunpro_2018, kai_2018 )
                    VALUE ({{$new_articulo->claart}}, '{{$new_articulo->codigo}}', '-', 'OTROS', '', '', '{{$new_articulo->nombre}}', '{{$new_articulo->refprov}}'
                    , 0 ,{{ str_replace(',','.',$new_articulo->pvp1)}} ,{{ str_replace(',','.',$new_articulo->pvp2)}} 
                    , {{ str_replace(',','.',$new_articulo->pvp1iva)}} ,{{ str_replace(',','.',$new_articulo->pvp2iva)}} ,'{{$new_articulo->prulcom}}' 
                    , {{$new_articulo->clafam}} ,0 ,0 ,0 ,'0' ,{{$new_articulo->n_orden}} ,0 
                    , 'NO' ,'PND.jpg' ,'-' ,'-' ,'-' ,0 ,0);
                </span>                   
            @endforeach
            -->
        </div>

        <div class="col-lg-12">
        <!--    
            @foreach ($actualizar_nombre as $item)
                @if (strtolower($item->nombre) !== strtolower($item->nombresunpro))
                    <span class="d-block text-danger">
                        {{strtolower($item->nombre)}}
                    </span>
                    <span class="d-block text-success">
                        {{strtolower($item->nombresunpro)}}
                    </span>
                    <span class="d-block">
                        UPDATE articulos SET nombre = "{{$item->nombresunpro}}" WHERE id = {{$item->id}};
                    </span>
                @endif
            @endforeach
        -->
        </div>

        <div class="col-lg-12">
        <!--Mirar
            @foreach ($actualizar_descripcion as $item)
                @if ($item->descripcion !== $item->descsunpro)                
                    <span class="d-block text-danger">
                        {{$item->descripcion}}
                    </span>
                    <span class="d-block text-success">
                        {{$item->descsunpro}}
                    </span>                
                    <span class="d-block">
                        UPDATE articulos SET descripcion = '{{$item->descsunpro}}' WHERE id = {{$item->id}};
                    </span>
                @endif
            @endforeach
        -->
        </div>

        <div class="col-lg-12">                
            @foreach ($actualizar_pdf as $item)
                @if ((string)$item->pdf !== (string)$item->pdfsunpro)   
                <!--       
                    <span class="d-block text-danger">
                        *{{$item->pdf}}*
                    </span>
                    <span class="d-block text-success">
                        *{{$item->pdfsunpro}}*
                    </span>           
                -->
                    <span class="d-block">
                        UPDATE articulos SET pdf = '{{$item->pdfsunpro}}' WHERE id = {{$item->id}};
                    </span>
                @endif
            @endforeach        
        </div>

        <div class="col-lg-12">                
            @foreach ($actualizar_imagen as $item)
                @if ((string)$item->imagen !== (string)$item->imagensunpro)   
                <!--
                    <span class="d-block text-danger">
                        *{{$item->imagen}}*
                    </span>
                    <span class="d-block text-success">
                        *{{$item->imagensunpro}}*
                    </span>           
                -->
                    <span class="d-block">
                        UPDATE articulos SET imagen = '{{$item->imagensunpro}}' WHERE id = {{$item->id}};
                    </span>
                @endif
            @endforeach        
        </div>

        <div class="col-lg-12">                
            @foreach ($actualizar_familia as $item)
                @if ((string)$item->familia_id !== (string)$item->clafamsunpro)   
                <!--
                    <span class="d-block text-danger">
                        *{{$item->familia_id}}*
                    </span>
                    <span class="d-block text-success">
                        *{{$item->clafamsunpro}}*
                    </span>           
                -->
                    <span class="d-block">
                        UPDATE articulos SET familia_id = '{{$item->clafamsunpro}}' WHERE id = {{$item->id}};
                    </span>
                @endif
            @endforeach        
        </div>

    </div>
</div>
@endsection