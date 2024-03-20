<?php

namespace Database\Seeders;

use DB;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            $now = Carbon::now();
            $created_at = $now->subDays(rand(7, 30)); // Subtract random days between 7 and 30
            DB::table('users')->insert([
                'name' => 'user' . $i,
                'email' => 'user' . $i . '@gmail.com',
                'phone' => '987654321' . $i,
                'image' => 'upload/no_image.jpg',
                'status' => 1,
                'created_at' => $created_at,
            ]);
        }
    }
}
