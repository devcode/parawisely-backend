<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Island;

class IslandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Pulau Jawa', 'description' => 'Merupakan salah satu destinasi ', 'image' => '1603122747-Pulaujawa.jpg', 'slug' => 'pulau-jawa'],
            ['name' => 'Maluku dan Papua', 'description' => 'Merupakan salah satu destinasi ', 'image' => '1603122747-Pulausumatra.jpg', 'slug' => 'pulau-sumatra'],
            ['name' => 'Bali dan Nusa Tenggara', 'description' => 'Merupakan salah satu destinasi ', 'image' => '1603122747-Pulaukalimantan.jpg', 'slug' => 'pulau-kalimantan'],
            ['name' => 'Pulau Sulawesi', 'description' => 'Merupakan salah satu destinasi ', 'image' => '1603122747-Pulausulawesi.jpg', 'slug' => 'pulau-sulawesi'],
            ['name' => 'Pulau Kalimantan', 'description' => 'Merupakan salah satu destinasi ', 'image' => '1603122747-Pulaupapua.jpg', 'slug' => 'pulau-papua'],
            ['name' => 'Pulau Sumatra', 'description' => 'Merupakan salah satu destinasi ', 'image' => '1603122747-Pulaupapua.jpg', 'slug' => 'pulau-papua'],
        ];

        Island::insert($data);
    }
}
