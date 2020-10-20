<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Level;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // sudah di levelTableSeeder
        // Level::create([
        //     'name_level' => 'administrator'
        // ]);

        Employee::create([
            'name' => 'admin',
            'email' => 'admin@parawisely.com',
            'password' => Hash::make(12345678),
            'level_id' => 1,
            'image' => 'deafult.png'
        ]);
    }
}
