<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;

class UserController extends Controller
{
    public function create(Request $request)
    {
        $name = $request->input('name');
        $user = $request->input('user');
        $password = $request->input('password');
        $id_trash_team = $request->input('id_trash_team');
        

        $User = new UserModel;
        $User->name = $name;
        $User->user = $user;
        $User->password = $password;
        $User->id_trash_team = $id_trash_team;
        $User->save();
        return $User->get();
    }
    
    function update(Request $request){
        $id = $request->input('id');
    
    }
    function delete(Request $request){
        $id = $request->input('id');
    
    }
    
    function index(Request $request){
    
    }

    function show(Request $request){
    
    }

    }



