<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class trash_organization extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trash_organization')->insert([
            'trash_regions_description'=>"Cooperativa Santos Dumont",
            'status'=>0,
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);

        DB::table('trash_organization')->insert([
            'trash_regions_description'=>"Cooperativa Irmãos Tóxicos",
            'status'=>1,
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);

        DB::table('trash_organization')->insert([
            'trash_regions_description'=>"Coleta Hoje e Coleta Amanhã",
            'status'=>0,
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);

        DB::table('trash_organization')->insert([
            'trash_regions_description'=>"Coleta Coleta",
            'status'=>1,
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);
    }
}
