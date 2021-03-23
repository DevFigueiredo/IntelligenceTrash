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
return $trashes;


        $json = array(        
    array(        
    "CNS" => "", 
    "CPF" => "25609262887",             
    "Nome" => "Custódio Martins da Silva",
    "NomeMae" => "", 
    "CodigoSexo" => "", 
    "DataNascimento" => "",
    "NumeroTelefone" => "",
    "LogradouroResidencia" => "",
    "NumeroLogradouroResidencia" => "",
    "Bairro" => "",
    "ComplementoLogradouroResidencia" => "",
    "Email" => "",
    "IdGrupoAtendimento" => "IDOSO", 
    "IdImunobiologico" => " CORONAVAC ", 
    "IdLote" => "210061", 
    "IdViaAdministracao" => "INTRAMUSCULAR - IM",    
    "IdVacinador" => "LUCIANEGOMES MACEDO",    
    "IdLocalAplicacao" => "DELTÓIDE ESQUERDO -DE",
    "Dose" => 1
),
array(        
    "CNS" => "", 
    "CPF" => "18579514843",             
    "Nome" => "Maria de Souza Lima Pereira",
    "NomeMae" => "", 
    "CodigoSexo" => "F", 
    "DataNascimento" => "",
    "NumeroTelefone" => "",
    "LogradouroResidencia" => "",
    "NumeroLogradouroResidencia" => "",
    "Bairro" => "",
    "ComplementoLogradouroResidencia" => "",
    "Email" => "",
    "IdGrupoAtendimento" => "IDOSO", 
    "IdImunobiologico" => " CORONAVAC ", 
    "IdLote" => "210061", 
    "IdViaAdministracao" => "INTRAMUSCULAR - IM",    
    "IdVacinador" => "LUCIANEGOMES MACEDO",    
    "IdLocalAplicacao" => "DELTÓIDE ESQUERDO -DE",
    "Dose" => 1
),
array(        
    "CNS" => "", 
    "CPF" => "46044884872",             
    "Nome" => "BENEDITO PAULO DOS SANTOS",
    "NomeMae" => "Candida Geraldina da Conceição", 
    "CodigoSexo" => "M", 
    "DataNascimento" => "28/06/1946",
    "NumeroTelefone" => "12996169461",
    "LogradouroResidencia" => "Travessa Mariquinha Maciel",
    "NumeroLogradouroResidencia" => "50",
    "Bairro" => "Sumaré",
    "ComplementoLogradouroResidencia" => "",
    "Email" => "",
    "IdGrupoAtendimento" => "IDOSO", 
    "IdImunobiologico" => " CORONAVAC ", 
    "IdLote" => "210061", 
    "IdViaAdministracao" => "INTRAMUSCULAR - IM",    
    "IdVacinador" => "LUCIANEGOMES MACEDO",    
    "IdLocalAplicacao" => "DELTÓIDE ESQUERDO -DE",
    "Dose" => 1
),
array(        
    "CNS" => "", 
    "CPF" => "16341782896",             
    "Nome" => "MAGALY BULHOES LORENZINI",
    "NomeMae" => "ALICE ADILIA MUTOM BULHOES", 
    "CodigoSexo" => "F", 
    "DataNascimento" => "14/01/1948",
    "NumeroTelefone" => "12986720020",
    "LogradouroResidencia" => "R. Bragança Paulista",
    "NumeroLogradouroResidencia" => "102",
    "Bairro" => "Martim de Sá",
    "ComplementoLogradouroResidencia" => "",
    "Email" => "",
    "IdGrupoAtendimento" => "IDOSO", 
    "IdImunobiologico" => " CORONAVAC ", 
    "IdLote" => "210061", 
    "IdViaAdministracao" => "INTRAMUSCULAR - IM",    
    "IdVacinador" => "LUCIANEGOMES MACEDO",    
    "IdLocalAplicacao" => "DELTÓIDE ESQUERDO -DE",
    "Dose" => 1
),
array(        
    "CNS" => "", 
    "CPF" => "21550023861",             
    "Nome" => "MARIA JUDITH APARECIDA DA SILVA",
    "NomeMae" => "", 
    "CodigoSexo" => "F", 
    "DataNascimento" => "",
    "NumeroTelefone" => "",
    "LogradouroResidencia" => "",
    "NumeroLogradouroResidencia" => "",
    "Bairro" => "",
    "ComplementoLogradouroResidencia" => "",
    "Email" => "",
    "IdGrupoAtendimento" => "IDOSO", 
    "IdImunobiologico" => " CORONAVAC ", 
    "IdLote" => "210061", 
    "IdViaAdministracao" => "INTRAMUSCULAR - IM",    
    "IdVacinador" => "LUCIANEGOMES MACEDO",    
    "IdLocalAplicacao" => "DELTÓIDE ESQUERDO -DE",
    "Dose" => 1
),
array(        
    "CNS" => "", 
    "CPF" => "07118779806",             
    "Nome" => "YARA SOTELINO DE PAULA",
    "NomeMae" => "SEDINA SOTELINO DE PAULA", 
    "CodigoSexo" => "F", 
    "DataNascimento" => "02/11/1947",
    "NumeroTelefone" => "1281211947",
    "LogradouroResidencia" => "Avenida Prestes Maia",
    "NumeroLogradouroResidencia" => "140",
    "Bairro" => "Centro",
    "ComplementoLogradouroResidencia" => "Apartamento 56 Bloco 1",
    "Email" => "",
    "IdGrupoAtendimento" => "IDOSO", 
    "IdImunobiologico" => " CORONAVAC ", 
    "IdLote" => "210061", 
    "IdViaAdministracao" => "INTRAMUSCULAR - IM",    
    "IdVacinador" => "LUCIANEGOMES MACEDO",    
    "IdLocalAplicacao" => "DELTÓIDE ESQUERDO -DE",
    "Dose" => 1
),
array(        
    "CNS" => "", 
    "CPF" => "04075277615",             
    "Nome" => "José Antônio Clemente",
    "NomeMae" => "Izaura Andre Clemente", 
    "CodigoSexo" => "M", 
    "DataNascimento" => "13/06/1945",
    "NumeroTelefone" => "12997502700",
    "LogradouroResidencia" => "Rua dos Tupinambás",
    "NumeroLogradouroResidencia" => "254",
    "Bairro" => "Martim de Sá",
    "ComplementoLogradouroResidencia" => "Casa 01",
    "Email" => "",
    "IdGrupoAtendimento" => "IDOSO", 
    "IdImunobiologico" => " CORONAVAC ", 
    "IdLote" => "210061", 
    "IdViaAdministracao" => "INTRAMUSCULAR - IM",    
    "IdVacinador" => "LUCIANEGOMES MACEDO",    
    "IdLocalAplicacao" => "DELTÓIDE ESQUERDO -DE",
    "Dose" => 1
),
array(        
    "CNS" => "", 
    "CPF" => "01430394404",             
    "Nome" => "Celio Antunes Pereira",
    "NomeMae" => "", 
    "CodigoSexo" => "", 
    "DataNascimento" => "",
    "NumeroTelefone" => "",
    "LogradouroResidencia" => "",
    "NumeroLogradouroResidencia" => "",
    "Bairro" => "",
    "ComplementoLogradouroResidencia" => "",
    "Email" => "",
    "IdGrupoAtendimento" => "IDOSO", 
    "IdImunobiologico" => " CORONAVAC ", 
    "IdLote" => "210061", 
    "IdViaAdministracao" => "INTRAMUSCULAR - IM",    
    "IdVacinador" => "LUCIANEGOMES MACEDO",    
    "IdLocalAplicacao" => "DELTÓIDE ESQUERDO -DE",
    "Dose" => 1
),
array(        
    "CNS" => "", 
    "CPF" => "06076614889",             
    "Nome" => "LIZETE MARILENA ROMEIRO MARQUES",
    "NomeMae" => "MATILDE AGOSTINO ROMEIRO", 
    "CodigoSexo" => "F", 
    "DataNascimento" => "10/08/1948",
    "NumeroTelefone" => "1221035175",
    "LogradouroResidencia" => "Rua Analândia",
    "NumeroLogradouroResidencia" => "230",
    "Bairro" => "Martim de Sá",
    "ComplementoLogradouroResidencia" => "Casa 13",
    "Email" => "",
    "IdGrupoAtendimento" => "IDOSO", 
    "IdImunobiologico" => " CORONAVAC ", 
    "IdLote" => "210061", 
    "IdViaAdministracao" => "INTRAMUSCULAR - IM",    
    "IdVacinador" => "LUCIANEGOMES MACEDO",    
    "IdLocalAplicacao" => "DELTÓIDE ESQUERDO -DE",
    "Dose" => 1
),
        
        ); 
        $json = json_encode($json);
       return $json;

 
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
