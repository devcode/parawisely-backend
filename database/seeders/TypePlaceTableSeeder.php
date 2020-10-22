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
            ['type_name' => "Pegunungan", 'slug' => 'pegunungan'],
            ['type_name' => "Museum", 'slug' => 'museum'],
            ['type_name' => "Pantai", 'slug' => 'pantai'],
            ['type_name' => "Wahana Aktrasi", 'slug' => 'wahana-aktrasi'],
            ['type_name' => "Monumen", 'slug' => 'monumen'],
            ['type_name' => "Kebun Binatang", 'slug' => 'kebun-binatang'],
            ['type_name' => "Kuliner", 'slug' => 'kuliner'],
        ];

        TypePlace::insert($data);
    }
}
