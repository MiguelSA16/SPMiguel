@extends('layouts.admin.nav-left')
@section('cuerpo')
    <div class=" container-fluid">
        <div class="row">
            <div class="col-md-12">
                @foreach ($articulos as $item)
                    <span class=" d-block">
                INSERT INTO imagens(articulo_id, nombre, tipo,created_at) VALUES ({{$item->id}},'PND.jpg','normal','2019-10-01 00:00:00.000000');
                    </span>
                    <span class=" d-block">                        
                        INSERT INTO imagens(articulo_id, nombre, tipo,created_at) VALUES ({{$item->id}},'PND.jpg','normal','2019-10-01 00:00:00.000000');
                    </span>
                    <span class=" d-block">                        
                        INSERT INTO imagens(articulo_id, nombre, tipo,created_at) VALUES ({{$item->id}},'PND.jpg','normal','2019-10-01 00:00:00.000000');
                    </span> 
                @endforeach
            </div>
        </div>
    </div>

@endsection