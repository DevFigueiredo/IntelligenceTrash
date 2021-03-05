<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class trash_team_users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       	

        DB::table('trash_team_users')->insert([
            'trash_team_description'=>"Supervisor",
            'status'=>0,
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);

        DB::table('trash_team_users')->insert([
            'trash_team_description'=>"Servidor",
            'status'=>1,
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);

        DB::table('trash_team_users')->insert([
            'trash_team_description'=>"Grupo de Campo",
            'status'=>0,
            'created_at'=>date("d-m-Y H:i:s"),
            'updated_at'=>date("d-m-Y H:i:s")
        ]);


        DB::table('users')->insert([
            "name"=> "suporteDJ",
            "user"=> "suporte",
            "password"=> "1234",
            "id_trash_team"=> 1,
            "status"=> 1
        ]);



        DB::table('team_view_permissions')->insert([
            'view_permission'=>"Dashboard"
        ]);
        DB::table('team_view_permissions')->insert([
            'view_permission'=>"Mapa de Lixeiras"
        ]);
        DB::table('team_view_permissions')->insert([
            'view_permission'=>"Usuários"
        ]);
        DB::table('team_view_permissions')->insert([
            'view_permission'=>"Times"
        ]);
        DB::table('team_view_permissions')->insert([
            'view_permission'=>"Lixeiras"
        ]);
        DB::table('team_view_permissions')->insert([
            'view_permission'=>"Regiões"
        ]);
        DB::table('team_view_permissions')->insert([
            'view_permission'=>"Responsabilidade"
        ]);
        DB::table('team_view_permissions')->insert([
            'view_permission'=>"Permissões de Acesso"
        ]); 
     
        DB::table('team_permissions')->insert([
            'id_team'=>1,
            'id_permission'=>1
        ]);
        DB::table('team_permissions')->insert([
            'id_team'=>1,
            'id_permission'=>2
        ]); DB::table('team_permissions')->insert([
            'id_team'=>1,
            'id_permission'=>3
        ]); DB::table('team_permissions')->insert([
            'id_team'=>1,
            'id_permission'=>4
        ]); DB::table('team_permissions')->insert([
            'id_team'=>1,
            'id_permission'=>5
        ]);DB::table('team_permissions')->insert([
            'id_team'=>1,
            'id_permission'=>7
        ]);DB::table('team_permissions')->insert([
            'id_team'=>1,
            'id_permission'=>8
        ]);
    }
}
