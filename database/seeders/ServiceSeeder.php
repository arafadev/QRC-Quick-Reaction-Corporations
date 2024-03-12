<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\Category;
use App\Models\Provider;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $providers = Provider::all();
        $categories = Category::all();
        for($i = 0; $i <= 20; $i++){
            $provider = $providers->random();
            $category = $categories->random();
            Service::create([
                'name'=> 'service'. ($i + 1),
                'provider_id' => $provider->id,
                'category_id' => $category->id,
                'price' => rand(100,400),
                'status' => Service::$STATUS[1],
            ]);
        }
    }
}
