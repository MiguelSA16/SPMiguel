<?php

namespace App\Http\Controllers\Herramientas;

use App\Familia;
use App\Familia_clg;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UpdateTableFamilias extends Controller
{
    
    public function __invoke(Request $request)
    {
        $new_familias = DB::table('familia_clg')
            ->whereNotIn('clafam', DB::table('familias')->select('id'))
            ->get();

        $nombre_familias = DB::table('familia_clg')
            ->whereNotIn('nomfam', DB::table('familias')->select('nomfam'))
            ->get();

        $claparent_group_familias = Familia::select('familias.*', 'familia_clg.claparent as claparent_clg', 'familia_clg.grupo as grupo_clg')
            ->join('familia_clg','familias.id','=','familia_clg.clafam')
            ->get();
        //return $claparent_group_familias;
        
        $url_familias = Familia::where('slug','-')
            ->get();

            //Borrar familias
        $borrar_familia = Familia::select('*')
        ->WhereNotIn('id' ,DB::table('familia_clg')->select('clafam'))
        ->get();

        
        return 
            view('admin.herramientas.actualizar_familias',
            compact('nombre_familias','new_familias','claparent_group_familias','url_familias','borrar_familia'));
    }
}
