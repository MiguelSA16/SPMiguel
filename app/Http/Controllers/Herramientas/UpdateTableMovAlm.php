<?php

namespace App\Http\Controllers\Herramientas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Movalm;
use Illuminate\Support\Facades\DB;

class UpdateTableMovAlm extends Controller
{
    public function __invoke(Request $request)
    {
        $new_movalm_clg = DB::table('movalm_clg')
            ->whereNotIn('clamov', DB::table('movalm')->select('clamov'))
            ->get();

        $borrar = DB::table('movalm')
        ->whereNotIn('clamov', DB::table('movalm_clg')->select('clamov as clamovClassic'))
        ->get();     

        return 
            view('admin.herramientas.actualizar_movalm',
        compact('new_movalm_clg','borrar'));
    }
}
