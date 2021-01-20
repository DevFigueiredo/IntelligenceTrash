<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrashRegionsModel;

class TrashRegionsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    public function index(){
        $trash_region= new TrashRegionsModel;

        $regions = $trash_region->get();

        return view('/regions/index',['title'=>'Regiões','trash_regions'=>$regions]);
    }

    public function find(Request $request)
    {
        $trash_region= new TrashRegionsModel;

        $id_region = $request->input('id_region');
        

        $region = $trash_region->find($id_region);

       return json_encode($region);
    }


    public function create(Request $request)
    {
        $trash_region= new TrashRegionsModel;

        $description = $request->input('description');

        
        $trash_region->trash_regions_description = $description;
        
        $trash_region->save();

        return 0;
    }

    public function select(Request $request)
    {
        //
    }


    
    public function show($id_region)
    {
        $region = new RegionModel;
        if(!empty($id_region)){
            return $region->Show($id_region);
        }

        return "Something is missing";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $trash_region= new TrashRegionsModel;

        $id_region = $request->input('id_region');
        $description = $request->input('description');
    
        $trash_region->where('id',(int)$id_region)->update(['trash_regions_description'=>$description]);

        //$trash_region->trash_regions_description = $description;

        //$trash_region->save();
        
        return 1;
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function delete($id_region)
    {
        $region = new RegionModel;

        return $region->Delete($id_region);
    }
}
