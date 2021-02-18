<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


use App\Models\TrashModel;

use App\Models\TrashCapacityModel;


class TrashController extends Controller
{
/*
    public function __construct()
    {
     $this->middleware('UserPermissions');    
     }
 */


    public function create(Request $request)
    {
        $trash_name = $request->input('trash_name');
        $trash_latitude = $request->input('trash_latitude');
        $trash_longitude = $request->input('trash_longitude');
        $trash_address = $request->input('trash_address');
        $trash_status = $request->input('trash_status');
        $id_trash_region = $request->input('id_trash_region');
        $trash_max_support = $request->input('trash_max_support');
        $id_trash_organization = $request->input('id_trash_organization');
        $status = $request->input('status');
        $Trash = new TrashModel;
        $Trash->trash_name = $trash_name;
        $Trash->trash_latitude = $trash_latitude;
        $Trash->trash_longitude = $trash_longitude;
        $Trash->trash_address = $trash_address;
        $Trash->trash_status = $trash_status;
        $Trash->id_trash_region = $id_trash_region;
        $Trash->id_trash_organization = $id_trash_organization;
        $Trash->trash_max_support = $trash_max_support;
        $Trash->status = $status;
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
        $trash_max_support = $request->input('trash_max_support');
        $id_trash_organization = $request->input('id_trash_organization');
        $Trash = TrashModel::find($id);
        $Trash->trash_name = $trash_name;
        $Trash->trash_latitude = $trash_latitude;
        $Trash->trash_longitude = $trash_longitude;
        $Trash->trash_address = $trash_address;
        $Trash->trash_status = $trash_status;
        $Trash->trash_max_support = $trash_max_support;
        $Trash->id_trash_region = $id_trash_region;
        $Trash->id_trash_organization = $id_trash_organization;
        $Trash->save();
        return $Trash::find($id);

    }

    function AddCapacity(Request $request){
        $trash_capacity_used = $request->input('trash_capacity_used');
        $id_trash = $request->input('id_trash');
        $TrashCapacity = new TrashCapacityModel();
        $TrashCapacity->trash_capacity_used = $trash_capacity_used;
        $TrashCapacity->id_trash = $id_trash;
      
        $TrashCapacity->save();
        
       return $TrashCapacity->get();

    }


    function delete(Request $request){
        $id = $request->input('id');
        $TrashCapacity = TrashCapacityModel::where('id_trash', $id)->delete();
        $Trash = TrashModel::find($id);
        $Trash->delete(); 
        return 'Deletado com Sucesso';
    }
    
    function show($id){
        return $trashes = DB::select("SELECT 
        max(a.id) as last_capacity_id
        , a.trash_capacity_used
        ,a.created_at as last_created_capacity 
        , b.*  
        FROM trash_capacity_used  as a
        LEFT JOIN trash as b on b.id=a.id_trash
        where b.id=$id
        GROUP BY id_trash;");

    }
    
    function index(Request $request){
        $trashes = DB::select("SELECT 
        max(a.id) as last_capacity_id
        , a.trash_capacity_used
        ,a.created_at as last_created_capacity 
        , b.* 
        ,c.trash_regions_description
        FROM trash_capacity_used  as a
        LEFT JOIN trash as b on b.id=a.id_trash
        LEFT JOIN trash_regions as c on c.id=b.id_trash_region
        GROUP BY id_trash");
        return $trashes;
    

    }
    function indexTrashView(Request $request){
        $trashes = DB::select("SELECT 
        max(a.id) as last_capacity_id
        , a.trash_capacity_used
        ,a.created_at as last_created_capacity 
        , b.*  
        FROM trash_capacity_used  as a
        LEFT JOIN trash as b on b.id=a.id_trash
        GROUP BY id_trash");


        return view('/trash/index',['title'=>'Lixeiras']);
    }


    function indexTrashList(){
        
        return view('/trasheslist/index',['title'=>'Listagem de Lixeiras','title2'=>'oi']);

    }

    function indexView($id){
        $trashes = DB::select("SELECT 
        max(a.id) as last_capacity_id
        , a.trash_capacity_used
        ,a.created_at as last_created_capacity 
        , b.*  
        , d.trash_organization_description as organizacao
        , c.trash_regions_description as regiao
        FROM trash_capacity_used  as a
        LEFT JOIN trash as b on b.id=a.id_trash
        INNER JOIN trash_regions as c on c.id = b.id_trash_region
        INNER JOIN trash_organization as d on d.id = b.id_trash_organization
        where b.id=$id
        GROUP BY id_trash;");


        $trash = json_decode(json_encode($trashes),true);
        return view('/trash/trash_unique',['title'=>$trash[0]['trash_name'],'trash'=>$trash[0]]);
    }

    

}
