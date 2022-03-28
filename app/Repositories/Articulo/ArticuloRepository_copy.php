<?php

namespace App\Repositories\Articulo;

use App\Articulo;
use App\Http\Resources\Articulo as AppArticulo;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\MessageReceived;

class ArticuloRepository extends BaseRepository{

    public function getModel(){

        return new Articulo();
    }

    public function getListAticulosAlta(){

        $articulo =  Articulo::where('baja','0')
        ->get();

        return response()->json([
            'articulos' => $articulo
        ], 200);
    }

    public function getListAticulosStock(){

        $articulo =  DB::table('articulos')         
        ->join('movalm','articulos.id','=','movalm.claart')    
        ->select('articulos.id', 'articulos.nombre', DB::raw('SUM(movalm.cantidad) as total'))   
        ->where('baja','0')
        ->groupBy('articulos.id')
        ->get();         
        return response()->json([
            'articulos' => $articulo
        ], 200);
    }

    public function getListAticulosBaja(){

        $articulo = Articulo::where('baja','1')->get();

        return response()->json([
            'articulos' => $articulo
        ], 200);

    }

    public function getArticuloResources($id){

        return new AppArticulo(Articulo::find($id)); 
    }

    public function updateArticulo($object, $data){

        //return $data->id;

        if($data->pdf){

            $exploded = explode(',' , $data->pdf);
            $decoded = base64_decode($exploded[1]);             

            if(str_contains($exploded[0], 'pdf')){
                $extension = 'pdf';
            }

            //return str_slug($object->codigo);

            

            $fileNane = str_slug($object->codigo).'.'.$extension;           
            $path = public_path().'/pdfs/'.$fileNane;
            //$path = '/home/gj1ldjyb/public_html/pdfs/'.$fileNane;
            file_put_contents($path,$decoded);

            //$object->fill($data->all());
            $object->pdf = $fileNane;
            //$object->save();
        
        }
        
        if($data->imagen){
            $exploded = explode(',' , $data->imagen);
            $decoded = base64_decode($exploded[1]);

            if(str_contains($exploded[0], 'jpeg')){
                $extension = 'jpg';
            }else{
                $extension = 'png';
            }

            $fileNaneImagen = str_slug($object->codigo).'.'.$extension;
            $path = public_path().'/images/articulos/'.$fileNaneImagen;
            return public_path();
            file_put_contents($path,$decoded);

            $object->imagen = $fileNaneImagen;
        }

        //enviar Email
        //Mail::to('daniel@sunprored.es')->queue(new MessageReceived($data));
        
        $object->fill($data->except('imagen','pdf'));
        $object->save();

        return response()->json([
            'message' => 'Articulo actualizado con exito'
        ], 201);        
    }

    public function GetLisMovAlm($object){

        $movimientos = $object->movalm;

        return response()->json([

            'movalm' => $movimientos
        ], 200);
        
    }

    public function GroupArticulo($data){

        Articulo::where('familia_id',$data->get('familia_id'))
            ->where($data->get('columna'),'like',$data->get('buscar'))
            ->update([
                'grupo'=>$data->get('grupo'),
                'color'=>$data->get('color')
            ]);

        return response()->json([
            'message' => 'El articulo se agrupo con exito'
        ], 201);
    }

}
