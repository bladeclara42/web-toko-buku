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
                'title' => 'Book One Title',
                'cover' => 'covers/book1.jpg',
                'description' => 'This is the description for book one.',
                'type' => 'Fiction',
                'price' => 2000,
                'published_year' => 2020,
                'stock' => 100,
            ],
            [
                'author_id' => 2,
                'publisher_id' => 2,
                'condition_id' => 2,
                'title' => 'Book Two Title',
                'cover' => 'covers/book2.jpg',
                'description' => 'This is the description for book two.',
                'type' => 'Non-Fiction',
                'price' => 1500,
                'published_year' => 2018,
                'stock' => 50,
            ],
        ]);
    }
}
