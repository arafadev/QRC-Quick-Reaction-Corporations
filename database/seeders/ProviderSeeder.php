<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use DB;
class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 0; $i < 20; $i++) {
            DB::table('providers')->insert([
                'name'           => 'Provider ' . ($i + 1),
                'phone'          => '987654323' . ($i),
                'email'          => 'provider' . ($i + 1) . '@info.com',
                'details'        => 'Details for Provider ' . ($i + 1),
                'map_desc'       => 'Near Hospital ' . ($i + 1),
                'lat'            => '25.00000000',
                'lng'            => '39.00000000',
                'delivery_price' => '25',
                'rate_count'     => rand(5,30),
                'avg_rate'       => rand(1,5),
                'image'          => 'image.png',
                'password'       => bcrypt('provider'),
                'status'         => 1,
                'created_at'     => Carbon::now(),
            ]);
        }
    }
}
