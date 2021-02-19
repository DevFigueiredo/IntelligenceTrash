<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TrashTeamUsersModel;
use App\Models\TeamPermissions;
use App\Models\TeamViewsPermissionsModel;

use Illuminate\Support\Facades\DB;

class TrashTeamUsersController extends Controller
{



    /*public function __construct()
    {
    //$this->middleware('UserPermissions');    
     }*/
 



    function create(Request $request)
    {
        $description = $request->input('description');
        $status = $request->input('status');


        $TrashTeamUsers = new TrashTeamUsersModel;
        $TrashTeamUsers->trash_team_description = $description;
        $TrashTeamUsers->status = $status;
        $TrashTeamUsers->save();
        return $TrashTeamUsers->get();
    }
    
    function update(Request $request){
        $id = $request->input('id');
        $description = $request->input('description');
        $status = $request->input('status');

        $TrashTeamUsers = TrashTeamUsersModel::find($id);

        $TrashTeamUsers->trash_team_description = $description;
        $TrashTeamUsers->status = $status;

        $TrashTeamUsers->save();
        return $TrashTeamUsers::find($id);

    }
    function delete(Request $request){
        $id = $request->input('id');
        $TrashTeamUsers = TrashTeamUsersModel::find($id);
        $TrashTeamUsers->delete(); 
        return 'Deletado com Sucesso';
   
    }
    
    function index(Request $request){
        $TrashTeamUsers = new TrashTeamUsersModel;
        return $TrashTeamUsers->get();     
       }

     function show($id){
        $TrashTeamUsers = new TrashTeamUsersModel;
        return $TrashTeamUsers
        ->where('id', $id)
        ->get();     
       }


       function indexView(Request $request){
        
        return view('/team/index',['title'=>'Regiões']);

    
    }

    function IndexViewsPermissions(){
        $TeamViewsPermissions = new TeamViewsPermissionsModel;
        return $TeamViewsPermissions->get();       
     }

    function IndexPermissionsView(){
        return view('/team_permissions/index',['title'=>'Permissões do Sistema']);
    }

    public static function ShowPermissions($id){
    
 return $permissions = DB::select("SELECT a.id_team, c.trash_team_description,a.id_permission, b.view_permission 
FROM team_permissions as a
LEFT JOIN team_view_permissions as b on b.id=a.id_permission
LEFT JOIN trash_team_users as c on c.id=a.id_team WHERE a.id_team=$id;");
    }



    function CreatePermissionsView(Request $request){
        $permissions = $request->input();
        $id_team = $request->input()[0]["id_team"];
        TeamPermissions::where('id_team', $id_team)->delete();
        foreach($permissions as $permission){
            $TeamPermissions = new TeamPermissions;
            $TeamPermissions->id_team=$permission['id_team'];
            $TeamPermissions->id_permission=$permission['id_permission'];
           $TeamPermissions->save();
    }

         return $TeamPermissions->get();     
    }
}
