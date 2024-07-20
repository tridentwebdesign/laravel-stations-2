<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = ['アクション', 'ヒューマンドラマ', 'コメディ', 'ホラー', 'SF', 'ロマンス'];

        foreach ($genres as $genre) {
            Genre::create(['name' => $genre]);
        }
    }
}
