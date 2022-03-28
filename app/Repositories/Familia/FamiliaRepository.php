<?php

namespace App\Repositories\Familia;

use App\Familia;
use App\Repositories\BaseRepository;

class FamiliaRepository extends BaseRepository{

    public function getModel()
    {
        return new Familia();
    }

    public function updateFamilia($object , $data){
        
        if($data->imagen){
            $exploded = explode(',' , $data->imagen);
            $decoded = base64_decode($exploded[1]);

            if(str_contains($exploded[0], 'jpeg')){
                $extension = 'jpg';
            }else{
                $extension = 'png';
            }


            //$fileNane = str_random().'.'.$extension;
            $fileNane =  str_slug($data->nomfam).'-'.$data->id.'.'.$extension;
            
            //$path = public_path().'/images/familias/'.$fileNane;  
            $path = '/home/gj1ldjyb/public_html/images/familias/'.$fileNane;
            file_put_contents($path,$decoded);

            $object->imagen = $fileNane;
        }

        $object->fill($data->except('imagen'));
        $object->save();

        return response()->json([
            'message' => 'Familia actualizada con exito'
        ], 201);     
    }
}

