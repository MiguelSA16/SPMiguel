<?php

namespace App\Http\Controllers\Imagenes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Imagen\ImagenRepository;

class ListImagenes extends Controller
{
    protected $imagenRepository;

    public function __construct(ImagenRepository $imagenRepository)
    {
        $this->imagenRepository = $imagenRepository;
    }

    public function __invoke(Request $request){
        
        if($request->ajax()){
            
            $imagenes = $this->imagenRepository->getAll();
            return response()->json([   
                'imagenes' => $imagenes
            ], 200);
        }
    }
}
