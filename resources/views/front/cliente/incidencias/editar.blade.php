
@extends('layouts.incidencia.incidencia')


@section('cuerpo')
    
    <div class="container-fluid">                    
            <div class="modal-content">
                <div class="modal-body">
                    <form class="needs-validation " novalidate action="{{url('cliente/incidencia/update/'.$incidencia->id)}}" method="POST" enctype="multipart/form-data"> 
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
                                        <input class="form-control" list="articulo" id="exampleDataList" value="{{$incidencia->referencia}}" name="referencia" placeholder="Nombre articulo..." required>
                                        <datalist id="articulo">
                                            @foreach ($articulos as $item)
                                                <option value="{{$item->codigo}}">{{$item->nombre}}</option>                                                    
                                                @endforeach
                                        </datalist>                
                                        <div class="invalid-feedback">
                                            Porfavor introduce la referencia.
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="validationTooltip02">Nº serie</label>
                                        <input type="text" class="form-control"  value="{{$incidencia->n_serie}}" name="n_serie" id="validationTooltip02"  >
                                        <div class="valid-feedback">
                                            Nº Serie no es requerido
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="validationTooltip01">Nº Unidades</label>
                                        <input type="number" class="form-control" id="validationTooltip01" name="n_unidades" value="{{$incidencia->n_unidades}}">
                                        <div class="invalid-feedback">
                                            Porfavor introduce la Nº Unidas.
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label>Fecha</label>
                                        <input type="text" class="form-control" value="{{$incidencia->created_at}}"  id="validationTooltip02" disabled>
                                        
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <fieldset >
                                            <label for="validationTooltip02">Nº Incidencia </label>
                                            <input type="text" class="form-control " value="{{$incidencia->id}}" id="validationTooltip02" disabled >
                                            <div class="valid-feedback">
                                                Nº Incidencia no es requerido
                                            </div>
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
                                                <input type="text" class="form-control disabled" name="nom_cliente" value="{{ nombreCliente(Auth::user()->cliente_id)}}" id="validationTooltip02" disabled>
                                                <div class="invalid-feedback">
                                                    Porfavor introduce Cliente.
                                                </div>
                                            </div>
                                            
                                            <div class="col-4 mb-3">
                                                <label for="validationTooltip02">Fallo</label>
                                                <input type="text" class="form-control" name="fallo" id="validationTooltip02" value="{{$incidencia->fallo}}">
                                                <div class="valid-feedback">
                                                    Fallo no es requerido
                                                </div>
                                            </div>
                                            <div class="col-4 mb-3">
                                                <label for="validationTooltip02">Tipo</label>
                                                <input type="text" class="form-control" name="tipo" id="validationTooltip02" value="{{$incidencia->tipo}}">
                                                <div class="valid-feedback">
                                                    Tipo no es requerido
                                                </div>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label for="exampleFormControlTextarea1">Descripción</label>
                                                <textarea class="form-control " name="descripcion" id="exampleFormControlTextarea1" rows="3"  >{{$incidencia->descripcion}}</textarea>                                                
                                                <div class="invalid-feedback">
                                                    Porfavor introduce una Descripción.
                                                </div>
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
                                    <div>        
                                        <label for="validationTooltip01">Adjunto 1</label>
                                            <div class="custom-file">
                                            <input type="file" class="form-control-file"  value="{{$incidencia->imagen1}}" name="imagen1">
                                                <div class="valid-feedback">
                                                    Adjunto 1 no es requerido
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="col-md-4 mb-3">
                                    <img src="{{asset('images/incidencias/'.$incidencia->imagen2)}}" alt="{{$incidencia->imagen2}}"  style="width: 100px;height:100px;" />            
                                        <div>    
                                            <label for="validationTooltip01">Adjunto 2</label>
                                            <div class="custom-file">
                                            <input type="file" class="form-control-file"  value="{{$incidencia->imagen2}}" name="imagen2">
                                                
                                                <div class="valid-feedback">
                                                    Adjunto 2 no es requerido
                                                </div>
                                            </div>
                                        </div>   
                                    </div>
                                    <div class="col-md-4 mb-3">
                                    <img src="{{asset('images/incidencias/'.$incidencia->imagen3)}}" alt="{{$incidencia->imagen3}}"  style="width: 100px;height:100px;" />  <br>            
                                        <div>    
                                            <label for="validationTooltip01">Adjunto 3</label>
                                            <div class="custom-file">
                                            
                                            <input type="file" class="form-control-file" value="{{$incidencia->imagen3}}" name="imagen3">
                                                <div class="valid-feedback">
                                                    Adjunto 3 no es requerido
                                                </div>
                                            </div>
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





