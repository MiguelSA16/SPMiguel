<?php

namespace App\Http\Controllers\Articulos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Articulo\ArticuloRepository;

class GetArticulo extends Controller
{
    
    protected $artRepository;

    public function __construct( ArticuloRepository $articuloRepository)
    {
        $this->artRepository = $articuloRepository;
    }

    public function __invoke($id, Request $request ){

        if($request->ajax()){
            
            $articulo = $this->artRepository->getArticuloResources($id);
            
            return response()->json([

                'articulo' => $articulo
            ], 200);
        }
    }
}
