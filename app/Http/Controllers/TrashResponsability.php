<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\TrashResponsabilityModel;


class TrashResponsability extends Controller
{

/*
    public function __construct()
    {
     $this->middleware('UserPermissions');    
     }
 */


    public function create(Request $request, $team_id)
    {
       $responsabilities = $request->input();
        
        $TrashResponsabilityDelete = TrashResponsabilityModel::where('id_team', $team_id)->delete();

        foreach($responsabilities as $responsability){
            $TrashResponsability = new TrashResponsabilityModel;
            $TrashResponsability->id_team=$responsability['id_team'];
            $TrashResponsability->id_trash=$responsability['id_trash'];
            $TrashResponsability->id_region=$responsability['id_region'];
           $TrashResponsability->save();
    }
        return $TrashResponsability->get();
        
    }
    
    function update(Request $request){
        
        $id_team = $request->input('id_team');
        
        $id_trash = $request->input('id_trash');
        
        $id_trash = $request->input('id_trash');
        
        $id = $request->input('id');
        $TrashResponsability = TrashResponsabilityModel::find($id);
        $TrashResponsability->id_team = $id_team;
        $TrashResponsability->id_trash = $id_trash;
        $TrashResponsability->id_region = $id_region;
        $TrashResponsability->save();
                return $TrashTeamUsers::find($id);

    }



    function delete(Request $request){
        
   
    }
    function show($id){
        
    }
    
    function indexView(){
        return view('/responsability/index',['title'=>'Responsabilidade do Time']);
    }


function indexResponsabilityTeam($team_id){
    
    $responsabilitiesTrash = DB::select("SELECT 
    b.id as id_trash, b.trash_name as trash_name,
    c.id as id_region, c.trash_regions_description as region_name,
    d.id as id_team, d.trash_team_description as team_name
    FROM responsability as a
    LEFT JOIN trash as b on a.id_trash=b.id
    LEFT JOIN trash_regions as c on a.id_region=c.id
    LEFT JOIN trash_team_users as d on a.id_team=d.id
    WHERE id_team=$team_id;
    ");
    return $responsabilitiesTrash;
}
    
    function index(){
            $responsabilities = DB::select("SELECT 
            b.id as id_trash, b.trash_name as trash_name,
            c.id as id_region, c.trash_regions_description as region_name,
            d.id as id_team, d.trash_team_description as team_name
            FROM responsability as a
            LEFT JOIN trash as b on a.id_trash=b.id
            LEFT JOIN trash_regions as c on a.id_region=c.id
            LEFT JOIN trash_team_users as d on a.id_team=d.id;
            ");
            return $responsabilities;
            
        

    }
}
