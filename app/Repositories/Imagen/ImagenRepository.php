<?php

namespace App\Repositories\Imagen;

use App\Articulo;
use App\Imagen;
use App\Repositories\BaseRepository;

class ImagenRepository extends BaseRepository{

    public function getModel(){

        return new Imagen();
    }

    public function getArticuloListImagenes(Articulo $articulo){

        return $articulo->imagenes;
    }

    public function UpdateImagen($object, $data){

        if($data->nombre){

            $exploded = explode(',' , $data->nombre);
            $decoded = base64_decode($exploded[1]);

            if(str_contains($exploded[0], 'jpeg')){
                $extension = 'jpg';
            } else{
                $extension = 'png';
            }

            $fileNane = str_random().'.'.$extension;
            $path = public_path().'/images/articulos/'.$fileNane;
            file_put_contents($path,$decoded);

            $object->nombre = $fileNane;
            $object->save();
        }

        return response()->json([
            'message' => 'Imagen modificada con exito'
        ], 201);

    }

    public function RemoveImagen($object){

        $object->nombre = 'PND.jpg';
        $object->save();

        return response()->json([
            'message' => 'La imagen fue elimina con exito'
        ], 201);
    }

    


}
