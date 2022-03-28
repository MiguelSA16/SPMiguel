<?php

namespace App\Http\Controllers\Clientes;

use App\Cliente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListarClientes extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if($request->ajax()){

            

            $clientes = Cliente::all() ;



            return response()->json([

                'clientes' => $clientes

            ],200);

        }
    }
}
