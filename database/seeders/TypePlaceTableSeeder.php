<?php

namespace Database\Seeders;

use App\Models\TypePlace;
use Illuminate\Database\Seeder;

class TypePlaceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['type_name' => "Pegunungan", 'slug' => 'pegunungan', 'type_icon' => 'mountain-15'],
            ['type_name' => "Museum", 'slug' => 'museum', 'type_icon' => 'town-hall-15'],
            ['type_name' => "Pantai", 'slug' => 'pantai', 'type_icon' => 'gaming-15'],
            ['type_name' => "Wahana Aktrasi", 'slug' => 'wahana-aktrasi', 'type_icon' => 'hospital-15'],
            ['type_name' => "Monumen", 'slug' => 'monumen', 'type_icon' => 'farm-15'],
            ['type_name' => "Kebun Binatang", 'slug' => 'kebun-binatang', 'type_icon' => 'marker-15'],
            ['type_name' => "Kuliner", 'slug' => 'kuliner', 'type_icon' => 'heart-15'],
        ];

        TypePlace::insert($data);
    }
}
