<?php



namespace App;



use Illuminate\Notifications\Notifiable;

use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Foundation\Auth\User as Authenticatable;



class User extends Authenticatable

{

    use Notifiable;

    //Relacion con ROLE
    public function role(){
        return $this->belongsTo('App\Role');
    }
    //Relacion con cliente
    public function cliente(){
        return $this->belongsTo('App\Cliente','clacli');
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   
    protected $fillable = [

        'name', 'email', 'password', 'role_id', 'telefono','empresa'

    ];



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [

        'password', 'remember_token','api_token'

    ];



    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    protected $casts = [

        'email_verified_at' => 'datetime',

    ];



    public function esAdmin(){        



        if($this->role->nombre == 'admin'){            

            return true;

        }

        return false;

    }

    public function esCliente(){        



        if($this->role->nombre == 'cliente'){            

            return true;

        }

        return false;

    }

    public function esOperario(){        



        if($this->role->nombre == 'operario'){            

            return true;

        }

        return false;

    }

}

