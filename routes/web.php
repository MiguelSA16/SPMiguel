<?php

//Rutas Front

Route::get('/'                                  , 'FrontController@index');
Route::get('nuestros-productos'                 , 'FrontController@nuestros_productos');

Route::get('familia/{url_familia}/categorias'   , 'FrontController@get_categorias');
Route::get('familia/{url_familia}/articulos'    , 'FrontController@get_articulos')->name('ver-articulo');

Route::get('articulo/{url_articulo}/ver'        , 'FrontController@ver_articulo');

//Contactanos
Route::view('contactanos'                       , 'front.contactanos')->name('contacto');
Route::post('contactanos'                       , 'FrontController@contactanos');

//Newsletter
Route::post('newsletter'                        , 'FrontController@newsletter');
Route::get('confirmar-newletter/{id}'           , 'FrontController@confirmar_newletter');

Route::get('email-newsletter', function (){
    return view ('mails.newsletter');
});

//Descargas
Route::view('descargas'                         , 'comun.front.descargas');

//Ofertas
Route::get('ofertas'                            , 'FrontController@ofertas');

//politicas de privacidad
Route::view('politica-privacidad'               , 'comun.front.politica-privacidad')->name('privacidad');
Route::view('aviso-legal'                       , 'comun.front.aviso-legal')->name('aviso');
Route::view('cookies'                           , 'comun.front.cookies')->name('cookies');

//Busqueda
Route::get('search'                             , 'FrontController@buscar' );

//lenguaje
App:: setLocale('es');

Auth::routes();
Route::get('/home'                              , 'HomeController@index')->name('home');

//incidencias
//Route::get('incidencias'                            , 'FrontController@incidencias');

Route::prefix('cliente')->middleware('EsCliente')->name('cliente.')->group(function(){

    Route::get  ('/incidencias'                     ,'Incidencia\IncidenciaController@index')    ->name('incidencias');
    Route::get  ('/incidencias/create'              ,'Incidencia\IncidenciaController@create')   ->name('incidencias.create');
    Route::post ('/incidencias'                     ,'Incidencia\IncidenciaController@store')    ->name('incidencias');
    Route::get  ('/incidencias/{id}'                ,'Incidencia\IncidenciaController@show')     ->name('incidencias.show');
    Route::get  ('/incidencias/{id}/edit'           ,'Incidencia\IncidenciaController@edit')     ->name('incidencias.edit');    
    Route::put  ('/incidencia/update/{id}'          ,'Incidencia\IncidenciaController@update')   ->name('incidencias.update');        
    Route::get  ('/incidencias/descargar/{id}'      ,'Incidencia\IncidenciaController@descargar');
    Route::get  ('/incidencias/descargarPDF/{id}'   ,'Incidencia\IncidenciaController@descargarPDF');
});

Route::prefix('operario')->middleware('EsOperario')->name('operario.')->group(function(){

    Route::get  ('/incidencias'                     ,'Incidencia\IncidenciaController@index')   ->name('incidencias');   
    Route::get  ('/incidencias/create'              ,'Incidencia\IncidenciaController@create')  ->name('incidencias.create');
    Route::post ('/incidencias'                     ,'Incidencia\IncidenciaController@store')   ->name('incidencias'); 
    Route::get  ('/incidencias/{id}'                ,'Incidencia\IncidenciaController@show')    ->name('incidencias.show');
    Route::get  ('/incidencias/{id}/edit'           ,'Incidencia\IncidenciaController@edit')    ->name('incidencias.edit');
    Route::put  ('/incidencia/update/{id}'          ,'Incidencia\IncidenciaController@update')  ->name('incidencias.update');   
    Route::get  ('/incidencias/descargarPDF/{id}'   ,'Incidencia\IncidenciaController@descargarPDF');
    Route::get  ('/incidencias/solucionar/{id}'   ,'Incidencia\IncidenciaController@solucionar');

});


//Rutas Admintrador
Route::prefix('admin')->middleware('EsAdmin')->name('admin.')->group(function(){

    //rutas incidencias
    Route::get('/','AdministradorController@index'); 

    //Articulos
    Route::view('/'                                         , 'admin.index')->name('index');  
    Route::view('/articulos/alta'                           , 'admin.articulos.alta')->name('articulos-alta');
    Route::view('/articulos/baja'                           , 'admin.articulos.baja')->name('articulos-baja');
    Route::view('/articulos/stock'                          , 'admin.articulos.stock')->name('articulos-stock');
    Route::view('/articulos/fabricacion'                    , 'admin.articulos.fabricacion')->name('articulos-fabricacion');

    //Familias
    Route::view('/familias'                                 , 'admin.familias.index')->name('familias');

    //Users
    Route::view('/users'                                    , 'admin.users.index')->name('users');

    //Herramientas
    Route::view('/herramientas/agrupar'                     , 'admin.herramientas.agrupar_articulos')   ->name('agrupar');
    Route::get('/herramientas/actualizar_familias'          , 'Herramientas\UpdateTableFamilias')       ->name('updTableFamilia');
    Route::get('/herramientas/actualizar_articulos'         , 'Herramientas\UpdateTableArticulos')      ->name('upTableArticulo');
    Route::get('/herramientas/actualizar_mov_almacen'       , 'Herramientas\UpdateTableMovAlm')         ->name('upTableAlmacen');
    Route::get('/herramientas/actualizar_articulos_sun'     , 'Herramientas\UpdateTableArticulosSunpro')->name('upTableSunpro');
    Route::get('/herramientas/actualizar_familias_sun'      , 'Herramientas\UpdateTableFamiliasSunpro') ->name('upTableFamSunpro');

    //Route::get('/imagenes/cargar','AdministradorController@cargar_imagenes');

});



//Route::get('/cambio', 'FrontController@cambio');
/*Route::get('/token',function(){
    
    return str_random(60);
    
});
*/
