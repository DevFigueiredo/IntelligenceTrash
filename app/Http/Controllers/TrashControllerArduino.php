<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


use App\Models\TrashModel;
use Illuminate\Support\Facades\Log;

use App\Models\TrashCapacityModel;


class TrashControllerArduino extends Controller
{

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
        Log::channel('stderr')->info('Foi Inserida uma Nova Capacidade '.$sensor1." ".$sensor2." ".$sensor3);

       return response(json_encode(["status"=>$sensor1]), 200);

    }

}
