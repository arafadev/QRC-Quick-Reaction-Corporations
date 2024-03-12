<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Provider;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
        $providers = Provider::all();
        for($i = 0; $i <= 20; $i++){
            $provider = $providers->random();
            Category::create([
                'name'=> 'category'. ($i + 1),
                'provider_id' => $provider->id,
                'status' => Category::$STATUS[1],
            ]);
        }
        
    }
}
