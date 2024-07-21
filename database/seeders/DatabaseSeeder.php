<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // まずジャンルをシード
        $this->call(GenresTableSeeder::class);

        // 次に映画データをシード
        $this->call(MoviesTableSeeder::class);
    }
}