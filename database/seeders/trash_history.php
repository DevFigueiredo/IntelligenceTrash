<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class trash_history extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trash_history_status')->insert([
            'trash_history_status_description'=>"Lixeira adicionada."
        ]);
        DB::table('trash_history_status')->insert([
            'trash_history_status_description'=>"Lixeira atualizada."
        ]);
        DB::table('trash_history_status')->insert([
            'trash_history_status_description'=>"Lixeira inativada."
        ]);
        DB::table('trash_history_status')->insert([
            'trash_history_status_description'=>"Capacidade Atualizada"
        ]);

/*

        DB::table('trash_history')->insert([
            'id_trash'=>1,
            'id_history_status'=>2,
            'id_user'=>1,
            'trash_supported'=>10,
            'trash_history_description'=>'Tive que alterar merda',
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);

        DB::table('trash_history')->insert([
            'id_trash'=>3,
            'id_history_status'=>2,
            'id_user'=>1,
            'trash_supported'=>101,
            'trash_history_description'=>'Tive que alterar merda',
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);

        DB::table('trash_history')->insert([
            'id_trash'=>1,
            'id_history_status'=>2,
            'id_user'=>1,
            'trash_supported'=>12,
            'trash_history_description'=>'Tive que alterar merda',
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);

        DB::table('trash_history')->insert([
            'id_trash'=>1,
            'id_history_status'=>1,
            'id_user'=>1,
            'trash_supported'=>10,
            'trash_history_description'=>'Tive que alterar merda',
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);

        DB::table('trash_history')->insert([
            'id_trash'=>1,
            'id_history_status'=>3,
            'id_user'=>1,
            'trash_supported'=>10,
            'trash_history_description'=>'Tive que alterar merda',
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);


        DB::table('trash_history')->insert([
            'id_trash'=>5,
            'id_history_status'=>4,
            'id_user'=>1,
            'trash_supported'=>1,
            'trash_history_description'=>'Tive que alterar merda',
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);

        DB::table('trash_history')->insert([
            'id_trash'=>8,
            'id_history_status'=>1,
            'id_user'=>1,
            'trash_supported'=>31,
            'trash_history_description'=>'Tive que alterar merda',
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);

        DB::table('trash_history')->insert([
            'id_trash'=>10,
            'id_history_status'=>3,
            'id_user'=>1,
            'trash_supported'=>123,
            'trash_history_description'=>'Tive que alterar merda',
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);

        DB::table('trash_history')->insert([
            'id_trash'=>14,
            'id_history_status'=>4,
            'id_user'=>1,
            'trash_supported'=>103,
            'trash_history_description'=>'Tive que alterar merda',
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);

        DB::table('trash_history')->insert([
            'id_trash'=>11,
            'id_history_status'=>3,
            'id_user'=>1,
            'trash_supported'=>15,
            'trash_history_description'=>'Tive que alterar merda',
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);

        DB::table('trash_history')->insert([
            'id_trash'=>1,
            'id_history_status'=>2,
            'id_user'=>1,
            'trash_supported'=>10,
            'trash_history_description'=>'Tive que alterar merda',
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);

        DB::table('trash_history')->insert([
            'id_trash'=>3,
            'id_history_status'=>2,
            'id_user'=>1,
            'trash_supported'=>10,
            'trash_history_description'=>'Tive que alterar merda',
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);

        DB::table('trash_history')->insert([
            'id_trash'=>21,
            'id_history_status'=>1,
            'id_user'=>1,
            'trash_supported'=>101,
            'trash_history_description'=>'Tive que alterar merda',
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);

        DB::table('trash_history')->insert([
            'id_trash'=>12,
            'id_history_status'=>3,
            'id_user'=>1,
            'trash_supported'=>10,
            'trash_history_description'=>'Tive que alterar merda',
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);

        DB::table('trash_history')->insert([
            'id_trash'=>1,
            'id_history_status'=>2,
            'id_user'=>1,
            'trash_supported'=>10,
            'trash_history_description'=>'Tive que alterar merda',
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);

        DB::table('trash_history')->insert([
            'id_trash'=>1,
            'id_history_status'=>2,
            'id_user'=>1,
            'trash_supported'=>10,
            'trash_history_description'=>'Tive que alterar merda',
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);

        DB::table('trash_history')->insert([
            'id_trash'=>3,
            'id_history_status'=>2,
            'id_user'=>1,
            'trash_supported'=>10,
            'trash_history_description'=>'Tive que alterar merda',
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);

        DB::table('trash_history')->insert([
            'id_trash'=>1,
            'id_history_status'=>2,
            'id_user'=>1,
            'trash_supported'=>10,
            'trash_history_description'=>'Tive que alterar merda',
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);

        DB::table('trash_history')->insert([
            'id_trash'=>1,
            'id_history_status'=>2,
            'id_user'=>1,
            'trash_supported'=>10,
            'trash_history_description'=>'Tive que alterar merda',
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);

        DB::table('trash_history')->insert([
            'id_trash'=>1,
            'id_history_status'=>2,
            'id_user'=>1,
            'trash_supported'=>10,
            'trash_history_description'=>'Tive que alterar merda',
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);


        DB::table('trash_history')->insert([
            'id_trash'=>1,
            'id_history_status'=>2,
            'id_user'=>1,
            'trash_supported'=>10,
            'trash_history_description'=>'Tive que alterar merda',
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);

        DB::table('trash_history')->insert([
            'id_trash'=>3,
            'id_history_status'=>2,
            'id_user'=>1,
            'trash_supported'=>10,
            'trash_history_description'=>'Tive que alterar merda',
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);

        DB::table('trash_history')->insert([
            'id_trash'=>1,
            'id_history_status'=>2,
            'id_user'=>1,
            'trash_supported'=>10,
            'trash_history_description'=>'Tive que alterar merda',
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);

        DB::table('trash_history')->insert([
            'id_trash'=>1,
            'id_history_status'=>2,
            'id_user'=>1,
            'trash_supported'=>10,
            'trash_history_description'=>'Tive que alterar merda',
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);

        DB::table('trash_history')->insert([
            'id_trash'=>1,
            'id_history_status'=>2,
            'id_user'=>1,
            'trash_supported'=>10,
            'trash_history_description'=>'Tive que alterar merda',
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);

        DB::table('trash_history')->insert([
            'id_trash'=>1,
            'id_history_status'=>2,
            'id_user'=>1,
            'trash_supported'=>10,
            'trash_history_description'=>'Tive que alterar merda',
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);

        DB::table('trash_history')->insert([
            'id_trash'=>3,
            'id_history_status'=>2,
            'id_user'=>1,
            'trash_supported'=>10,
            'trash_history_description'=>'Tive que alterar merda',
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);

        DB::table('trash_history')->insert([
            'id_trash'=>1,
            'id_history_status'=>2,
            'id_user'=>1,
            'trash_supported'=>10,
            'trash_history_description'=>'Tive que alterar merda',
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);

        DB::table('trash_history')->insert([
            'id_trash'=>1,
            'id_history_status'=>2,
            'id_user'=>1,
            'trash_supported'=>10,
            'trash_history_description'=>'Tive que alterar merda',
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);

        DB::table('trash_history')->insert([
            'id_trash'=>1,
            'id_history_status'=>2,
            'id_user'=>1,
            'trash_supported'=>10,
            'trash_history_description'=>'Tive que alterar merda',
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);*/
    }
}
