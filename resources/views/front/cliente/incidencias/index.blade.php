@extends('layouts.incidencia.incidencia')
@section('cuerpo')
    <div class="container-fluid">
        <h2 class=" pb-2">
            Lista de incidencias
        </h2>
        <table class="table table-striped table-sm border-bottom ">
            <thead class="">
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Creacion</th>
                    <th scope="col">Fallo</th>
                    <th scope="col">Solución</th>
                    <th scope="col">Fecha entrega</th>
                    <th scope="col" >Acciones</th>
                </tr>
            </thead>

            <tbody>
            @foreach($incidencias as $incidencia)
                <tr>
                    <th>
                        {{$incidencia->id}}
                    </th>
                    <td>
                        {{ \Carbon\Carbon::parse($incidencia->created_at)->diffForHumans()}}
                    </td>
                    <td>
                        {{$incidencia->fallo}}
                    </td>
                    <td >
                    @if($incidencia->prioridad == null)
                        <button type="button" class="btn btn-secondary btn-sm btn-block w-50">Pendiente</button>    
                    @else
                        <button type="button" class="btn btn-success btn-sm btn-block w-50">Solucionando</button>
                    @endif
                    </td>

                    <td>
                    @if($incidencia->prioridad == null)
                        Pendiente
                    @else
                        {{ \Carbon\Carbon::parse($incidencia->fecha_limite)->diffForHumans()}} 
                    @endif
                    </td>

                    <td>
                        <a href="{{url('cliente/incidencias/'.$incidencia->id)}}">
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">
                                <i class="far fa-eye mr-1"></i> ver
                            </button>
                        </a>                 
                        <!--
                        <a href="{{url('cliente/incidencias/descargarPDF/'.$incidencia->id)}}">
                            <button type="button" class="btn btn-dark btn-sm ml-2" data-toggle="modal" data-target="#myModal">
                            <i class="fas fa-file-pdf mr-1"></i> Descargar
                        </button>
                        </a>
                        -->

                    @if ($incidencia->prioridad == null)
                        <a href="{{url('cliente/incidencias/'.$incidencia->id.'/edit')}}">
                            <button type="button" class="btn btn-warning btn-sm ml-2" data-toggle="modal" data-target="#myModal">
                                <i class="far fa-edit mr-1"></i> Editar
                            </button>
                        </a>
                    @else
                    <button type="button" class="btn btn-success btn-sm ml-2">
                        <i class="fas fa-check  mr-1"></i> Resuelto
                    </button>
                    @endif

                    </td>

                </tr>

            @endforeach   

            </tbody>

           

        </table>



        {{ $incidencias->links() }}   

    </div>



           

    

@endsection