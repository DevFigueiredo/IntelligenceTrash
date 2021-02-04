<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class TrashResponsability extends Controller
{
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
    
    function indexView(){
        return view('/responsability/index',['title'=>'Responsabilidade do Time']);
    }

    function indexTrashList(){

        

    }
}
