<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 既存のデータをクリア
        Movie::truncate();

        // 映画データをファクトリで生成
        Movie::factory()->count(10)->create(); // 必要に応じて生成する数を調整
    }
}