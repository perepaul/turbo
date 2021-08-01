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
        \App\Models\User::factory(10)->create();
        \App\Models\Plan::factory(10)->create();
        \App\Models\Trade::factory(10)->create();
        \App\Models\Currency::factory(3)->create();


    }
}
