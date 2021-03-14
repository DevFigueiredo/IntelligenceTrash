<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


use App\Models\TrashModel;
use Illuminate\Support\Facades\Log;

use App\Models\TrashCapacityModel;
use App\Models\TrashRegionsModel;


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
        $sensor1 = $request->input('sensor1');
        $sensor2 = $request->input('sensor2');
        $sensor3 = $request->input('sensor3');
        $id_lixeira = $request->input('id_lixeira');
        

//VALOR TEMPORARIO ATE RESOLVER A CONTA
        $trash_capacity_used = 10;

        $TrashCapacity = new TrashCapacityModel();
        $TrashCapacity->trash_capacity_used = $trash_capacity_used;
        $TrashCapacity->id_trash = $id_trash;
      
        $TrashCapacity->save();
      //  Log::channel('stderr')->info('Foi Inserida uma Nova Capacidade '.$sensor1." ".$sensor2." ".$sensor3);

       return response(json_encode(["status"=>$sensor1]), 200);

    }


    function delete(Request $request){
        $id = $request->input('id');
        $TrashCapacity = TrashCapacityModel::where('id_trash', $id)->delete();
        $Trash = TrashModel::find($id);
        $Trash->delete(); 
        return 'Deletado com Sucesso';
    }
    
    function show($id){
        return  DB::select("SELECT trash.*,
        capacity.trash_capacity_used as trash_capacity_used,
        capacity.id as last_capacity_id,
        capacity.created_at as last_created_capacity,
        region.trash_regions_description as regiao
        FROM trash_capacity_used AS capacity
        left join trash on trash.id=capacity.id_trash
        left join trash_regions as region on region.id=trash.id_trash_region
        WHERE capacity.id IN
        
        (SELECT 
        
        (SELECT
         a.id
         FROM trash_capacity_used as a
         WHERE a.id_trash=b.id
         ORDER BY a.id DESC LIMIT 1 ) as id_capacity_used
         
         
         FROM trash b) and trash.id=$id");

    }
    
    function index(Request $request){
        $trashes =  DB::select(" SELECT trash.*,
        capacity.trash_capacity_used as trash_capacity_used,
        capacity.id as last_capacity_id,
        capacity.created_at as last_created_capacity,
        region.trash_regions_description
        FROM trash_capacity_used AS capacity
        left join trash on trash.id=capacity.id_trash
        left join trash_regions as region on region.id=trash.id_trash_region
        WHERE capacity.id IN
        
        (SELECT 
        
        (SELECT
         a.id
         FROM trash_capacity_used as a
         WHERE a.id_trash=b.id
         ORDER BY a.id DESC LIMIT 1 ) as id_capacity_used
         
         
         FROM trash b)");
/*

        $json = array(
            array(
                "CNS" => "", 
                "CPF" => "31257618830",             
                "Nome" => "LUCAS ALVES",
                "NomeMae" => "", 
                "CodigoSexo" => "", 
                "DataNascimento" => "",
                "NumeroTelefone" => "",
                "LogradouroResidencia" => "",
                "NumeroLogradouroResidencia" => "",
                "Bairro" => "",
                "ComplementoLogradouroResidencia" => "",
                "Email" => "",
                "IdGrupoAtendimento" => "TRABALHADOR DE SAÚDE", 
                "IdImunobiologico" => " CORONAVAC ", 
                "IdLote" => "210037", 
                "IdViaAdministracao" => "INTRAMUSCULAR - IM",    
                "IdVacinador" => "LUCIANEGOMES MACEDO",    
                "IdLocalAplicacao" => "DELTÓIDE ESQUERDO -DE",
                "Dose" => 1
            ),
            array(
                "CNS" => "", 
                "CPF" => "46415316842",             
                "Nome" => "PEDRO HENRIQUE CORREA SILVA",
                "NomeMae" => "", 
                "CodigoSexo" => "", 
                "DataNascimento" => "",
                "NumeroTelefone" => "",
                "LogradouroResidencia" => "",
                "NumeroLogradouroResidencia" => "",
                "Bairro" => "",
                "ComplementoLogradouroResidencia" => "",
                "Email" => "",
                "IdGrupoAtendimento" => "TRABALHADOR DE SAÚDE", 
                "IdImunobiologico" => " CORONAVAC ", 
                "IdLote" => "210037", 
                "IdViaAdministracao" => "INTRAMUSCULAR - IM",    
                "IdVacinador" => "LUCIANEGOMES MACEDO",    
                "IdLocalAplicacao" => "DELTÓIDE ESQUERDO -DE",
                "Dose" => 2
            ),
            array(        
                "CNS" => "CLEONICE MARIA ADÃO", 
                "CPF" => "27896304880",             
                "Nome" => "",
                "NomeMae" => "", 
                "CodigoSexo" => "", 
                "DataNascimento" => "",
                "NumeroTelefone" => "",
                "LogradouroResidencia" => "",
                "NumeroLogradouroResidencia" => "",
                "Bairro" => "",
                "ComplementoLogradouroResidencia" => "",
                "Email" => "",
                "IdGrupoAtendimento" => "TRABALHADOR DE SAÚDE", 
                "IdImunobiologico" => " CORONAVAC ", 
                "IdLote" => "210037", 
                "IdViaAdministracao" => "INTRAMUSCULAR - IM",    
                "IdVacinador" => "LUCIANEGOMES MACEDO",    
                "IdLocalAplicacao" => "DELTÓIDE ESQUERDO -DE",
                "Dose" => 2
            ),
            array(        
                "CNS" => "BETRIZ MARQUES LOBO", 
                "CPF" => "46001534802",             
                "Nome" => "",
                "NomeMae" => "", 
                "CodigoSexo" => "", 
                "DataNascimento" => "",
                "NumeroTelefone" => "",
                "LogradouroResidencia" => "",
                "NumeroLogradouroResidencia" => "",
                "Bairro" => "",
                "ComplementoLogradouroResidencia" => "",
                "Email" => "",
                "IdGrupoAtendimento" => "TRABALHADOR DE SAÚDE", 
                "IdImunobiologico" => " CORONAVAC ", 
                "IdLote" => "210037", 
                "IdViaAdministracao" => "INTRAMUSCULAR - IM",    
                "IdVacinador" => "LUCIANEGOMES MACEDO",    
                "IdLocalAplicacao" => "DELTÓIDE ESQUERDO -DE",
                "Dose" => 2
            ),
            array(        
                "CNS" => "TESTE", 
                "CPF" => "12345678909",             
                "Nome" => "",
                "NomeMae" => "", 
                "CodigoSexo" => "", 
                "DataNascimento" => "",
                "NumeroTelefone" => "",
                "LogradouroResidencia" => "",
                "NumeroLogradouroResidencia" => "",
                "Bairro" => "",
                "ComplementoLogradouroResidencia" => "",
                "Email" => "",
                "IdGrupoAtendimento" => "TRABALHADOR DE SAÚDE", 
                "IdImunobiologico" => " CORONAVAC ", 
                "IdLote" => "210037", 
                "IdViaAdministracao" => "INTRAMUSCULAR - IM",    
                "IdVacinador" => "LUCIANEGOMES MACEDO",    
                "IdLocalAplicacao" => "DELTÓIDE ESQUERDO -DE",
                "Dose" => 2

            ),
           
            array(        
                "CNS" => "709606625533273", 
                "CPF" => "",             
                "Nome" => "RAPHAEl do Nascimento Silva",
                "NomeMae" => "", 
                "CodigoSexo" => "", 
                "DataNascimento" => "",
                "NumeroTelefone" => "",
                "LogradouroResidencia" => "",
                "NumeroLogradouroResidencia" => "",
                "Bairro" => "",
                "ComplementoLogradouroResidencia" => "",
                "Email" => "",
                "IdGrupoAtendimento" => "TRABALHADOR DE SAÚDE", 
                "IdImunobiologico" => " CORONAVAC ", 
                "IdLote" => "210037", 
                "IdViaAdministracao" => "INTRAMUSCULAR - IM",    
                "IdVacinador" => "LUCIANEGOMES MACEDO",    
                "IdLocalAplicacao" => "DELTÓIDE ESQUERDO -DE",
                "Dose" => 2
            ),
            array(        
                "CNS" => "30668958820", 
                "CPF" => "",             
                "Nome" => "SHIRLEY MERY MACEDO MARCONDES",
                "NomeMae" => "", 
                "CodigoSexo" => "", 
                "DataNascimento" => "",
                "NumeroTelefone" => "",
                "LogradouroResidencia" => "",
                "NumeroLogradouroResidencia" => "",
                "Bairro" => "",
                "ComplementoLogradouroResidencia" => "",
                "Email" => "",
                "IdGrupoAtendimento" => "TRABALHADOR DE SAÚDE", 
                "IdImunobiologico" => " CORONAVAC ", 
                "IdLote" => "210037", 
                "IdViaAdministracao" => "INTRAMUSCULAR - IM",    
                "IdVacinador" => "LUCIANEGOMES MACEDO",    
                "IdLocalAplicacao" => "DELTÓIDE ESQUERDO -DE",
                "Dose" => 2
            )


          
           
            
                   
        ); 
        $json = json_encode($json);
       return $json;

 
            */
return $trashes;
    }
    function indexTrashView(Request $request){
        

        return view('/trash/index',['title'=>'Lixeiras']);
    }


    function indexTrashList(){
        
        $regions =  DB::table('trash_regions')
        ->get()
        ->where('status', "1");

      

        $region = json_decode(json_encode($regions),true);

       // foreach ($region as &$value){
           // $value['trash_regions_description'] = str_replace(' ', '_', $value['trash_regions_description']);
        // }

        return view('/trasheslist/index',['title'=>'Listagem de Lixeiras','region'=>$region]);

    }

    function indexView($id){
        $trashes = DB::select("SELECT trash.*,
        organization.trash_organization_description as organizacao,
        capacity.trash_capacity_used as trash_capacity_used,
        capacity.id as last_capacity_id,
        capacity.created_at as last_created_capacity,
        region.trash_regions_description as regiao
        FROM trash_capacity_used AS capacity
        left join trash on trash.id=capacity.id_trash
        left join trash_regions as region on region.id=trash.id_trash_region
        left join trash_organization as organization on organization.id=trash.id_trash_organization
        WHERE capacity.id IN
        
        (SELECT 
        
        (SELECT
         a.id
         FROM trash_capacity_used as a
         WHERE a.id_trash=b.id
         ORDER BY a.id DESC LIMIT 1 ) as id_capacity_used
         
         
         FROM trash b) and trash.id=$id");


        $trash = json_decode(json_encode($trashes),true);
        return view('/trash/trash_unique',['title'=>$trash[0]['trash_name'],'trash'=>$trash[0]]);
    }


    function indexIntelligence(){
        $trash_region= new TrashRegionsModel;

        $regions = $trash_region->where('status',1)->get();

        return view('/intelligence_trash/index',['title'=>"Lixeira Inteligente",'regions'=>$regions]);
    }

    function GetTrashByRegion(Request $request){

        $region = (int) $request->input('IdRegion');
        
        $regions = DB::select("select a.*, b.* from trash_regions as a inner join trash as b on (a.id = b.id_trash_region) where b.trash_status = 1 and b.id_trash_region = $region");

        return json_encode($regions);
    }



}
