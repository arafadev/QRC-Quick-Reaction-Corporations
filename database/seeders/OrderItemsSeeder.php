<?php

namespace Database\Seeders;

use App\Models\OrderItem;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i<=20 ; $i++){

            OrderItem::create([
                'order_id' =>rand(1,20),
                'service_id' =>rand(1,20),
                'price' => rand(200,600)
            ]);

        }
    }
}
