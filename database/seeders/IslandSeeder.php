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
            ['name' => 'Pulau Jawa', 'description' => 'Merupakan salah satu destinasi wisata yang sudah sangat di kenal oleh masyarakat Indonesia pada umumnya. Temat ini sudah ada dan di bangun pada era pemerintahan Presiden kedua Indonesia saat itu. Tempat yang ini banyak memiliki fasilitas yang bisa Anda jumpai dan nikmati nantinya.', 'image' => '1603122747-Pulaujawa.jpg', 'slug' => 'pulau-jawa'],
            ['name' => 'Pulau Sumatra', 'description' => 'Merupakan salah satu destinasi wisata yang sudah sangat di kenal oleh masyarakat Indonesia pada umumnya. Temat ini sudah ada dan di bangun pada era pemerintahan Presiden kedua Indonesia saat itu. Tempat yang ini banyak memiliki fasilitas yang bisa Anda jumpai dan nikmati nantinya.', 'image' => '1603122747-Pulausumatra.jpg', 'slug' => 'pulau-sumatra'],
            ['name' => 'Pulau Kalimantan', 'description' => 'Merupakan salah satu destinasi wisata yang sudah sangat di kenal oleh masyarakat Indonesia pada umumnya. Temat ini sudah ada dan di bangun pada era pemerintahan Presiden kedua Indonesia saat itu. Tempat yang ini banyak memiliki fasilitas yang bisa Anda jumpai dan nikmati nantinya.', 'image' => '1603122747-Pulaukalimantan.jpg', 'slug' => 'pulau-kalimantan'],
            ['name' => 'Pulau Sulawesi', 'description' => 'Merupakan salah satu destinasi wisata yang sudah sangat di kenal oleh masyarakat Indonesia pada umumnya. Temat ini sudah ada dan di bangun pada era pemerintahan Presiden kedua Indonesia saat itu. Tempat yang ini banyak memiliki fasilitas yang bisa Anda jumpai dan nikmati nantinya.', 'image' => '1603122747-Pulausulawesi.jpg', 'slug' => 'pulau-sulawesi'],
            ['name' => 'Pulau Papua', 'description' => 'Merupakan salah satu destinasi wisata yang sudah sangat di kenal oleh masyarakat Indonesia pada umumnya. Temat ini sudah ada dan di bangun pada era pemerintahan Presiden kedua Indonesia saat itu. Tempat yang ini banyak memiliki fasilitas yang bisa Anda jumpai dan nikmati nantinya.', 'image' => '1603122747-Pulaupapua.jpg', 'slug' => 'pulau-papua'],
        ];

        Island::insert($data);
    }
}
