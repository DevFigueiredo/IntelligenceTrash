<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\trash_regions;
use Database\Seeders\trash_organization;

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
        // \App\Models\User::factory(10)->create();
    }
}
