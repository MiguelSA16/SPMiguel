<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>       
        
        <style>
            body{
                margin-left: 20px;
            }
            
            h2,h1{
                font-weight:bold;
                margin-top: 10px;
            }
            h2{
                font-weight:bold;
                margin-left: 20px;
            }
            p{
                margin-left: 40px;
            }
            button{
                margin-left: 40px;
            }
        </style>
    </head>

<body>
     
<h1>
        Descripción  incidencia
    </h1>
<table> 
    <tr>
        <td>
            <h2>Proveedor/Cliente</h2>
                <p>{{nombreCliente($incidencia->cliente_id)}}</p> 
        </td>
        <td>
            <h2>Fecha</h2>
                <p> {{$incidencia->created_at}} </p>    
        </td>
    </tr>
    <tr>
        <td>
            <h2>Referencia</h2>
                <p>{{$incidencia->referencia}}</p>       
        </td>
        <td>
            <h2>Nombre Referencia</h2>
                <p> {{nombreArticulo($incidencia->referencia)}}</p>  
        </td>
    </tr>
    <tr>
        <td>
            <h2> Nº serie</h2>
                <p>  {{$incidencia->n_serie}}</p>       
        </td>
        <td>
            <h2>Nº unidades</h2>         
                <P> {{$incidencia->n_unidades}}</p>
        </td>
    </tr>
    <tr>
        <td>
            <h2>Fallo</h2>
                <p>{{$incidencia->fallo}}</p>        
        </td>
        <td>
            <h2>Tipo</h2>
                <p>{{$incidencia->tipo}}</p> 
        </td>    
    </tr>
    <tr>
        <td>
            <h2>Descripción</h2>
                <p>{{$incidencia->descripcion}}</p>
        </td>
    </tr>
          
</table> 
<!--   
                                  
    <h1>
        Archivos adjuntos
    </h1>                  
        <h2>
            Adjunto 1
        </h2>         
            <div>
                <img src="{{asset('images/incidencias/'.$incidencia->imagen1)}}" alt="{{$incidencia->imagen3}}"  style="width: 100px;height:100px;" />                        
            </div>
        <h5>
            Adjunto 2
        </h5> 
            <div>
                <img src="{{asset('images/incidencias/'.$incidencia->imagen2)}}" alt="{{$incidencia->imagen2}}"  style="width: 100px;height:100px;" />             
            </div>
        <h5>
            Adjunto 3
        </h5> 
            <div>
                <img src="{{asset('images/incidencias/'.$incidencia->imagen3)}}" alt="{{$incidencia->imagen3}}"  style="width: 100px;height:100px;" />              
            </div>-->      
</body>
        