<?php

namespace App\Http\Controllers\Articulos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Articulo\ArticuloRepository;



class GroupArticulo extends Controller
{
    protected $ariculosResposiroty;

    public function __construct(ArticuloRepository $articuloRepository)
    {
        $this->ariculosResposiroty = $articuloRepository;
    }

    public function __invoke(Request $request)
    {
        if($request->ajax()){

            $response = $this->ariculosResposiroty->GroupArticulo($request);
            return $response;
        }
    }
}
