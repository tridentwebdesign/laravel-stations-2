<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    protected $model = Movie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->realText(10),
            'image_url' => $this->faker->imageUrl(640, 480),
            'published_year' => $this->faker->year(),
            'is_showing' => $this->faker->boolean(),
            'description' => $this->faker->realText(100),
            // genre_id は MoviesTableSeeder で設定するのでここでは設定しない
        ];
    }
}