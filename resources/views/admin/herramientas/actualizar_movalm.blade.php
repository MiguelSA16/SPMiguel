@extends('layouts.admin.nav-left')

@section('cuerpo')
<div id="textoACopiar">
    @foreach ($new_movalm_clg as $item)
        <span class=" d-block text-success">
                INSERT INTO movalm (clamov, tipo, cladoc,cladocl ,fecha ,claart ,clacol, claalm,tc1 ,tc2 ,tc3 ,tc4 ,tc5 ,tc6 ,tc7 ,tc8 ,tc9 , tc10,
                tc11, cantidad, valcom, valven, numserie, vtogarant)
                VALUE ({{$item->clamov}}, {{$item->tipo}}, {{$item->cladoc}},{{$item->cladocl}} ,'{{$item->fecha}}' ,{{$item->claart}} , {{$item->clacol}}, 
                {{$item->claalm}}, '{{$item->tc1}}', {{$item->tc2}}, {{$item->tc3}}, {{$item->tc4}}, {{$item->tc5}}, {{$item->tc6}}, {{$item->tc7}}, {{$item->tc8}}, {{$item->tc9}}, {{$item->tc10}},
                {{$item->tc11}},'{{$item->cantidad}}', '{{$item->valcom}}', '{{$item->valven}}', '{{$item->numserie}}', '{{$item->vtogarant}}');
        </span>
    @endforeach
</div>

<div class="container">		
    <div class="text-center py-3">  
        <button id="btnCopiar" class="btn btn-primary">
            COPIAR SQL
        </button>  
    </div>
</div>
@endsection
