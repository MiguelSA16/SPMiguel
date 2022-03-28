<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EsOperario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        $check =  Auth::check();



        if ($check) {

            if(!$user->esOperario()){            

                return redirect('/');    

            }

        }else {

            return redirect('/'); 

        }        

        return $next($request);
    }
}
