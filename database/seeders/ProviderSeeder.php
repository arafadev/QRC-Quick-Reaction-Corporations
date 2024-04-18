<?php

namespace Database\Seeders;

use DB;
use App\Models\Provider;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
                'name' => 'Provider ' . ($i + 1),
                'phone' => '987654323' . ($i),
                'email' => 'provider' . ($i == 1 ? '' : $i) . '@info.com',
                'details' => 'Details for Provider ' . ($i + 1),
                'map_desc' => 'Near Hospital ' . ($i + 1),
                'lat' => '25.00000000',
                'lng' => '39.00000000',
                'delivery_price' => '25',
                'rate_count' => rand(5, 30),
                'avg_rate' => rand(1, 5),
                'image' => Provider::$DEFAULT_IMG,
                'password' => bcrypt('provider'),
                'status' => $i == 1 ? 1 : Provider::$STATUS[array_rand(Provider::$STATUS)],
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
