<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


use App\Models\TrashModel;
use Illuminate\Support\Facades\Log;

use App\Models\TrashCapacityModel;
use App\Models\TrashHistoryModel;


class TrashControllerArduino extends Controller
{

    function AddCapacity(Request $request){
        
        $trash_capacity_used = $request->input('trash_capacity_used');
        $id_trash = $request->input('id_trash');
        $sensor1 = $request->input('sensor1');
        $sensor2 = $request->input('sensor2');
        $sensor3 = $request->input('sensor3');
        $id_lixeira = $request->input('id_trash');
        

        $TrashCapacity = new TrashCapacityModel();
        $TrashCapacity->trash_capacity_used = CalculateCapacity($sensor1,$sensor2,$sensor3,$id_trash);
        $TrashCapacity->id_trash = $id_trash;
      
         $TrashCapacity->save();
//Insere na tabela de histórico de movimentações da lixeira
$TrashHistory = new TrashHistoryModel;
$TrashHistory->trash_supported = CalculateCapacity($sensor1,$sensor2,$sensor3,$id_trash);
$TrashHistory->trash_history_description = "Atualização Periodica Automática";
$TrashHistory->id_trash = $id_trash;
$TrashHistory->id_history_status = 2;
$TrashHistory->id_user = 1;
$TrashHistory->save();

       return response(json_encode(["status"=>CalculateCapacity($sensor1,$sensor2,$sensor3,$id_trash)]), 200);

    }

    

}

 function CalculateCapacity($s1,$s2,$s3,$id){
    //Onde 40ds é a distância entre um sensor e outro na boca da lixeira
 $AreaBase = ((60^2)*sqrt(3))/4;

 //Calcula a média das alturas dos sensores
 $MediaAltura = ($s1 + $s2 + $s3)/3;

 //Calcula o volume do triangulo de base equilatero que sai o resultado em cm³, e é divido por 1000
 //Para poder obter o valor em Litros.
 $Volume = (($AreaBase * $MediaAltura)/3)/1000;
 

 $MaxCapacidade = json_encode(DB::select("SELECT trash_max_support FROM trash WHERE id = $id")[0]->trash_max_support);
 
 $TrueCapacity = (int) str_replace('"', '', $MaxCapacidade);

 $VerdadeiroVolume = $Volume + ($TrueCapacity/3);

 return $VerdadeiroVolume;

}