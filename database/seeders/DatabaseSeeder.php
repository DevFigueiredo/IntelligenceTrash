<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\trash_regions;
use Database\Seeders\trash_organization;
use Database\Seeders\trash_team_users;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(trash_regions::class);
        $this->call(trash_organization::class);
        $this->call(trash_team_users::class);
        // \App\Models\User::factory(10)->create();
    }
}
