<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\UserModel;
use App\Http\Controllers\TrashTeamUsersController;

class UserController extends Controller
{

   /* public function __construct()
    {
     $this->middleware('UserPermissions');    
     }
 */

 

    public function create(Request $request)
    {
        $name = $request->input('name');
        $user = $request->input('user');
        $password = $request->input('password');
        $id_trash_team = $request->input('id_trash_team');
        $status = $request->input('status');

        $User = new UserModel;
        $User->name = $name;
        $User->user = $user;
        $User->password = $password;
        $User->id_trash_team = $id_trash_team;
        $User->status = $status;
        $User->save();
        return $User->get();
    }
    
    function update(Request $request){
        $id = $request->input('id');
        $status = $request->input('status');
        $name = $request->input('name');
        $user = $request->input('user');
        $password = $request->input('password');
        $id_trash_team = $request->input('id_trash_team');

        $User = UserModel::find($id);

        $User->name = $name;
        $User->user = $user;
        $User->password = $password;
        $User->id_trash_team = $id_trash_team;
        $User->status = $status;
        $User->save();
      
        return $User::find($id);

    
    }
    function delete(Request $request){
        $id = $request->input('id');
        $User = UserModel::find($id);
        return $User->delete($id);

    }
    
    function index(Request $request){
        $User = new UserModel;
        return $User
        ->leftJoin('trash_team_users', 'users.id_trash_team', '=', 'trash_team_users.id')
        ->select('users.*', 'trash_team_users.trash_team_description')
        ->get();        
    }

    function indexView(Request $request){
    

        return view('/user/index',['title'=>'Usuários']);
  
    }
   
    

   public static function show($id){
        return DB::table('users')
        ->leftJoin('trash_team_users', 'users.id_trash_team', '=', 'trash_team_users.id')
        ->select('users.*', 'trash_team_users.trash_team_description')
        ->where('users.id', $id)
        ->get();
    }
    








    /*Autenticação do Usuário abaixo */
 

    public static function validateUser($user, $password){
        $userData = DB::table('users')
        ->leftJoin('trash_team_users', 'users.id_trash_team', '=', 'trash_team_users.id')
        ->select('users.*', 'trash_team_users.trash_team_description')
        ->where('users.user', $user)
        ->get();
    
         if(sizeof($userData)!=0){
            $login = ["status"=>$userData[0]->status,"user"=>$userData[0]->user, "name"=>$userData[0]->name, "id"=>$userData[0]->id, "id_trash_team"=>$userData[0]->id_trash_team];
            $UserDecoded = json_decode($userData, true);
            
            if($UserDecoded[0]["status"]==1 && $UserDecoded[0]["password"]==$password) {
                
                return $UserDecoded;

            }
                
                

             }
    
        return false;
    
       }




















}



