<?php

namespace Database\Seeders;

use App\Models\Intro;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IntrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $descriptions = [
            "This is a detailed description for this introduction. It provides additional context and information about the purpose and content of this introduction.",
            "Welcome to our introduction! Here, we'll provide you with an overview of what to expect from our service.",
            "Discover more about our company through this introduction. We'll guide you through our mission, values, and services.",
            "Get to know us better with this introduction. We'll share insights about our team, culture, and commitment to excellence.",
        ];

        $introsData = [];
        for ($i = 1; $i <= 3; $i++) {
            $randomDescription = $descriptions[array_rand($descriptions)];

            $introsData[] = [
                'image' => Intro::$DEFAULT_IMG,
                'title' => 'Introduction ' . $i,
                'description' => $randomDescription,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('intros')->insert($introsData);
    }
}
