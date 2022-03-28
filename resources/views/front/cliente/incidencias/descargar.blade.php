<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Document</title>

    <style>
        .titulo{
            font-size: 2rem;
            text-align: center;
            padding: 20px 0px 35px 0px;
            font-weight: 400;
        }
        .sub_titulo{
            font-size: 18px;
            font-weight: 500;
            display: block;
        }
        .pb{
            padding-bottom: 25px;
        }
        .center{
            text-align: center;
        }
        
    </style>

</head>
<body>
    <table style="width:100%" >
        <tr>
            <th  class="titulo" colspan="2" >
                Descripción  incidencia
            </th>
        </tr>
        <tr>
            <td class="pb">
                <span class="sub_titulo">
                    Proveedor/Cliente:
                </span> 
                <span>
                    {{nombreCliente(Auth::user()->cliente_id)}}
                </span>
            </td>
            <td class="pb">
                <span class="sub_titulo">
                    Fecha:
                </span> 
                <span>
                    {{$incidencia->created_at}}
                </span>
            </td>                
        </tr>
        <tr>
            <td class="pb">
                <span class="sub_titulo">
                    Referencia:
                </span> 
                <span>
                    {{$incidencia->referencia}}
                </span>
            </td>
            <td class="pb">
                <span class="sub_titulo">
                    Nombre Referencia:
                </span> 
                <span>
                    {{nombreArticulo($incidencia->referencia)}}
                </span>
            </td>                
        </tr>
        <tr>
            <td class="pb">
                <span class="sub_titulo">
                    Nº unidades:
                </span> 
                <span>
                    {{$incidencia->n_unidades}} Unidades.
                </span>
            </td>
            <td class="pb">
                <span class="sub_titulo">
                    Fallo:
                </span> 
                <span>
                    {{$incidencia->fallo}}
                </span>
            </td>                
        </tr>
        <tr>
            <td class="pb" colspan="2">
                <span class="sub_titulo">
                    Descripción:
                </span> 
                <span>
                    {{$incidencia->descripcion}} 
                </span>
            </td>               
        </tr>
        <tr>
            <td class="pb" colspan="2">
                <span class="sub_titulo">
                    Acciones correctivas:
                </span> 
                <span>
                    {{$incidencia->a_corr}} 
                </span>
            </td>               
        </tr>
    </table>
    
</body>
</html>