<?php

namespace App\Http\Controllers\Herramientas;

use App\Familia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UpdateTableFamiliasSunpro extends Controller
{    
    public function __invoke(Request $request)
    {
        //Añadir familias
        $new_familias = DB::table('familias_s')
            ->whereNotIn('clafam', DB::table('familias')->select('id'))
            ->get();

        //Actualizar Nombre
        $actualizar_nombre = Familia::select('familias.*','familias_s.nomfam as nombre_sunpro')
        ->join('familias_s','familias.id','=','familias_s.clafam')
        ->get();

        //Actualizar Imagen
        $actualizar_imagen = Familia::select('familias.*','familias_s.imgweb as img_sunpro')
        ->join('familias_s','familias.id','=','familias_s.clafam')
        ->get();

        return
            view('admin.herramientas.actualizar_fam_sunpro',
            compact('actualizar_nombre','actualizar_imagen'));
    }
}
