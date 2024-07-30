<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            [
                'user_id' => 1,
                'order_date' => '2024-07-30',
                'subtotal' => 5000,
                'shipping' => 500,
                'total' => 5500,
                'status' => 'Pending',
            ],
            [
                'user_id' => 2,
                'order_date' => '2024-07-29',
                'subtotal' => 3000,
                'shipping' => 300,
                'total' => 3300,
                'status' => 'Shipped',
            ],
        ]);
    }
}
