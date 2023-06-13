<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genre_data = [
            [
                'genre' => 'Thriller',
            ],
            [
                'genre' => 'Non-Fiction',
            ],
            [
                'genre' => 'Romance',
            ],
            [
                'genre' => 'Classic',
            ],
            [
                'genre' => 'Fantasy',
            ],
            [
                'genre' => 'Dystopian',
            ],
            [
                'genre' => 'Coming-of-age',
            ],
            [
                'genre' => 'Mystery',
            ],
            [
                'genre' => 'Adventure',
            ],
            [
                'genre' => 'Epic',
            ],
            [
                'genre' => 'Poetry',
            ],
            [
                'genre' => 'Horror',
            ],
            [
                'genre' => 'Gothic',
            ],
            [
                'genre' => 'Science Fiction',
            ],
            [
                'genre' => 'Psychological Fiction',
            ],
            [
                'genre' => 'Historical Fiction',
            ],
            [
                'genre' => 'Children Literature',
            ],
        ];

        DB::table('genres')->insert($genre_data);
    }
}
