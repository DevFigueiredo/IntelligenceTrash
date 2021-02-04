<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Models\TrashHistoryModel;

class TrashHistoryController extends Controller
{


   public function __construct()
   {
    $this->middleware('UserPermissions');    
    }




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
      
      $tempo = $request->input('timestamp');
      $id = $request->input('id');

      switch($tempo){
         case 1:
            return json_encode(ShowHistoryTimestampOneHour($id));
            break;
         case 2:
            return json_encode(ShowHistoryTimestampOneDay($id));
            break;
         case 3:
            return json_encode(ShowHistoryTimestampOneWeek($id));
            break;
         default:
            return "You're missing something...";
            break;
      }
   
   }
 

    
}





function ShowHistoryTimestampOneHour($id){
   $used = DB::select("select * from trash_capacity_used  where id_trash = $id and datetime(created_at) >= datetime(datetime('now', 'localtime'), '-1 Hour')");
   //$used = DB::select("select datetime(datetime('now', 'localtime'), '-1 Hour');");
   //$used = DB::select("select * from trash_capacity_used;");
   return ($used);
}

function ShowHistoryTimestampOneDay($id){
   $used = DB::select("select * from trash_capacity_used  where id_trash = $id and datetime(created_at) >= datetime(datetime('now', 'localtime'), '-1 Day')");
   //$used = DB::select("select datetime(datetime('now', 'localtime'), '-1 Hour');");
   //$used = DB::select("select * from trash_capacity_used;");
   return ($used);
}

//Precisa refatorar essa função
function ShowHistoryTimestampOneWeek($id){
   $used = DB::select("select * from trash_capacity_used  where id_trash = $id and datetime(created_at) >= datetime(datetime('now', 'localtime'), '-1 Week')");
   //$used = DB::select("select datetime(datetime('now', 'localtime'), '-1 Hour');");
   //$used = DB::select("select * from trash_capacity_used;");
   return ($used);
}