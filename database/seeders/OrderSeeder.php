<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = [];
        $mapDescriptions = ['Lorem ipsum', 'Dolor sit amet', 'Consectetur adipiscing', 'Elit, sed do eiusmod', 'Tempor incididunt', 'Ut labore et dolore', 'Magna aliqua', 'Ut enim ad minim', 'Veniam, quis nostrud', 'Exercitation ullamco', 'Laboris nisi ut', 'Aliquip ex ea', 'Commodo consequat', 'Duis aute irure', 'Reprehenderit in voluptate', 'Velit esse cillum', 'Dolore eu fugiat', 'Nulla pariatur', 'Excepteur sint', 'Occaecat cupidatat'];
        $patientNotes = ['Patient has a history of allergies.', 'Patient is currently taking medication.', 'Patient requires special care.', 'Patient needs wheelchair assistance.', 'Patient is allergic to latex.', 'Patient is allergic to penicillin.', 'Patient has a history of heart disease.', 'Patient is diabetic.', 'Patient is undergoing chemotherapy.', 'Patient has high blood pressure.'];
        $status = Order::$STATUS;
        $cancelled_by = Order::$CANCELLED_BY;
        $type = ['normal', 'abnormal'];

        for ($i = 1; $i <= 20; $i++) {
            $now = Carbon::now();
            $created_at = $now->subDays(rand(7, 30)); // Subtract random days between 7 and 30

            $orders[] = [
                'user_id' => rand(1, 10), 
                'provider_id' => rand(1, 5), 
                'patient_map_desc' => $mapDescriptions[array_rand($mapDescriptions)] . ' - Patient',
                'patient_lat' => mt_rand(-90000000, 90000000) / 1000000,
                'patient_lng' => mt_rand(-90000000, 90000000) / 1000000,
                'hospital_map_desc' => $mapDescriptions[array_rand($mapDescriptions)] . ' - Hospital',
                'hospital_lng' => mt_rand(-180000000, 180000000) / 1000000,
                'hospital_lat' => mt_rand(-90000000, 90000000) / 1000000,
                'date' => date('Y-m-d', strtotime("+$i days")),
                'time' => date('H:i:s', strtotime("+".rand(1, 24)." hours")), 
                'notes' => $patientNotes[array_rand($patientNotes)],
                'order_num' => 'ORD' . str_pad($i, 3, '0', STR_PAD_LEFT), 
                'items_price' => rand(50, 200), 
                'vat_value_ratio' => 0.05, 
                'vat_value' => 0.05 * rand(5,20), 
                'shipping_price' => rand(5, 20), 
                'app_commission' => rand(1, 5), 
                'total_price' => rand(200,600),
                'type' => $type[array_rand($type)],
                'approved_by_provider' => rand(0, 1),
                'status' => $status[array_rand($status)],
                'cancelled_by' => $cancelled_by[array_rand($cancelled_by)],
                'payment_method' =>  'cash' , 
                'created_at' => $created_at,
                'updated_at' => now(),
            ];
        }
        
        DB::table('orders')->insert($orders);
    }
}
