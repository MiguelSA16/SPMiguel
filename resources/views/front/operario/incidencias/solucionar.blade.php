@extends('layouts.incidencia.incidencia')


@section('cuerpo')
        <div class="container-fluid">                    
            <div class="modal-content">
                <div class="modal-body">
                    <form class="needs-validation " novalidate action="{{url('operario/incidencia/update/'.$incidencia->id)}}" method="POST" enctype="multipart/form-data"> 
                        @method('PUT')
                        @csrf         
                        <div class="row">
                            <div class="col-12 ">
                                <div class=" bg-dark rounded">
                                    <h5 class=" text-light text-center py-2 text-uppercase">
                                        Registro incidencia
                                    </h5>
                                </div>
                            </div>
                            <div class="col-12 py-3">
                                <div class="row px-3 ">
                                    <div class="col-4 mb-3">
                                        <label for="validationTooltip01">Referencia</label>     
                                        <input type="text" class="form-control"  value="{{$incidencia->referencia}}" disabled>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="validationTooltip02">Nº serie</label>
                                        <input type="text" class="form-control"  value="{{$incidencia->n_serie}}" name="n_serie" id="validationTooltip02"  disabled>               
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="validationTooltip01">Nº Unidades</label>
                                        <input type="number" class="form-control" id="validationTooltip01" name="n_unidades" value="{{$incidencia->n_unidades}}" disabled>                                     
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="validationTooltip02">Fecha</label>
                                        <input type="text" class="form-control" value="{{\Carbon\Carbon::parse($incidencia->created_at)->diffForHumans()}}" id="validationTooltip02" disabled>              
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <fieldset >
                                            <label for="validationTooltip02">Nº Incidencia </label>
                                            <input type="text" class="form-control " value="{{$incidencia->id}}" id="validationTooltip02" disabled > 
                                        </fieldset>
                                    </div>
                                </div>                        
                            </div>
                        </div> 
                        <div class="row">
                            <div class=" col-12 ">
                                <div class=" bg-dark rounded">
                                    <h5 class=" text-light text-center py-2 text-uppercase" >
                                        Descripción  incidencia
                                    </h5>
                                </div>
                            </div>
                            <div class="col-12 py-3">
                                <div class="row px-3">
                                    <div class=" col-12">
                                        <div class="row ">
                                            <div class="col-4 mb-3">
                                            <label for="validationTooltip02">Cliente</label>
                                            <input type="text" class=" form-control" name="cliente_id" value="{{nombreCliente($incidencia->cliente_id)}}"  disabled>                                            
                                            </div>
                                            <div class="col-4 mb-3">
                                                <label for="validationTooltip02">Fallo</label>
                                                <input type="text" class="form-control" name="fallo" id="validationTooltip02" value="{{$incidencia->fallo}}" disabled>
                                            </div>
                                            <div class="col-4 mb-3">
                                                <label for="validationTooltip02">Tipo</label>
                                                <input type="text" class="form-control" name="tipo" id="validationTooltip02" value="{{$incidencia->tipo}}" disabled>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label for="exampleFormControlTextarea1">Descripción</label>
                                                <textarea class="form-control " name="descripcion" id="exampleFormControlTextarea1" rows="3" disabled >{{$incidencia->descripcion}}</textarea>                                                  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 ">
                                <div class=" bg-dark rounded">
                                    <h5 class=" text-light text-center py-2 text-uppercase" >
                                        Archivos adjuntos
                                    </h5>
                                </div>
                            </div>
                            <div class="col-12 py-3">
                                <div class="row px-3">                    
                                    <div class="col-md-4 mb-3">
                                        <img src="{{asset('images/incidencias/'.$incidencia->imagen1)}}" alt="{{$incidencia->imagen1}}"  style="width: 100px;height:100px;" />  <br>               
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <img src="{{asset('images/incidencias/'.$incidencia->imagen2)}}" alt="{{$incidencia->imagen2}}"  style="width: 100px;height:100px;" />                                 
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <img src="{{asset('images/incidencias/'.$incidencia->imagen3)}}" alt="{{$incidencia->imagen3}}"  style="width: 100px;height:100px;" />  <br>              
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 ">
                                <div class=" bg-dark rounded">
                                    <h5 class=" text-light text-center py-2 text-uppercase" >
                                        Soluciones
                                    </h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 py-3">
                            <div class="row">  
                                <div class="col-6 mb-3"> 
                                    <div class="row"> 
                                        <div class="col-4 mb-3">    
                                            <label for="validationTooltip01">Fecha aceptación </label>     
                                            <input type="date" class="form-control" name="fecha_aceptacion" value="{{$incidencia->fecha_aceptacion}}" required>                                                                                
                                        </div> 
                                        <div class="invalid-feedback">
                                            Porfavor introduce la fecha
                                        </div>
                                        <div class="col-4 mb-3 text-center">
                                            <label for="validationTooltip02">Prioridad</label>
                                                <select id="prioridad" class="custom-select custom-select" name="prioridad" required>
                                                    @if ($incidencia->prioridad == '')
                                                    <option value="" >Seleccionar prioridad</option>
                                                    @else
                                                    <option value="{{$incidencia->prioridad}}" >{{$incidencia->prioridad}}</option>
                                                    @endif
                                                    <option value="Baja">Baja</option>
                                                    <option value="Media">Media</option>
                                                    <option value="Alta">Alta</option>
    
                                                </select>   
                                            <div class="invalid-feedback">
                                                Porfavor introduce una prioridad.
                                            </div>
                                        </div>
                                        <div class="col-4 mb-3">
                                            <label for="validationTooltip01">Fecha limite </label>
                                            <input type="date" class="form-control"  name="fecha_limite" value="{{$incidencia->fecha_limite}}" min="{{date('Y-m-d')}}" required>
                                        </div>
                                        <div class="invalid-feedback">
                                            Porfavor introduce la fecha limite 
                                        </div>
                                        

                                        <div class="col-6 mb-3">
                                            <label for="validationTooltip01">Realizado por:</label> 
                                                @if ($incidencia->realizado_por == 'pendiente')    
                                                    <input type="text" class="form-control"  name="realizado_por" value="{{Auth::user()->name}}">
                                                @else  ($incidencia->realizado_por != 'pendiente' )  
                                                    <input type="text" class="form-control"   value="{{$incidencia->realizado_por}}" disabled>
                                                @endif
                                        </div> 
                                        <div class="invalid-feedback">
                                            Porfavor introduce el operario
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="validationTooltip01">Enviado a:</label>     
                                                <input type="text" class="form-control"  name="enviado_a" value="{{$incidencia->enviado_a}}" required>
                                        </div> 
                                        <div class="invalid-feedback">
                                            Porfavor introduce el destinatario
                                        </div> 
                                    </div>                  
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="exampleFormControlTextarea1">Observaciones</label>
                                    <textarea class="form-control " name="observaciones" id="exampleFormControlTextarea1" rows="5" >
                                        {{$incidencia->observaciones}}
                                    </textarea>                                                  
                                    <div class="invalid-feedback">
                                            Porfavor introduce una observación.
                                    </div>
                                </div>               
                            </div>
                        <div class="row">
                            <div class="col-12 ">
                                <div class=" bg-dark rounded">
                                    <h5 class=" text-light text-center py-2 text-uppercase" >
                                        Acciones
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 py-3">
                            <div class="row">  
                                <div class="col-4 mb-3">
                                    <label for="exampleFormControlTextarea1">Acciones contenedoras</label>
                                        <textarea class="form-control " name="a_con" id="exampleFormControlTextarea1" rows="2">{{$incidencia->a_con}}</textarea>                                                  
                                        <div class="invalid-feedback">
                                        Porfavor introduce una acción.
                                        </div>
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="exampleFormControlTextarea1">Análisis</label>
                                        <textarea class="form-control " name="acon_ana" id="exampleFormControlTextarea1" rows="2"  >{{$incidencia->acon_ana}}</textarea>                                                  
                                        <div class="invalid-feedback">
                                             Porfavor introduce un análisis.
                                        </div>
                                </div>
                                
                                <div class="col-4 mb-3">
                                    <label for="exampleFormControlTextarea1">Comentarios</label>
                                        <textarea class="form-control " name="acon_com" id="exampleFormControlTextarea1" rows="2"  >{{$incidencia->acon_com}}</textarea>                                                  
                                        <div class="invalid-feedback">
                                                Porfavor introduce una comentario.
                                        </div>
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="exampleFormControlTextarea1">Acciones correctivas</label>
                                        <textarea class="form-control " name="a_corr" id="exampleFormControlTextarea1" rows="3"  >{{$incidencia->a_corr}}</textarea>                                                  
                                        <div class="invalid-feedback">
                                        Porfavor introduce una acción.
                                        </div>
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="exampleFormControlTextarea1">Análisis</label>
                                        <textarea class="form-control " name="acorr_ana" id="exampleFormControlTextarea1" rows="3"  >{{$incidencia->acorr_ana}}</textarea>                                                  
                                        <div class="invalid-feedback">
                                             Porfavor introduce un análisis.
                                        </div>
                                </div>
                               
                                <div class="col-4 mb-3">
                                    <label for="exampleFormControlTextarea1">Comentarios</label>
                                        <textarea class="form-control " name="acorr_com" id="exampleFormControlTextarea1" rows="3"  >{{$incidencia->acorr_com}}</textarea>                                                  
                                        <div class="invalid-feedback">
                                                Porfavor introduce una comentario.
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="row px-3 pb-4">
                            <div class="col-12">
                                <button class="btn btn-primary btn-block" type="submit">Guardar incidencia</button>
                            </div>
                        </div>  
                    </form>
                </div>            
            </div>     
        </div>


@endsection




