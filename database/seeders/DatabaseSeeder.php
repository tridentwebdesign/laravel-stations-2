<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            SheetTableSeeder::class,
            GenresTableSeeder::class,
            MoviesTableSeeder::class,
            SchedulesTableSeeder::class, 
        ]);
    }
}