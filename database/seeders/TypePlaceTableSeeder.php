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
            ['type_name' => 'Pegunungnan', 'type_icon' => 'pegunungan.png'],
            ['type_name' => 'Kuliner', 'type_icon' => 'kuliner.png'],
            ['type_name' => 'Museum', 'type_icon' => 'museum.png'],
            ['type_name' => 'Pantai', 'type_icon' => 'pantai.png'],
            ['type_name' => 'Wahana Aktrasi', 'type_icon' => 'wahana-aktrasi.png'],
            ['type_name' => 'Monumen', 'type_icon' => 'monumen.png'],
        ];

        TypePlace::insert($data);
    }
}
