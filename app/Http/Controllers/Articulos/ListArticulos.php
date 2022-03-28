<?php

namespace App\Http\Controllers\Articulos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Articulo\ArticuloRepository;

class ListArticulos extends Controller
{
    protected $articuloRepository;

    public function __construct(ArticuloRepository $articuloRepository )
    {
        $this->articuloRepository = $articuloRepository;
    }

    public function __invoke(Request $request)
    {
        return $this->articuloRepository->getAll();
    }
}
