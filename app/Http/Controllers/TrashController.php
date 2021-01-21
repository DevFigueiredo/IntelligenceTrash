<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


use App\Models\TrashModel;

use App\Models\TrashCapacityModel;


class TrashController extends Controller
{
    public function create(Request $request)
    {
        $trash_name = $request->input('trash_name');
        $trash_latitude = $request->input('trash_latitude');
        $trash_longitude = $request->input('trash_longitude');
        $trash_address = $request->input('trash_address');
        $trash_status = $request->input('trash_status');
        $id_trash_region = $request->input('id_trash_region');
        $id_trash_organization = $request->input('id_trash_organization');
        $Trash = new TrashModel;
        $Trash->trash_name = $trash_name;
        $Trash->trash_latitude = $trash_latitude;
        $Trash->trash_longitude = $trash_longitude;
        $Trash->trash_address = $trash_address;
        $Trash->trash_status = $trash_status;
        $Trash->id_trash_region = $id_trash_region;
        $Trash->id_trash_organization = $id_trash_organization;
        $Trash->save();

        //Após Cadastrar a Lixeira acima, nós inserimos a capacidade primária atual dela, começando em 0
        $TrashCapacity = new TrashCapacityModel();
        $TrashCapacity->trash_capacity_used = 0;
        $TrashCapacity->id_trash = $Trash->id;
        $TrashCapacity->save();


        return $Trash->get();
    }
    
    function update(Request $request){
        $id = $request->input('id');
        $trash_name = $request->input('trash_name');
        $trash_latitude = $request->input('trash_latitude');
        $trash_longitude = $request->input('trash_longitude');
        $trash_address = $request->input('trash_address');
        $trash_status = $request->input('trash_status');
        $id_trash_region = $request->input('id_trash_region');
        $id_trash_organization = $request->input('id_trash_organization');
        $Trash = TrashModel::find($id);
        $Trash->trash_name = $trash_name;
        $Trash->trash_latitude = $trash_latitude;
        $Trash->trash_longitude = $trash_longitude;
        $Trash->trash_address = $trash_address;
        $Trash->trash_status = $trash_status;
        $Trash->id_trash_region = $id_trash_region;
        $Trash->id_trash_organization = $id_trash_organization;
        $Trash->save();
        return $Trash::find($id);

    }

    function updateCapacitY(Request $request){
        $trash_capacity_used = $request->input('trash_capacity_used');
        $id_trash = $request->input('id_trash');
         
        TrashCapacityModel::where('id_trash', $id_trash)
        ->update(['trash_capacity_used' => $trash_capacity_used]);

        return TrashCapacityModel::where('id_trash', $id_trash)        
        ->get();
    }


    function delete(Request $request){
        $id = $request->input('id');
        $TrashCapacity = TrashCapacityModel::where('id_trash', $id)->delete();
        $Trash = TrashModel::find($id);
        $Trash->delete(); 
        return 'Deletado com Sucesso';
   
    }
    function show($id){
        return DB::table('trash')
        ->leftJoin('trash_capacity_used', 'trash.id', '=', 'trash_capacity_used.id_trash')
        ->select('trash.*', 'trash_capacity_used.trash_capacity_used')
        ->get()
        ->where('id', $id);
    }
    
    function index(Request $request){
        return DB::table('trash')
        ->leftJoin('trash_capacity_used', 'trash.id', '=', 'trash_capacity_used.id_trash')
        ->select('trash.*', 'trash_capacity_used.trash_capacity_used')
        ->get();

    }

}
