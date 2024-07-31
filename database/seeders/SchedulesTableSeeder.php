<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Schedule;
use App\Models\Movie;

class SchedulesTableSeeder extends Seeder
{
    public function run()
    {
        $movies = Movie::all();

        foreach ($movies as $movie) {
            Schedule::create([
                'movie_id' => $movie->id,
                'start_time' => '14:00:00',
                'end_time' => '16:00:00',
            ]);

            Schedule::create([
                'movie_id' => $movie->id,
                'start_time' => '18:00:00',
                'end_time' => '20:00:00',
            ]);
        }
    }
}