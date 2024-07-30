<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_items')->insert([
            [
                'order_id' => 1,
                'book_id' => 1,
                'quantity' => 2,
                'price' => 2000,
            ],
            [
                'order_id' => 2,
                'book_id' => 2,
                'quantity' => 1,
                'price' => 1500,
            ],
        ]);
    }
}
