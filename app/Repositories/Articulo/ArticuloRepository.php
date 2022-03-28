<?php

namespace App\Repositories\Articulo;

use App\Articulo;
use App\Http\Resources\Articulo as AppArticulo;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\MessageReceived;
use Illuminate\Support\Str;

class ArticuloRepository extends BaseRepository{

    public function getModel(){

        return new Articulo();
    }

    public function getListAticulosAlta(){

        $articulo = DB::table('articulos')
        ->join('familias as t2','articulos.familia_id','t2.id')
        ->select('articulos.*','t2.nomfam as subfamilia', 
                    DB::raw('(SELECT nomfam FROM familias WHERE t2.claparent = id) as familia'),
                    DB::raw('(SELECT nomfam FROM familias WHERE id = (SELECT claparent FROM familias WHERE t2.claparent = id))  AS padre')                    
                )
        ->where('articulos.baja','0')
        ->get();

        return response()->json([
            'articulos' => $articulo
        ], 200);
    }

    public function getListAticulosStock(){

        $articulo =  DB::table('articulos')         
        ->join('movalm','articulos.id','=','movalm.claart')    
        ->select('articulos.id', 'articulos.nombre', 
                    DB::raw('SUM(movalm.cantidad) as total')
                )   
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

        //return $data->all();

        if($data->pdf){

            $exploded = explode(',' , $data->pdf);
            $decoded = base64_decode($exploded[1]);             

            if(str_contains($exploded[0], 'pdf')){
                $extension = 'pdf';
            }

            //return str_slug($object->codigo);

            

            $fileNane = Str::slug($object->codigo).'.'.$extension;           
            //$path = public_path().'/pdfs/'.$fileNane;
            $path = '/home/gj1ldjyb/public_html/pdfs/'.$fileNane;
            file_put_contents($path,$decoded);

            //$object->fill($data->all());
            $object->pdf = $fileNane;
            //$object->save();        
        }

        if($data->certificado){

            $exploded = explode(',' , $data->certificado);
            $decoded = base64_decode($exploded[1]);
            
            if(str_contains($exploded[0], 'pdf')){
                $extension = 'pdf';
            }

            //return str_slug($object->codigo);

            

            $fileNaneCertificado = Str::slug($object->codigo).'.'.$extension;           
            //$path = public_path().'/certificados/'.$fileNaneCertificado;
            $path = '/home/gj1ldjyb/public_html/certificados/'.$fileNaneCertificado;
            file_put_contents($path,$decoded);

            //$object->fill($data->all());
            $object->certificado = $fileNaneCertificado;
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
            //$path = public_path().'/images/articulos/'.$fileNaneImagen;
            $path = '/home/gj1ldjyb/public_html/images/articulos/'.$fileNaneImagen;
            file_put_contents($path,$decoded);

            $object->imagen = $fileNaneImagen;
        }
        
        $object->fill($data->except('imagen','pdf','certificado'));
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
