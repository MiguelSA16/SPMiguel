<?php



namespace App\Http\Controllers\Users;

use App\Cliente;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\User;

class UpdateUser extends Controller

{
    public function __invoke(User $user, Request $request)

    {

        
        if($request->get('cliente_id') !='' AND $request->get('cliente_id') !='SIN CLIENTE'){
            $cliente =  Cliente::where('nombre', $request->get('cliente_id'))->first();
            $user->cliente_id = $cliente->clacli;
        }
        if($request->get('cliente_id') =='SIN CLIENTE'){
            $user->cliente_id = 0;
        }

        $user->fill($request->except('cliente_id'));

        $user->update();
        

            return response()->json([

                'message' => 'Este usuario fue modificado'

            ], 201); 


    }

}

