<?php

namespace App\Http\Controllers\Herramientas;

use App\Articulo;
use App\Articulo_clg;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UpdateTableArticulos extends Controller
{
    public function __invoke(Request $request)
    {
        ini_set('memory_limit', '-1');

        //return Articulo_clg::first();

        $new_articulos = DB::table('articulos_clg')
            ->whereNotIn('claart', DB::table('articulos')->select('id'))
            ->get();

        //Borrar articulo
        $borrar_articulo = Articulo::select('*')
        ->WhereNotIn('id' ,DB::table('articulos_clg')->select('claart'))
        ->get();

        //Actualizar PVP1
        $actualizar_pvp1 = Articulo::select('articulos.*','articulos_clg.pvp1 as pvp1clasic')
        ->join('articulos_clg','articulos.id','=','articulos_clg.claart')
        ->get();

        //Actualizar PVP1IVA
        $actualizar_pvp1iva = Articulo::select('articulos.*','articulos_clg.pvp1iva as pvp1ivaclasic')
        ->join('articulos_clg','articulos.id','=','articulos_clg.claart')
        ->get();

        //Actualizar PVP2
        $actualizar_pvp2 = Articulo::select('articulos.*','articulos_clg.pvp2 as pvp2clasic')
        ->join('articulos_clg','articulos.id','=','articulos_clg.claart')
        ->get();

        //Actualizar PVP2IVA
        $actualizar_pvp2iva = Articulo::select('articulos.*','articulos_clg.pvp2iva as pvp2ivaclasic')
        ->join('articulos_clg','articulos.id','=','articulos_clg.claart')
        ->get();

        //Actualizar refpro
        $actualizar_refprov = Articulo::select('articulos.*','articulos_clg.refprov as refprovclasic')
        ->join('articulos_clg','articulos.id','=','articulos_clg.claart')
        ->get();

        //Actualizar NOMBRE
        $actualizar_nombre = Articulo::select('articulos.*','articulos_clg.nombre as nombreclasic')
        ->join('articulos_clg','articulos.id','=','articulos_clg.claart')
        ->get();

        //Actualizar codigo
        $actualizar_codigo = Articulo::select('articulos.*','articulos_clg.codigo as codigoclasic')
        ->join('articulos_clg','articulos.id','=','articulos_clg.claart')
        ->get();

        //actualizar clapro
        $actualizar_clapro = Articulo::select('articulos.*','articulos_clg.clapro as claproclasic')
        ->join('articulos_clg','articulos.id','=','articulos_clg.claart')
        ->get();

        //actualizar familias
        $actualizar_familia = Articulo::select('articulos.*','articulos_clg.clafam as familiaidclasic')
        ->join('articulos_clg','articulos.id','=','articulos_clg.claart')
        ->get();

        //actualizar baja
        $actualizar_baja = Articulo::select('articulos.*','articulos_clg.baja as bajaclasic')
        ->join('articulos_clg','articulos.id','=','articulos_clg.claart')
        ->get();

        //agregar slug
        $actualizar_slug = Articulo::where('slug','-')
        ->get();

        

        return 
            view('admin.herramientas.actualizar_articulos', 
            compact('new_articulos','borrar_articulo','actualizar_pvp1','actualizar_pvp2','actualizar_refprov','actualizar_nombre','actualizar_codigo','actualizar_clapro','actualizar_familia','actualizar_baja','actualizar_slug','actualizar_pvp1iva','actualizar_pvp2iva'));
    }
}
