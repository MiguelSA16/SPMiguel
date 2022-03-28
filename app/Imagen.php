<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    //
    protected $fillable = ['articulo_id','nombre','tipo'];
    protected $hidden = ['created_at','updated_at'];
}
