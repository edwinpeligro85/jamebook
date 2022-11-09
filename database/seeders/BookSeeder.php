<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'author_id' => 1,
            'category_id' => 1,
            'editorial_id' => 1,
            'language_id' => 1,
            'isbn' => '12345678',
            'title' => fake()->word(),
            'description' => fake()->text(),
            'price' => 20000,
            'promotional_price' => 20000,
            'condition' => 'new',
            'year' => 2022,
            'pages' => 100,
            'stock' => 5,
            'publication_date' => '2022-07-11 00:00:00',
            'slug' => fake()->word()
        ]);

        DB::table('books')->insert([
            'author_id' => 1,
            'category_id' => 1,
            'editorial_id' => 1,
            'language_id' => 1,
            'isbn' => '12345678',
            'title' => fake()->word(),
            'description' => fake()->text(),
            'price' => 20000,
            'promotional_price' => 20000,
            'condition' => 'new',
            'year' => 2022,
            'pages' => 100,
            'stock' => 5,
            'publication_date' => '2022-07-11 00:00:00',
            'slug' => fake()->word()
        ]);
    }
}
