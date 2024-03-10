<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
               'name' => 'Admin',
               'email'    => 'qrc@info.com',
               'phone'    => '12345678910',
               'image'    => 'no_image.jpg',
               'password' => Hash::make('qrcproject'),
               'status'     => 1,
        ]);
    }
}
