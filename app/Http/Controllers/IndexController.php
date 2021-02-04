<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    
    
 
    function index(){
        return view('/index',['title'=>'Inicio']);
    }

    function logout(Request $request){
        $request->session()->flush();
        return redirect('/');    }

}
