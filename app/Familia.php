<?php



namespace App;



use Illuminate\Database\Eloquent\Model;



class Familia extends Model

{



    protected $fillable = ['nomfam','imagen','claparent','slug','grupo','baja_web'];



    public function padre(){

        //pertenece a
        return $this->belongsTo('App\Familia','claparent');

    }    



    public function categorias(){       

        //tiene muchas categorias
        return $this->hasMany('App\Familia','claparent')->orderBy('orden'); 

    }



    public function articulos(){

        //tiene muchas categorias
        return $this->hasMany('App\Articulo');

    }



}

