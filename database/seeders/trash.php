<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class trash extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        
        DB::table('trash')->insert([
            'trash_name'=>"Lixeira da Rocinha",
            'trash_latitude'=>"-23.4686904",
            'trash_longitude'=>"-46.2790494",
            'trash_address'=>"Rua Nilo Peçanha",
            'trash_status'=>1,
            'trash_max_support'=>10,
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s"),
            'id_trash_region'=>1,
            'id_trash_organization'=>1,
            'status'=>1
        ]);

        DB::table('trash')->insert([
            'trash_name'=>"Lixeira do Panimbá",
            'trash_latitude'=>"-23.46869212",
            'trash_longitude'=>"-46.2790421",
            'trash_address'=>"Rua Nilo Peçanha",
            'trash_status'=>0,
            'trash_max_support'=>10,
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s"),
            'id_trash_region'=>2,
            'id_trash_organization'=>1,
            'status'=>1
        ]);

        DB::table('trash')->insert([
            'trash_name'=>"Lixeira do Tunampi",
            'trash_latitude'=>"-23.46861231",
            'trash_longitude'=>"-46.2790324",
            'trash_address'=>"Rua Nilo Peçanha",
            'trash_status'=>0,
            'trash_max_support'=>10,
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
            'trash_address'=>"Rua Nilo Peçanha",
            'trash_status'=>1,
            'trash_max_support'=>10,
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s"),
            'id_trash_region'=>2,
            'id_trash_organization'=>2,
            'status'=>1
        ]);

        DB::table('trash')->insert([
            'trash_name'=>"Lixeira do Rodriguinho",
            'trash_latitude'=>"-23.46321232",
            'trash_longitude'=>"-46.2323221",
            'trash_address'=>"Rua Nilo Peçanha",
            'trash_status'=>1,
            'trash_max_support'=>10,
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
            'trash_address'=>"Rua Nilo Peçanha",
            'trash_status'=>1,
            'trash_max_support'=>10,
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
            'trash_address'=>"Rua Nilo Peçanha",
            'trash_status'=>0,
            'trash_max_support'=>10,
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
            'trash_address'=>"Rua Nilo Peçanha",
            'trash_status'=>0,
            'trash_max_support'=>10,
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s"),
            'id_trash_region'=>2,
            'id_trash_organization'=>1,
            'status'=>1
        ]);

        DB::table('trash')->insert([
            'trash_name'=>"Lixão Tapinha na cara não dói",
            'trash_latitude'=>"-23.46869212",
            'trash_longitude'=>"-46.2790421",
            'trash_address'=>"Rua Nilo Peçanha",
            'trash_status'=>0,
            'trash_max_support'=>10,
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s"),
            'id_trash_region'=>3,
            'id_trash_organization'=>1,
            'status'=>1
        ]);

        DB::table('trash')->insert([
            'trash_name'=>"Lixão Oxalá Oxacá",
            'trash_latitude'=>"-23.46869212",
            'trash_longitude'=>"-46.2790421",
            'trash_address'=>"Rua Nilo Peçanha",
            'trash_status'=>0,
            'trash_max_support'=>10,
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s"),
            'id_trash_region'=>4,
            'id_trash_organization'=>1,
            'status'=>1
        ]);

        DB::table('trash')->insert([
            'trash_name'=>"Lixão Tamaluco",
            'trash_latitude'=>"-23.46869212",
            'trash_longitude'=>"-46.2790421",
            'trash_address'=>"Rua Nilo Peçanha",
            'trash_status'=>0,
            'trash_max_support'=>10,
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s"),
            'id_trash_region'=>4,
            'id_trash_organization'=>2,
            'status'=>1
        ]);

    
    }
}
