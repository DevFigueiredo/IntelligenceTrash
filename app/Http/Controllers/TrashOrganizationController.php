<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrashOrganizationModel;

class TrashOrganizationController extends Controller
{


    public function __construct()
    {
     $this->middleware('UserPermissions');    
     }
 




  function create(Request $request)
    {
        $description = $request->input('description');
        $status = $request->input('status');

        $TrashOrganization = new TrashOrganizationModel;
        $TrashOrganization->trash_organization_description = $description;
        $TrashOrganization->status = $status;
        $TrashOrganization->save();
        return $TrashOrganization->get();
    }
    
    function update(Request $request){
        $id = $request->input('id');
        $status = $request->input('status');
        $description = $request->input('description');

        $TrashOrganization = TrashOrganizationModel::find($id);

        $TrashOrganization->trash_organization_description = $description;
        $TrashOrganization->status = $status;
        
        $TrashOrganization->save();
        return $TrashOrganization::find($id);

    }
    function delete(Request $request){
        $id = $request->input('id');
        $TrashOrganization = TrashOrganizationModel::find($id);
        $TrashOrganization->delete(); 
        return 'Deletado com Sucesso';
   
    }

    function find(Request $request)
    {
        $id = $request->input('id_organization');
        
        $TrashOrganization = new TrashOrganizationModel;

        $organization_info = $TrashOrganization->find($id);

       return json_encode($organization_info);
    }
    
    function index(Request $request){
        $TrashOrganization = new TrashOrganizationModel;
        
        $organization = $TrashOrganization->get();       
    
        return $organization;
    }

    function indexView(Request $request){
        $TrashOrganization = new TrashOrganizationModel;
        
        $organization = $TrashOrganization->get();       
    
        return view('/organizations/index',['title'=>'Organizações','organization'=>$organization]);
    }
}
