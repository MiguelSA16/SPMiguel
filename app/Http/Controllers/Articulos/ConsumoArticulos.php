<?php

namespace App\Http\Controllers\Articulos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DateTime;
use  Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ConsumoArticulos extends Controller
{
    public function __invoke(Request $request)
    {
        if($request->ajax()){
            $fecha_actual = Carbon::now()->format('Y-m-d');  
            $fecha_inicio = Carbon::now()->subMonths(12)->format('Y-m-d');

            //return $fecha_inicio;

            $consumo =  DB::table('articulos') 
            ->join('movalm','movalm.claart','=','articulos.id')
            ->join('familias as t2','t2.id','=','articulos.familia_id')
            ->join('proveedo','proveedo.clapro','=','articulos.clapro')
            ->select('articulos.id','articulos.codigo','articulos.nombre','articulos.familia_id','proveedo.nombre as proveedor', 'articulos.baja','t2.nomfam as subfamilia',
                   
                DB::raw('ABS(SUM(cantidad)) as cons_12_mes'),
                DB::raw('ABS(round(SUM(cantidad)/12)) as cons_med_mes'),
                DB::raw('ABS((round(SUM(cantidad)/12)*6)) as avisar'),
                DB::raw('ABS((round(SUM(cantidad)/12)*5)) as pedir'),
                DB::raw('(SELECT nomfam FROM familias WHERE t2.claparent = id) as familia'),
                DB::raw('(SELECT nomfam FROM familias WHERE id = (SELECT claparent FROM familias WHERE t2.claparent = id))  AS padre')                                 
            )
            //->selectRaw('SUM(movalm.cantidad) as total')
            ->where('articulos.baja', '!=' ,'1')
            ->where('movalm.tipo', '!=' ,'5')
            ->where('fecha', '<=', $fecha_actual)
            ->where('fecha', '>=', $fecha_inicio)
            ->where('cantidad','<',0)
            ->where('articulos.familia_id','!=','80315')
            ->groupBy('articulos.id')
            ->get();

            //return $consumo;

            return response()->json([
                'consumo' => $consumo
            ], 200);
        }
        
        

        
    }
}