<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        // 外部キー制約を無効にする
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        // テーブルをクリア
        Genre::truncate();

        // 外部キー制約を再度有効にする
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $genres = ['アクション', 'ヒューマンドラマ', 'コメディ', 'ホラー', 'SF', 'ロマンス'];

        foreach ($genres as $genre) {
            Genre::create(['name' => $genre]);
        }
    }
}