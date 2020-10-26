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
            ['type_name' => "Pegunungan", 'slug' => 'pegunungan', 'type_icon' => 'mountain'],
            ['type_name' => "Museum", 'slug' => 'museum', 'type_icon' => 'town-hall'],
            ['type_name' => "Pantai", 'slug' => 'pantai', 'type_icon' => 'gaming'],
            ['type_name' => "Wahana Aktrasi", 'slug' => 'wahana-aktrasi', 'type_icon' => 'hospital'],
            ['type_name' => "Monumen", 'slug' => 'monumen', 'type_icon' => 'farm'],
            ['type_name' => "Kebun Binatang", 'slug' => 'kebun-binatang', 'type_icon' => 'marker'],
            ['type_name' => "Kuliner", 'slug' => 'kuliner', 'type_icon' => 'heart'],
        ];

        TypePlace::insert($data);
    }
}
