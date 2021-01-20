<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class trash_regions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trash_regions')->insert([
            'trash_regions_description'=>"Zona Sul",
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);

        DB::table('trash_regions')->insert([
            'trash_regions_description'=>"Zona Norte",
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);

        DB::table('trash_regions')->insert([
            'trash_regions_description'=>"Zona Leste",
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);

        DB::table('trash_regions')->insert([
            'trash_regions_description'=>"Zona Oeste",
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);
    }
}
