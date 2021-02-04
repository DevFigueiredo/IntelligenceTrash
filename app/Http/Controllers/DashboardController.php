<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class DashboardController extends Controller
{

    public function __construct()
    {
     $this->middleware('UserPermissions');    
     }
 

    public function create(Request $request)
    {
        
    }
    
    function update(Request $request){
        

    }

    function updateCapacity(Request $request){
        
    }


    function delete(Request $request){
        
   
    }
    function show($id){
        
    }
    
    function index(){
        return view('/dashboard/index',['title'=>'Dashboard','title2'=>'oi']);
    }

    function indexTrashList(){

        

    }
}
