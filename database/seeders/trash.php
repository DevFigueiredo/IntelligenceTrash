<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\TrashModel;

use App\Models\TrashCapacityModel;

class trash extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
            $Trash = new TrashModel;
            $TrashCapacity = new TrashCapacityModel();
            $Trash1 = new TrashModel;
            $Trash1Capacity = new TrashCapacityModel();
            $Trash2 = new TrashModel;
            $Trash2Capacity = new TrashCapacityModel();
            $Trash3 = new TrashModel;
            $Trash3Capacity = new TrashCapacityModel();
            $Trash4 = new TrashModel;
            $Trash4Capacity = new TrashCapacityModel();
            $Trash5 = new TrashModel;
            $Trash5Capacity = new TrashCapacityModel();
            $Trash6 = new TrashModel;
            $Trash6Capacity = new TrashCapacityModel();
            $Trash7 = new TrashModel;
            $Trash7Capacity = new TrashCapacityModel();
            $Trash8 = new TrashModel;
            $Trash8Capacity = new TrashCapacityModel();
            $Trash9 = new TrashModel;
            $Trash9Capacity = new TrashCapacityModel();
            $Trash10 = new TrashModel;
            $Trash10Capacity = new TrashCapacityModel();
          


            $Trash->trash_name = "Lixeira do Panimbá";
            $Trash->trash_latitude = "-23.7151437";
            $Trash->trash_longitude = "-45.4354316";
            $Trash->trash_address = "Orlando Alves de Souza, ".rand(120, 300)." - centro, Caraguatatuba - SP, 11668300";
            $Trash->trash_status = 1;
            $Trash->trash_max_support = rand(0, 30);
            $Trash->created_at = date("d-m-Y H:i:s");
            $Trash->updated_at = date("d-m-Y H:i:s");
            $Trash->id_trash_region = 2;
            $Trash->id_trash_organization = 1;
            $Trash->status = 1;
            $Trash->save();
            $TrashCapacity->trash_capacity_used = 0;
            $TrashCapacity->id_trash = $Trash->id;
            $TrashCapacity->save();
    

            $Trash1->trash_name = "Lixeira do Panimbá";
            $Trash1->trash_latitude = "-23.7151437";
            $Trash1->trash_longitude = "-45.4354316";
            $Trash1->trash_address = "Orlando Alves de Souza, ".rand(120, 300)." - centro, Caraguatatuba - SP, 11668300";
            $Trash1->trash_status = 1;
            $Trash1->trash_max_support = rand(0, 30);
            $Trash1->created_at = date("d-m-Y H:i:s");
            $Trash1->updated_at = date("d-m-Y H:i:s");
            $Trash1->id_trash_region = 2;
            $Trash1->id_trash_organization = 1;
            $Trash1->status = 1;
            $Trash1->save();
            $Trash1Capacity->trash_capacity_used = 0;
            $Trash1Capacity->id_trash = $Trash1->id;
            $Trash1Capacity->save();

            $Trash2->trash_name = "Lixeira do Tunampi";
            $Trash2->trash_latitude = "-23.7165241";
            $Trash2->trash_longitude = "-45.4391133";
            $Trash2->trash_address = "Orlando Alves de Souza, ".rand(120, 300)." - centro, Caraguatatuba - SP, 11668300";
            $Trash2->trash_status = 1;
            $Trash2->trash_max_support = rand(0, 30);
            $Trash2->created_at = date("d-m-Y H:i:s");
            $Trash2->updated_at = date("d-m-Y H:i:s");
            $Trash2->id_trash_region = 3;
            $Trash2->id_trash_organization = 1;
            $Trash2->status = 1;
            $Trash2->save();
            $Trash2Capacity->trash_capacity_used = 0;
            $Trash2Capacity->id_trash = $Trash2->id;
            $Trash2Capacity->save();

            
            $Trash3->trash_name = "Lixeira do Zorumbia";
            $Trash3->trash_latitude = "-23.4686953";
            $Trash3->trash_longitude = "-46.2790442";
            $Trash3->trash_address = "Orlando Alves de Souza, ".rand(120, 300)." - centro, Caraguatatuba - SP, 11668300";
            $Trash3->trash_status = 1;
            $Trash3->trash_max_support = rand(0, 30);
            $Trash3->created_at = date("d-m-Y H:i:s");
            $Trash3->updated_at = date("d-m-Y H:i:s");
            $Trash3->id_trash_region = 2;
            $Trash3->id_trash_organization = 2;
            $Trash3->status = 1;
            $Trash3->save();
            $Trash3Capacity->trash_capacity_used = 0;
            $Trash3Capacity->id_trash = $Trash3->id;
            $Trash3Capacity->save();


            $Trash4->trash_name = "Lixeira do Rodriguinho";
            $Trash4->trash_latitude = "-23.7164511";
            $Trash4->trash_longitude = "-45.4393594";
            $Trash4->trash_address = "Orlando Alves de Souza, ".rand(120, 300)." - centro, Caraguatatuba - SP, 11668300";
            $Trash4->trash_status = 1;
            $Trash4->trash_max_support = rand(0, 30);
            $Trash4->created_at = date("d-m-Y H:i:s");
            $Trash4->updated_at = date("d-m-Y H:i:s");
            $Trash4->id_trash_region = 2;
            $Trash4->id_trash_organization = 1;
            $Trash4->status = 1;
            $Trash4->save();
            $Trash4Capacity->trash_capacity_used = 0;
            $Trash4Capacity->id_trash = $Trash4->id;
            $Trash4Capacity->save();

            $Trash5->trash_name = "Lixeira do Sanintea";
            $Trash5->trash_latitude = "-23.46869214";
            $Trash5->trash_longitude = "-46.2790423";
            $Trash5->trash_address = "Orlando Alves de Souza, ".rand(120, 300)." - centro, Caraguatatuba - SP, 11668300";
            $Trash5->trash_status = 1;
            $Trash5->trash_max_support = rand(0, 30);
            $Trash5->created_at = date("d-m-Y H:i:s");
            $Trash5->updated_at = date("d-m-Y H:i:s");
            $Trash5->id_trash_region = 2;
            $Trash5->id_trash_organization = 1;
            $Trash5->status = 1;
            $Trash5->save();
            $Trash5Capacity->trash_capacity_used = 0;
            $Trash5Capacity->id_trash = $Trash5->id;
            $Trash5Capacity->save();


            $Trash6->trash_name = "Lixeira do Panimasd";
            $Trash6->trash_latitude = "-23.46869123";
            $Trash6->trash_longitude = "-46.279042312";
            $Trash6->trash_address = "Orlando Alves de Souza, ".rand(120, 300)." - centro, Caraguatatuba - SP, 11668300";
            $Trash6->trash_status = 1;
            $Trash6->trash_max_support = rand(0, 30);
            $Trash6->created_at = date("d-m-Y H:i:s");
            $Trash6->updated_at = date("d-m-Y H:i:s");
            $Trash6->id_trash_region = 1;
            $Trash6->id_trash_organization = 2;
            $Trash6->status = 1;
            $Trash6->save();
            $Trash6Capacity->trash_capacity_used = 0;
            $Trash6Capacity->id_trash = $Trash6->id;
            $Trash6Capacity->save();
    
            
            $Trash7->trash_name = "Lixão do seu Zé";
            $Trash7->trash_latitude = "-23.46869212";
            $Trash7->trash_longitude = "-46.2790421";
            $Trash7->trash_address = "Orlando Alves de Souza, ".rand(120, 300)." - centro, Caraguatatuba - SP, 11668300";
            $Trash7->trash_status = 1;
            $Trash7->trash_max_support = rand(0, 30);
            $Trash7->created_at = date("d-m-Y H:i:s");
            $Trash7->updated_at = date("d-m-Y H:i:s");
            $Trash7->id_trash_region = 2;
            $Trash7->id_trash_organization = 1;
            $Trash7->status = 1;
            $Trash7->save();
            $Trash7Capacity->trash_capacity_used = 0;
            $Trash7Capacity->id_trash = $Trash7->id;
            $Trash7Capacity->save();


            $Trash8->trash_name = "Lixão Tapinha na cara não dói";
            $Trash8->trash_latitude = "-23.7171196";
            $Trash8->trash_longitude = "-45.4405627";
            $Trash8->trash_address = "Orlando Alves de Souza, ".rand(120, 300)." - centro, Caraguatatuba - SP, 11668300";
            $Trash8->trash_status = 1;
            $Trash8->trash_max_support = rand(0, 30);
            $Trash8->created_at = date("d-m-Y H:i:s");
            $Trash8->updated_at = date("d-m-Y H:i:s");
            $Trash8->id_trash_region = 3;
            $Trash8->id_trash_organization = 1;
            $Trash8->status = 1;
            $Trash8->save();
            $Trash8Capacity->trash_capacity_used = 0;
            $Trash8Capacity->id_trash = $Trash8->id;
            $Trash8Capacity->save();


            $Trash9->trash_name = "Lixão Oxalá Oxacá";
            $Trash9->trash_latitude = "-23.7160062";
            $Trash9->trash_longitude = "-45.4357157";
            $Trash9->trash_address = "Orlando Alves de Souza, ".rand(120, 300)." - centro, Caraguatatuba - SP, 11668300";
            $Trash9->trash_status = 1;
            $Trash9->trash_max_support = rand(0, 30);
            $Trash9->created_at = date("d-m-Y H:i:s");
            $Trash9->updated_at = date("d-m-Y H:i:s");
            $Trash9->id_trash_region = 4;
            $Trash9->id_trash_organization = 1;
            $Trash9->status = 1;
            $Trash9->save();
            $Trash9Capacity->trash_capacity_used = 0;
            $Trash9Capacity->id_trash = $Trash9->id;
            $Trash9Capacity->save();


            $Trash10->trash_name = "Lixão Tamaluco";
            $Trash10->trash_latitude = "-23.715392";
            $Trash10->trash_longitude = "-45.4364442";
            $Trash10->trash_address = "Orlando Alves de Souza, ".rand(120, 300)." - centro, Caraguatatuba - SP, 11668300";
            $Trash10->trash_status = 1;
            $Trash10->trash_max_support = rand(0, 30);
            $Trash10->created_at = date("d-m-Y H:i:s");
            $Trash10->updated_at = date("d-m-Y H:i:s");
            $Trash10->id_trash_region = 4;
            $Trash10->id_trash_organization = 2;
            $Trash10->status = 1;
            $Trash10->save();
            $Trash10Capacity->trash_capacity_used = 0;
            $Trash10Capacity->id_trash = $Trash10->id;
            $Trash10Capacity->save();


/*

        
        DB::table('trash')->insert([
            'trash_name'=>"Lixeira da Rocinha,
            'trash_latitude'=>"-23.7151738",
            'trash_longitude'=>"-45.4359204",
            'trash_address'=>"Orlando Alves de Souza, ".range(120, 300)." - centro, Caraguatatuba - SP, 11668300",
            'trash_status'=>1,
            'trash_max_support'=>range(0, 30),
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s"),
            'id_trash_region'=>1,
            'id_trash_organization'=>1,
            'status'=>1
        ]);

        DB::table('trash')->insert([
            'trash_name'=>"Lixeira do Panimbá",
            'trash_latitude'=>"-23.7151437",
            'trash_longitude'=>"-45.4354316",
            'trash_address'=>"Orlando Alves de Souza, ".range(120, 300)." - centro, Caraguatatuba - SP, 11668300",
            'trash_status'=>1,
            'trash_max_support'=>range(0, 30),
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s"),
            'id_trash_region'=>2,
            'id_trash_organization'=>1,
            'status'=>1
        ]);

        DB::table('trash')->insert([
            'trash_name'=>"Lixeira do Tunampi",
            'trash_latitude'=>"-23.7165241",
            'trash_longitude'=>"-45.4391133",
            'trash_address'=>"Orlando Alves de Souza, ".range(120, 300)." - centro, Caraguatatuba - SP, 11668300",
            'trash_status'=>1,
            'trash_max_support'=>range(0, 30),
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s"),
            'id_trash_region'=>3,
            'id_trash_organization'=>1,
            'status'=>1
        ]);

        DB::table('trash')->insert([
            'trash_name'=>"Lixeira do Zorumbia",
            'trash_latitude'=>"-23.4686953",
            'trash_longitude'=>"-46.2790442",
            'trash_address'=>"Orlando Alves de Souza, ".range(120, 300)." - centro, Caraguatatuba - SP, 11668300",
            'trash_status'=>1,
            'trash_max_support'=>range(0, 30),
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s"),
            'id_trash_region'=>2,
            'id_trash_organization'=>2,
            'status'=>1
        ]);

        DB::table('trash')->insert([
            'trash_name'=>"Lixeira do Rodriguinho",
            'trash_latitude'=>"-23.7164511",
            'trash_longitude'=>"-45.4393594",
            'trash_address'=>"Orlando Alves de Souza, ".range(120, 300)." - centro, Caraguatatuba - SP, 11668300",
            'trash_status'=>1,
            'trash_max_support'=>range(0, 30),
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s"),
            'id_trash_region'=>2,
            'id_trash_organization'=>1,
            'status'=>1
        ]);

        DB::table('trash')->insert([
            'trash_name'=>"Lixeira do Sanintea",
            'trash_latitude'=>"-23.46869214",
            'trash_longitude'=>"-46.2790423",
            'trash_address'=>"Orlando Alves de Souza, ".range(120, 300)." - centro, Caraguatatuba - SP, 11668300",
            'trash_status'=>1,
            'trash_max_support'=>range(0, 30),
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s"),
            'id_trash_region'=>2,
            'id_trash_organization'=>1,
            'status'=>1
        ]);

        DB::table('trash')->insert([
            'trash_name'=>"Lixeira do Panimasd",
            'trash_latitude'=>"-23.46869123",
            'trash_longitude'=>"-46.279042312",
            'trash_address'=>"Orlando Alves de Souza, ".range(120, 300)." - centro, Caraguatatuba - SP, 11668300",
            'trash_status'=>1,
            'trash_max_support'=>range(0, 30),
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s"),
            'id_trash_region'=>1,
            'id_trash_organization'=>2,
            'status'=>1
        ]);
        
        DB::table('trash')->insert([
            'trash_name'=>"Lixão do seu Zé",
            'trash_latitude'=>"-23.46869212",
            'trash_longitude'=>"-46.2790421",
            'trash_address'=>"Orlando Alves de Souza, ".range(120, 300)." - centro, Caraguatatuba - SP, 11668300",
            'trash_status'=>1,
            'trash_max_support'=>range(0, 30),
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s"),
            'id_trash_region'=>2,
            'id_trash_organization'=>1,
            'status'=>1
        ]);

        DB::table('trash')->insert([
            'trash_name'=>"Lixão Tapinha na cara não dói",
            'trash_latitude'=>"-23.7171196",
            'trash_longitude'=>"-45.4405627",
            'trash_address'=>"Orlando Alves de Souza, ".range(120, 300)." - centro, Caraguatatuba - SP, 11668300",
            'trash_status'=>1,
            'trash_max_support'=>range(0, 30),
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s"),
            'id_trash_region'=>3,
            'id_trash_organization'=>1,
            'status'=>1
        ]);

        DB::table('trash')->insert([
            'trash_name'=>"Lixão Oxalá Oxacá",
            'trash_latitude'=>"-23.7160062",
            'trash_longitude'=>"-45.4357157",
            'trash_address'=>"Orlando Alves de Souza, ".range(120, 300)." - centro, Caraguatatuba - SP, 11668300",
            'trash_status'=>1,
            'trash_max_support'=>range(0, 30),
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s"),
            'id_trash_region'=>4,
            'id_trash_organization'=>1,
            'status'=>1
        ]);

        DB::table('trash')->insert([
            'trash_name'=>"Lixão Tamaluco",
            'trash_latitude'=>"-23.715392",
            'trash_longitude'=>"-45.4364442",
            'trash_address'=>"Orlando Alves de Souza, ".range(120, 300)." - centro, Caraguatatuba - SP, 11668300",
            'trash_status'=>1,
            'trash_max_support'=>range(0, 30),
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s"),
            'id_trash_region'=>4,
            'id_trash_organization'=>2,
            'status'=>1
        ]);*/

    
    }
}
