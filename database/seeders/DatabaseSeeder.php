<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(PageSeeder::class);
        \App\Models\ChecklistGroup::factory(5)->create();
        \App\Models\Checklist::factory(10)->create();

    }
}
