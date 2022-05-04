<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterUser extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    public function __invoke(Request $request)
    {
        //flash('Ups, ya estabas registrado a nuestra web')->error()->important();
        $message = request()->validate([
            'name'    => 'required',
            'email'     => 'required|email',
            'telefono'   => 'required',
            'empresa'   => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $clave = '6Ld84mQfAAAAADIADLSHBMigtGECan84r8JXwjCT';
	
        $token = $request['token'];
        $action = $request['action'];
        
        $cu = curl_init();
        curl_setopt($cu, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($cu, CURLOPT_POST, 1);
        curl_setopt($cu, CURLOPT_POSTFIELDS, http_build_query(array('secret' => $clave, 'response' => $token)));
        curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($cu);
        //return $response;
        curl_close($cu);
        
        $datos = json_decode($response, true);

        if($datos['success'] == 1 && $datos['score'] >= 0.5){
            if($action == 'validarRegistro'){
                if(User::where('email',$request->email)->first()){                    
                    flash('Ups, ya estabas registrado a nuestra web')->error()->important();
                    return redirect('/register');
                }else{            
                    User::create([
                        'name' => $request['name'],
                        'telefono' => $request['telefono'],
                        'empresa' => $request['empresa'],
                        'email' => $request['email'],
                        'password' => Hash::make($request['password']),
                    ]);    
                    flash('Se a registrado con exito, puede hacer login')->success()->important(); 
                    return redirect('/login');
                }        
            } 
        }	
        
    }
}
