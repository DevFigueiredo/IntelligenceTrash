<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {      
//DESABILITAR A OPÇÃO
    //return response($request->session()->get('id'));
        if($request->session()->get('id')==true)
      return $next($request);
      else 
      return redirect('/');
    
    
    }
}
