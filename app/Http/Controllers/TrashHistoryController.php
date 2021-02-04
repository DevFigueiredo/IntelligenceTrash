<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Models\TrashHistoryModel;

class TrashHistoryController extends Controller
{

    function create(Request $request)
    {
      $trash_history_description = $request->input('trash_history_description');
      $trash_supported = $request->input('trash_supported');
        $id_trash = $request->input('id_trash');
        $id_history_status = $request->input('id_history_status');
        $id_user = $request->input('id_user');

        $TrashHistory = new TrashHistoryModel;
        $TrashHistory->trash_supported = $trash_supported;
        $TrashHistory->trash_history_description = $trash_history_description;
        $TrashHistory->id_trash = $id_trash;
        $TrashHistory->id_history_status = $id_history_status;
        $TrashHistory->id_user = $id_user;
        $TrashHistory->save();
        return $TrashHistory->get();
    }
    function index(){ 
    return DB::table('trash_history')
    ->leftJoin('trash_history_status', 'trash_history_status.id', '=', 'trash_history.id_history_status')
    ->leftJoin('users', 'users.id', '=', 'trash_history.id_user')
    ->select('trash_history.*', 'trash_history_status.trash_history_status_description', 'users.name', 'users.user')
    ->get();
       }

       function showHistoryToStatus($id_status_history){ 
        return DB::table('trash_history')
        ->leftJoin('trash_history_status', 'trash_history_status.id', '=', 'trash_history.id_history_status')
        ->leftJoin('users', 'users.id', '=', 'trash_history.id_user')
        ->select('trash_history.*', 'trash_history_status.trash_history_status_description', 'users.name', 'users.user')
        ->get()
        ->where('id_history_status', $id_status_history);
           }

         function showHistoryToTrash($id_trash){ 
        return DB::table('trash_history')
        ->leftJoin('trash_history_status', 'trash_history_status.id', '=', 'trash_history.id_history_status')
        ->leftJoin('users', 'users.id', '=', 'trash_history.id_user')
        ->select('trash_history.*', 'trash_history_status.trash_history_status_description', 'users.name', 'users.user')
        ->get()
        ->where('id_trash', $id_trash);
           }  

           function showHistoryToHistoryToStatus($id_status_history, $id_trash){ 
            return DB::table('trash_history')
            ->leftJoin('trash_history_status', 'trash_history_status.id', '=', 'trash_history.id_history_status')
            ->leftJoin('users', 'users.id', '=', 'trash_history.id_user')
            ->select('trash_history.*', 'trash_history_status.trash_history_status_description', 'users.name', 'users.user')
            ->get()
            ->where('id_history_status', $id_status_history)
            ->where('id_trash', $id_trash);
               }


   function ShowHistoryTimestamp(Request $request){
      $tempo = input('timestamp');

      switch($tempo){
         case 1:
            return ShowHistoryTimestampOneHour();
         case 2:
            return ShowHistoryTimestampOneDay();
         case 3:
            return ShowHistoryTimestampOneWeek();
         default:
            return "This is not a number dumbass.";
      };
   }

   function ShowHistoryTimestampOneHour(){
      $used = DB::select("select * from trash_capacity_used");

      dd($used);
   }
    
}
