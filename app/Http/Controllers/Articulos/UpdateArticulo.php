<?php

namespace App\Http\Controllers\Articulos;

use App\Articulo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Articulo\ArticuloRepository;

class UpdateArticulo extends Controller
{
    protected $articuloRepository;

    public function __construct(ArticuloRepository $articuloRepository){
        
        $this->articuloRepository = $articuloRepository;
    }
    
    public function __invoke(Articulo $articulo ,Request $request)
    {
        $respuesta = $this->articuloRepository->updateArticulo($articulo, $request);

        return $respuesta;
    }
}
