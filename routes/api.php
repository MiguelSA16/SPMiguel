<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user',function (Request $request){
    return $request->user();
});

//Articulos
//Route::get('articulos'                 ,'Articulos\ListArticulos');

Route::get('articulos-alta'                 ,'Articulos\ListArticulosAlta')->name('articulos.alta');
//Route::get('articulos-alta'                 ,'Articulos\ListArticulosAlta')->name('articulos.alta');
Route::get('articulos-with-stock'           ,'Articulos\ListArticulosWithStock');
Route::get('articulos-baja'                 ,'Articulos\ListArticulosBaja');
Route::get('articulo/{id}'                  ,'Articulos\GetArticulo');
Route::put('articulo/{articulo}'            ,'Articulos\UpdateArticulo');
Route::get('articulos-consumo'              ,'Articulos\ConsumoArticulos');

//Users

Route::get('users'                          ,'Users\ListUsers');
Route::put('user/{user}'                    ,'Users\UpdateUser');
Route::delete('user/{user}'                 ,'Users\DeleteUser');

//Clientes
Route::get('clientes'                       ,'Clientes\ListarClientes');  

//Agrupar articulo
Route::post('agrupar'                       ,'Articulos\GroupArticulo');

//Familias
Route::get('familias'                       ,'Familias\ListFamilias');
Route::put('familia/{familia}'              ,'Familias\UpdateFamilia');

//imagenes
//Route::get('imagenes'                     ,'Imagenes\ListImagenes');
Route::put('imagen/{imagen}'                ,'Imagenes\UpdateImagenes');
Route::delete('imagen/{imagen}'             ,'Imagenes\DeleteImagenes' );

//MovAlm
Route::get('movalm','Movalms\ListMovAlm');

//Articulo / Imagenes
Route::get('articulo/{id}/imagenes'         ,'Imagenes\GetArticuloListImagenes');

//Articulos / Movimientos
Route::get('articulo/{articulo}/movalm'     ,'Articulos\GetMovArticulo');

//Articulos Sin Grupo
Route::middleware('auth:api')->group(function(){

    Route::get('sin-grupo','ArticuloController@sin_grupo');
});


