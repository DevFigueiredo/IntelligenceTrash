<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class trash_history_status extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trash_history_status')->insert([
            'trash_history_status_description'=>"Lixeira adicionada.",
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);

        DB::table('trash_history_status')->insert([
            'trash_history_status_description'=>"Lixeira atualizada.",
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);

        DB::table('trash_history_status')->insert([
            'trash_history_status_description'=>"Lixeira inativada.",
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);

        DB::table('trash_history_status')->insert([
            'trash_history_status_description'=>"Capacidade atual da lixeira atualizada.",
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);

    }
}
