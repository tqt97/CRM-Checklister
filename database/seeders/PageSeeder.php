<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::create(['title' => 'Welcome', 'content' => '<p>Welcome to the welcome page!</p>']);
        Page::create(['title' => 'Get Consultation', 'content' => '<p>Welcome to the consultation page!</p>']);
    }
}
