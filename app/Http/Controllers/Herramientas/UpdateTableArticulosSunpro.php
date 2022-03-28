<?php

namespace App\Http\Controllers\Herramientas;

use App\Articulo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UpdateTableArticulosSunpro extends Controller
{
    
    public function __invoke(Request $request)
    {
        //Añadir articulos
        $new_articulos = DB::table('articulos_s')
            ->whereNotIn('claart', DB::table('articulos')->select('id'))
            ->get();

        //Actualizar NOMBRE
        $actualizar_nombre = Articulo::select('articulos.*','articulos_s.nombre as nombresunpro')
        ->join('articulos_s','articulos.id','=','articulos_s.claart')
        ->get();

        //Actualizar Descripcion
        $actualizar_descripcion = Articulo::select('articulos.*','articulos_s.descripcion_articulo as descsunpro')
        ->join('articulos_s','articulos.id','=','articulos_s.claart')
        ->get();

        //Actualizar Ficha Tecnica
        $actualizar_pdf = Articulo::select('articulos.*','articulos_s.pdf_articulo as pdfsunpro')
        ->join('articulos_s','articulos.id','=','articulos_s.claart')
        ->get();

        //Actualizar Imagen
        $actualizar_imagen = Articulo::select('articulos.*','articulos_s.imagen_articulo as imagensunpro')
        ->join('articulos_s','articulos.id','=','articulos_s.claart')
        ->get();

        //Actualizar familia
        $actualizar_familia = Articulo::select('articulos.*','articulos_s.clafam as clafamsunpro')
        ->join('articulos_s','articulos.id','=','articulos_s.claart')
        ->get();

        //return $actualizar_pdf;


        return 
            view('admin.herramientas.actualizar_sunpro',
            compact('new_articulos','actualizar_nombre','actualizar_descripcion','actualizar_pdf','actualizar_imagen',
                    'actualizar_familia'));
    
    }
}
