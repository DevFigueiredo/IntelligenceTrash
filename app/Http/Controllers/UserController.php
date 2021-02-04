<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\UserModel;

class UserController extends Controller
{

    public function __construct()
    {
     $this->middleware('UserPermissions');    
     }
 

 

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

   
    function show($id){
        return DB::table('users')
        ->leftJoin('trash_team_users', 'users.id_trash_team', '=', 'trash_team_users.id')
        ->select('users.*', 'trash_team_users.trash_team_description')
        ->where('users.id', $id)
        ->get();
    }
    








    /*Autenticação do Usuário abaixo */

    public function Login(Request $request){
        $user = $request->input('user');
        $password = $request->input('password');
    

        if(isset($user) && $password){
    
       $login = ["user"=>$user];

       $request->session()->put('login', $login);


       return response("Login: OK", 200);
       
    
    
    
    }else{
            $request->session()->flush();
            return response("Erro no Login",404);
        }
        
    
    }




    public function Logout(Request $request){
        $request->session()->flush();
        return response('Deslogado com Sucesso!', 200);
    
    }





















}



