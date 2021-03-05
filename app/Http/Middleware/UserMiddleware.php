<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use App\Http\Controllers\UserController;
use App\Http\Controllers\TrashTeamUsersController;
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

     //Verifica se existe alguma sessão ativa no sistema
      if($request->session()->get('id')==true){
          //Pego o ID do usuário que foi iniciado na sessão  
          $userID = $request->session()->get('id');
          //Busca no banco todos os dados deste usuário
            $UserData = json_decode(UserController::show($userID), true)[0];
           
           //Instancia o objeto que para realizar a busca das permissões do usuário
            $TrashTeamUsers = new TrashTeamUsersController;
            //Chama a função que busca as permissões do usuário
            $UserPermissions =  $TrashTeamUsers::ShowPermissions($UserData["id_trash_team"]);
            $Permissions = json_decode(json_encode($UserPermissions),true);
            

            $request->session()->forget('name');            
            $request->session()->push('name', $UserData["name"]);


            //Anula todas as permissões de menu da sessão
            $request->session()->forget('menu_permission');
            foreach($Permissions as $Permission){
              //Insere cada permissão de menu da sessão
              $request->session()->push('menu_permission', $Permission["id_permission"]);
        
            }
           return response(var_dump(request()->session()->get('menu_permission')));
            return $next($request);


        }else 
      return redirect('/');
    
    
    }
}
