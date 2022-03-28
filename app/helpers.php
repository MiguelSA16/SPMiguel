<?php

use App\Albaran;
use App\Articulo;
use App\Cliente;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

function setShow($routeName){

    return request()->routeIs($routeName) ? 'show' : '';
}

function setactive($routeName){

    return request()->routeIs($routeName) ? 'active' : '';
}

function nombreArticulo($ref){        

    $articulo = Articulo::where('codigo', $ref)->first();
    return $articulo->nombre;
}

function nombreCliente($clacli){

    $cliente =  Cliente::where('clacli',$clacli)->first();
    return $cliente->nombre;
}    

function nombreClientex($clacli){

    $cliente =  Cliente::where('clacli',$clacli)->first();
    $nombreCortado = substr( $cliente->nombre, 0,10);   
    return  $nombreCortado ;
}    

function nombreUsuario($user_id){

    $user =  User::where('id',$user_id)->first();
    return $user->name;
}

function precioCliente($cliente,$articulo_codigo){
    
    //$albaran = Albaran::where('clacli',61)->get();
    //$albaran = DB::table('albaran')

    $albaran = Albaran::select('albaranl.claalbl','albaran.clacli', 'albaranl.codigo','albaranl.lindesc', 'albaranl.precio','albaranl.cantidad','albaranl.dto','albaran.fecha')
        ->join('albaranl','albaran.claalb','=','albaranl.claalb')
        ->where('albaran.clacli', $cliente)
        ->where('albaranl.codigo',$articulo_codigo)
        ->orderByDesc('albaranl.claalbl')
        ->first();

    if($albaran){
        $precioDecimal= $albaran->precio;
        $precioDecimal = str_replace(',', '.', $precioDecimal); 
        $precioDecimal =  number_format($precioDecimal, 2, '.', '');
        return $precioDecimal;
    }
    else{
        return null;
    }

    
}