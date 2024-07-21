<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Genre;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ジャンルがシードされている前提で、ランダムにジャンルIDを取得
        $genres = Genre::all();

        Movie::factory(10)->create()->each(function ($movie) use ($genres) {
            $movie->genre_id = $genres->random()->id;
            $movie->save();
        });
    }
}