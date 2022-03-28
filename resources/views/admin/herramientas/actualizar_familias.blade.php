@extends('layouts.admin.nav-left')

@section('cuerpo')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                @foreach ($new_familias as $new_familia)
                    <span class=" d-block">
                        INSERT INTO familias( id ,nomfam ,escandallo ,imagen ,orden ,claparent ,grupo ,descripcion ,slug ,baja_web) 
                        VALUES ( {{$new_familia->clafam}} ,'{{$new_familia->nomfam}}' ,'{{$new_familia->escandallo}}' ,'PND.jpg' ,{{$new_familia->orden}} 
                        ,{{$new_familia->claparent}} ,'{{$new_familia->grupo}}' ,'-' ,'-' ,'FALSO' );
        
                    </span> 
                @endforeach
            </div>

            <div class="col-lg-12">
                @foreach ($nombre_familias as $nombre_familia)
                    <span class=" d-block">
                        UPDATE familias SET nomfam = '{{$nombre_familia->nomfam}}' WHERE id = {{$nombre_familia->clafam}};
                    </span>      
                @endforeach
            </div>

            <div class="col-lg-12">
                @foreach ($claparent_group_familias as $claparent_group_familia)
                    @if ($claparent_group_familia->claparent != $claparent_group_familia->claparent_clg)
                        <span class="d-block">
                            UPDATE familias SET claparent = {{$claparent_group_familia->claparent_clg}} WHERE id = {{$claparent_group_familia->id}};
                        </span>
                    @endif
                @endforeach
            </div>

            <div class="col-lg-12">
                @foreach ($claparent_group_familias as $claparent_group_familia)
                    @if ($claparent_group_familia->grupo != $claparent_group_familia->grupo_clg)
                        <span class="d-block">
                            UPDATE familias SET grupo = {{$claparent_group_familia->grupo_clg}} WHERE id = {{$claparent_group_familia->id}};
                        </span>
                    @endif
                @endforeach
            </div>
            
            <div class="col-lg-12">
                @foreach ($url_familias as $url_familia)
                    @php
                        $slug = str_slug($url_familia->nomfam);
                        $slug = $slug.'-'.$url_familia->id;
                    @endphp
                    <span class="d-block">
                        UPDATE familias SET slug = '{{$slug}}' WHERE id = {{$url_familia->id}};
                    </span>
                   
                @endforeach
                    
            </div>

            <div class="col-lg-12">
                @foreach ($borrar_familia as $item)
                    <span class=" d-block text-danger">
                        DELETE FROM familias WHERE id = {{$item->id}}      
                    </span>                 
                @endforeach
            </div>
        
        </div>
    </div>
    
@endsection