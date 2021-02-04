<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
       
      $userData = findUser($user);
    
     $login = ["user"=>$userData[0]->user, "name"=>$userData[0]->name, "id"=>$userData[0]->id, "id_trash_team"=>$userData[0]->id_trash_team];
     
     if($password === $userData[0]->password){
       $request->session()->put($login);
       return redirect('/dashboard');
     //  return $next($request);
  
    }else{
          $request->session()->flush();
          return redirect('/');

      }
     
        
       

    }

   
}
 function findUser($user){
    return DB::table('users')
        ->leftJoin('trash_team_users', 'users.id_trash_team', '=', 'trash_team_users.id')
        ->select('users.*', 'trash_team_users.trash_team_description')
        ->where('users.user', $user)
        ->get();
    
    }