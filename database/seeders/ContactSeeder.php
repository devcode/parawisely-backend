<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Dendy Juliano', 'email' => 'dendyjuliano2016@gmail.com', 'subject' => 'Pendapat', 'message' => 'menurut saya content ini sangat bagus sekali dan desain websitenya sangat meyakinkan'],
        ];

        Contact::insert($data);
    }
}
