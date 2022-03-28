@extends('layouts.incidencia.incidencia')





@section('cuerpo')



    <div class="container-fluid">

        

        <form action="{{url('operario/incidencias')}}" method="GET">

            <div class="row pb-4">

                <div class="col-3 pb-3">

                    <label class="col-form-label col-form-label-sm">Prioridad</label>

                    <select name="prioridad" class=" form-control form-control-sm text-uppercase" >

                        @if (Request::get('prioridad') == '')

                            <option value="" >Seleccionar prioridad</option>

                        @else

                            <option value="{{Request::get('prioridad')}}" >{{Request::get('prioridad')}}</option>

                            <option class=" form-control" value="">Mostrar todas</option>

                        @endif

                            <option value="Baja">Baja</option>

                            <option value="Media">Media</option>

                            <option value="Alta">Alta</option>

                    </select>

                </div>

                <div class="col-3 pb-3">

                    <label class="col-form-label col-form-label-sm">Cliente </label>

                    <select name="cliente" class=" form-control form-control-sm text-uppercase" >

                            @if (Request::get('cliente') == '')

                                <option class=" form-control" value="">Selecciona un cliente</option>

                            @else

                                <option value="{{Request::get('cliente')}}">{{nombreCliente(Request::get('cliente'))}}</option> 

                                <option class=" form-control" value="">Mostrar todos</option>

                            @endif

                                

                            @foreach ($clientes as $cliente)

                                <option value="{{$cliente->cliente_id}}">{{nombreCliente($cliente->cliente_id)}}</option>    

                            @endforeach

                    </select>                    

                </div>

                

                <div class="col-3 pb-3">

                    <label class="col-form-label col-form-label-sm">Estado </label>

                    <select name="solucionado" class=" form-control form-control-sm text-uppercase">

                        @if (Request::get('solucionado') == '')

                            <option value="" >Seleccionar estado</option>

                        @else

                            <option value="{{Request::get('solucionado')}}" >{{Request::get('solucionado')}}</option>

                            <option class=" form-control" value="">Mostrar todas</option>

                        @endif

                        <option class=" form-control" value="solucionado">solucionado</option>

                        <option class=" form-control" value="pendiente">pendiente</option>      

                        

                              

                    </select>                    

                </div>

                <div class="col-12">

                    <button  class=" btn btn-primary btn-sm " type="submit">Buscar</button>

                </div>

                

           

                

                

                

            </div>

        </form>    



        <h2 class=" pb-2">

            Lista de incidencias

        </h2>

        



        <table class="table table-striped table-sm border-bottom ">

            <thead class="">

                <tr>

                    <th scope="col">#ID</th>

                    <th scope="col">Creacion</th>

                    <th scope="col">Creado por</th>

                    <th scope="col">Cliente</th>

                    <th scope="col">Solucionado por</th>

                    <th scope="col">Fallo</th>

                    <th scope="col">Prioridad</th>

                    <th scope="col">Fecha entrega</th>

                    <th scope="col">Incidencia</th>

                    <th scope="col">Resolver</th>

                </tr>

            </thead>

            <tbody>

            @foreach($incidencias as $incidencia)

                <tr>

                    <th>{{$incidencia->id}}</th>

                    <td>

                        <span class=" text-capitalize">{{\Carbon\Carbon::parse($incidencia->created_at)->diffForHumans()}}</span>

                    </td>

                    <td>

                        <span class="text-uppercase">{{nombreUsuario($incidencia->users_id)}}</span>

                    </td>

                    <td>

                        <button type="button" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top"  title="{{ nombreCliente($incidencia->cliente_id)}}">

                            {{nombreClientex($incidencia->cliente_id)}}...

                        </button> 

                    </td>

                    <td >

                        @if($incidencia->prioridad == null)

                            <button type="button" class="btn btn-danger btn-sm btn-block text-capitalize" style="width:105px;">Pendiente</button>                           

                        @else

                            <button type="button" class="btn btn-success btn-sm btn-block text-capitalize" style="width:105px;">{{$incidencia->realizado_por}}</button>                      

                        @endif                        

                    </td>

                    <td>
                        {{$incidencia->fallo}}
                    </td>           

                    <td>

                        @if($incidencia->prioridad == 'Baja')

                            <button type="button" class="btn btn-info btn-sm btn-block  text-capitalize" style="width:105px;">{{$incidencia->prioridad}}</button>

                        @elseif($incidencia->prioridad == 'Media')

                            <button type="button" class="btn btn-warning btn-sm btn-block  text-capitalize" style="width:105px;">{{$incidencia->prioridad}}</button> 

                        @elseif($incidencia->prioridad == 'Alta')

                            <button type="button" class="btn btn-danger btn-sm btn-block  text-capitalize" style="width:105px;">{{$incidencia->prioridad}}</button> 

                        @elseif($incidencia->prioridad == NUll)

                            <button type="button" class="btn btn-secondary btn-sm btn-block text-capitalize" style="width:105px;">pendiente</button> 

                        @endif

                    </td>

                    <td>
                        <span class=" text-capitalize">{{\Carbon\Carbon::parse($incidencia->fecha_limite)->diffForHumans()}} </span>
                    </td>

                    <td>
                        <a href="{{url('operario/incidencias/'.$incidencia->id)}}">
                            <button type="button" class="btn btn-success btn-sm">
                                <i class="far fa-eye mr-1"></i> Ver
                            </button>
                        </a>                        
                        <!--
                        <a href="{{url('operario/incidencias/descargarPDF/'.$incidencia->id)}}">
                            <button type="button" class="btn btn-dark btn-sm ml-2" >
                                <i class="far fa-file-pdf mr-1"></i> Descargar
                            </button>
                        </a>                        
                        -->
                        @if($incidencia->prioridad == null)

                            <a href="{{url('operario/incidencias/'.$incidencia->id.'/edit')}}">
                                <button type="button" class="btn btn-warning btn-sm ml-2" data-toggle="modal" data-target="#myModal">
                                    <i class="far fa-edit mr-1"></i> Editar
                                </button>
                            </a>
                        @endif



                    </td>

                    <td>
                        @if($incidencia->prioridad != NUll)
                            <button type="button" class="btn btn-success btn-sm ml-2">
                                <i class="fas fa-check  mr-1"></i> Resuelto
                            </button>
                        @else

                        <a href="{{url('operario/incidencias/solucionar/'.$incidencia->id)}}">

                            <button type="button" class="btn btn-primary btn-sm ml-2" data-toggle="modal" data-target="#myModal">

                                <i class="far fa-edit mr-1"></i> Solucionar

                            </button>

                        </a>

                        @endif

                    </td>

                </tr>

            @endforeach   

            </tbody>

           

        </table>



        {{ $incidencias->links() }}   

    </div>



           

    

@endsection