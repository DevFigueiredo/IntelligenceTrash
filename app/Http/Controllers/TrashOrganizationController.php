<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrashOrganizationModel;

class TrashOrganizationController extends Controller
{
  function create(Request $request)
    {
        $description = $request->input('description');
        $TrashOrganization = new TrashOrganizationModel;
        $TrashOrganization->trash_organization_description = $description;
        $TrashOrganization->save();
        return $TrashOrganization->get();
    }
    
    function update(Request $request){
        $id = $request->input('id');
        $description = $request->input('description');

        $TrashOrganization = TrashOrganizationModel::find($id);

        $TrashOrganization->trash_organization_description = $description;
        
        $TrashOrganization->save();
        return $TrashOrganization::find($id);

    }
    function delete(Request $request){
        $id = $request->input('id');
        $TrashOrganization = TrashOrganizationModel::find($id);
        $TrashOrganization->delete(); 
        return 'Deletado com Sucesso';
   
    }
    
    function index(Request $request){
        $TrashOrganization = new TrashOrganizationModel;
        return $TrashOrganization->get();        }
}
