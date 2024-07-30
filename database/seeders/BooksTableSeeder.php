<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            [
                'author_id' => 1,
                'publisher_id' => 1,
                'condition_id' => 1,
                'type' => 'Fiction',
                'price' => 2000,
                'published_year' => 2020,
            ],
            [
                'author_id' => 2,
                'publisher_id' => 2,
                'condition_id' => 2,
                'type' => 'Non-Fiction',
                'price' => 1500,
                'published_year' => 2018,
            ],
        ]);
    }
}
