<?php

namespace App\Http\Controllers\Imagenes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Articulo\ArticuloRepository;
use App\Repositories\Imagen\ImagenRepository;


class GetArticuloListImagenes extends Controller
{
    
    protected $imagenRepository;
    protected $articuloRepository;

    public function __construct( ImagenRepository $imagenRepository, ArticuloRepository $articuloRepository){

        $this->imagenRepository = $imagenRepository;  
        $this->articuloRepository = $articuloRepository;      
    }

    public function __invoke($id, Request $request){

        if($request->ajax()){

            $imagenes = $this->imagenRepository->getArticuloListImagenes($this->articuloRepository->find($id));
            return response()->json([

                'imagenes' => $imagenes

            ], 200);

        }
    }
}
