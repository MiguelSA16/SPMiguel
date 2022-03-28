@extends('layouts.admin.nav-left')

@section('cuerpo')
<div class="container-fluid">
    <div class="row">
        <div class=" col-lg-12">
            @foreach ($actualizar_nombre as $item)
                @if (strtolower($item->nomfam) !== strtolower($item->nombre_sunpro))
                    <span class="d-block">
                        UPDATE familias SET nomfam = "{{$item->nombre_sunpro}}" WHERE id = {{$item->id}};
                    </span>
                @endif
            @endforeach
        </div>
        <div class=" col-lg-12">
            @foreach ($actualizar_imagen as $item)
                @if (strtolower($item->imagen) !== strtolower($item->img_sunpro))
                    <span class="d-block text-primary">
                        UPDATE familias SET imagen = "{{$item->img_sunpro}}" WHERE id = {{$item->id}};
                    </span>
                @endif
            @endforeach
        </div>
    </div>
</div>

@endsection