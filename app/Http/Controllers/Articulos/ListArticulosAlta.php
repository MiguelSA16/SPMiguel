<?php

namespace App\Http\Controllers\Articulos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Articulo\ArticuloRepository;

class ListArticulosAlta extends Controller
{
    
    protected $artRepository;

    public function __construct(ArticuloRepository $articuloRepository )
    {
        $this->artRepository = $articuloRepository;
    }

    public function __invoke(Request $request)
    {
        if($request->ajax()){
 
            $response = $this->artRepository->getListAticulosAlta();
            return $response;
        }       
    }
}
