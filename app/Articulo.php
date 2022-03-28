<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    
    protected $fillable = ['nombre','familia_id','grupo', 'catalogo', 'color','longitud','ancho','pdf','descripcion','baja_web', 'oferta'];

    public function familia()
    {
        return $this->belongsTo('App\Familia');
    }
    public function stock(){
        $total = $this->hasMany('App\Movalm','claart')->selectRaw('*,sum(cantidad) as total');
        return $total;
    }

    public function portada(){

        return $this->hasMany('App\Imagen')->where('tipo','portada');
    }

    public function normal(){

        return $this->hasMany('App\Imagen')->where('tipo','normal');
    }

    public function imagenes(){
        return $this->hasMany('App\Imagen');
    }

    public function movalm(){

        return $this->hasMany('App\Movalm','claart');
    }

    public function scopeBuscarNombre($query, $busqueda){       

        return $query->Where('nombre','like',"%$busqueda%")
            ->where('grupo','!=','-')
            ->where('baja','0')
            ->where('familia_id','!=','80315')     //fabricacion
            ->where('familia_id','!=','80318')     //sin categorizar
            ->where('familia_id','!=','0')         //0 sin familia
            ->where('familia_id', '!=', '100007'); //no web
    }

    public function scopeBuscarCodigo($query, $busqueda){       

        return $query->orWhere('codigo','like',"%$busqueda%")
            ->where('grupo','!=','-')
            ->where('baja','0')
            ->where('familia_id','!=','80315')     //fabricacion
            ->where('familia_id','!=','80318')     //sin categorizar
            ->where('familia_id','!=','0')         //0 sin familia
            ->where('familia_id', '!=', '100007'); //no web
    }

    public function scopeColor($color, $c){       
        
        if(isset($c)){
            return $color->Where('color',$c);
        }
    }
    
    public function scopeLongitud($longitud, $l){       
        if(isset($l)){
            return $longitud->Where('longitud',$l);
        }
    }


}
