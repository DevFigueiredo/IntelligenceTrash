<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UserController;

class LoginMiddleware
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

       $user = $request->input('user');
       $password = $request->input('password');
       $User = new UserController;
       $UserData = $User::validateUser($user, $password);
       if($UserData){
        $request->session()->put('id', $UserData[0]['id']);
        return redirect('/dashboard');
      }

        $request->session()->flush();
        return redirect('/');


    }

   
}