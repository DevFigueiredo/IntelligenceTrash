<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\trash_regions;

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
        // \App\Models\User::factory(10)->create();
    }
}
