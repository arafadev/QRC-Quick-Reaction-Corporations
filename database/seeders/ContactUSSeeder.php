<?php

namespace Database\Seeders;

use App\Models\ContactUs;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContactUSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        ContactUs::create([
            'email' => 'qrc@info.com',
            'phone' => +20104291023,
            'whatsapp' => +201045102950,
        ]);

    }
}
