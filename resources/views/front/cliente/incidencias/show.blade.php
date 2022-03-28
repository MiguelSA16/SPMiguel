@extends('layouts.incidencia.incidencia')
@section('cuerpo')
<div class="container-fluid">    
    <div class="modal-content">
         <div class="modal-body">     
            <div class="row">
                <div class="col-12 ">
                    <div class=" bg-dark rounded">
                        <h5 class=" text-light text-center py-2 text-uppercase">
                            Descripción  incidencia
                        </h5>
                    </div>
                </div>

                <div class="col-12 py-3">
                    <div class="row px-3 ">
                        <div class="col-6 mb-3">
                            <h5 class="font-weight-bold">
                                Proveedor/Cliente:
                            </h5>
                            <p class="text-muted form-control-file">
                                {{ nombreCliente(Auth::user()->cliente_id)}} 
                            </p> 
                        </div>     

                        <div class="col-6 mb-3">
                            <h5 class="font-weight-bold">
                                Fecha:
                            </h5>
                            <p class="text-muted">
                                {{$incidencia->created_at}} 
                            </p>
                        </div>                 

                        <div class="col-6 mb-3">
                            <h5 class="font-weight-bold">
                                Referencia:
                            </h5>
                            <p class="text-muted">
                                {{$incidencia->referencia}}
                            </p>  
                        </div>

                        <div class="col-6 mb-3">
                            <h5 class="font-weight-bold">
                                Nombre del articulo:
                            </h5>
                            <p  class="text-muted">
                                {{nombreArticulo($incidencia->referencia)}}
                            </p> 
                        </div>

                        <div class="col-6 mb-3">
                            <h5 class="font-weight-bold">
                                Nº Unidades:
                            </h5>
                            <p class="text-muted">
                                {{$incidencia->n_unidades}}
                            </p>
                        </div>

                        <div class="col-6 mb-3">
                            <h5 class="font-weight-bold">
                                Fallo:
                            </h5>
                            <p class="text-muted">
                                {{$incidencia->fallo}}
                            </p>
                        </div>

                        <div class="col-12 mb-3">
                            <h5 class="font-weight-bold">
                                Descripción:
                            </h5>
                            <p class="text-muted">
                                {{$incidencia->descripcion}}
                            </p>       
                        </div>
                        <div class="col-12 mb-3">
                            <h5 class="font-weight-bold">
                                Acciones correctivas:
                            </h5>
                            <p class="text-muted">
                                {{$incidencia->a_corr}}
                            </p>       
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class=" bg-dark rounded">
                        <h5 class=" text-light text-center py-2 text-uppercase" >
                            Archivos adjuntos
                        </h5>
                    </div>

                     <div class="col-12 py-3">
                        <div class="row px-3 ">
                            <div class="col-4">
                                <img src="{{asset('images/incidencias/'.$incidencia->imagen1)}}" class="img-fluid" alt="{{$incidencia->imagen1}}"/>
                            </div>
                            <div class="col-4">
                                <img src="{{asset('images/incidencias/'.$incidencia->imagen2)}}" class="img-fluid" alt="{{$incidencia->imagen2}}"/>
                            </div>

                            <div class="col-4">
                                <img src="{{asset('images/incidencias/'.$incidencia->imagen3)}}" class="img-fluid" alt="{{$incidencia->imagen3}}"/>
                            </div>
                        </div>
                    </div> 
                </div>

            </div>
       </div>   
    </div>
</div>
@endsection











