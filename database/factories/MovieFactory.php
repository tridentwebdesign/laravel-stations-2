<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Genre;

class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // ジャンルが存在しない場合は作成
        $genres = ['アクション', 'ヒューマンドラマ', 'コメディ', 'ホラー', 'SF', 'ロマンス'];
        foreach ($genres as $genreName) {
            Genre::firstOrCreate(['name' => $genreName]);
        }

        // ランダムにジャンルを選択
        $genre = Genre::inRandomOrder()->first();

        return [
            'title' => $this->faker->realText(10),
            'image_url' => $this->faker->imageUrl(640, 480),
            'published_year' => $this->faker->year(),
            'is_showing' => $this->faker->boolean(),
            'description' => $this->faker->realText(100),
            'genre_id' => $genre->id, // ランダムに選択したジャンルのIDを設定
        ];
    }
}
