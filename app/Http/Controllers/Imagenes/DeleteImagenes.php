<?php

namespace App\Http\Controllers\Imagenes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imagen;
use App\Repositories\Imagen\ImagenRepository;

class DeleteImagenes extends Controller
{
    
    protected $imagenRepository;

    public function __construct(ImagenRepository $imagenRepository)
    {
        $this->imagenRepository = $imagenRepository;
    }
    
    public function __invoke(Imagen $imagen)
    {
        $response = $this->imagenRepository->RemoveImagen($imagen);
        return $response; 
    }

}
