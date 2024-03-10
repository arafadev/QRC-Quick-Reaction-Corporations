<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            DB::table('users')->insert([
                'name' => 'user' . $i,
                'email' => 'user' . $i . '@gmail.com',
                'phone' => '987654321' . $i,
                'image' => 'image.png',
                'status' => 1,
            ]);
        }
    }
}
