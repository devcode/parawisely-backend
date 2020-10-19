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
        $this->call([
            LevelTableSeeder::class,
            AdminTableSeeder::class,
            TypePlaceTableSeeder::class
        ]);

        \App\Models\TravelPlace::factory(10)->create();
    }
}
