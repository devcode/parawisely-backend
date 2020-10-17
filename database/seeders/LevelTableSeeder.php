<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Level;

class LevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create(
            [
                'name_level' => 'Administrator',
            ],
            [
                'name_level' => 'Mitra'
            ]
        );
    }
}
