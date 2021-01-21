<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TrashTeamUsersModel;

class TrashTeamUsersController extends Controller
{
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
}
