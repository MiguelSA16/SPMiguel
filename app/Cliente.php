<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $primarykey='clacli';

    public function user(){
        return $this->hasOne('App\User');

    }


}

