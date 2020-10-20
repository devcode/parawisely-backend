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
            ['type_name' => "Pegunungan"],
            ['type_name' => "Museum"],
            ['type_name' => "Pantai"],
            ['type_name' => "Wahana Aktrasi"],
            ['type_name' => "Monumen"],
            ['type_name' => "Kebun Binatang"],
            ['type_name' => "Kuliner"],
        ];

        TypePlace::insert($data);
    }
}
