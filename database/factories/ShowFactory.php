<?php

namespace Database\Factories;

use App\Models\Movie;
use App\Models\Show;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Show>
 */
class ShowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Show::class;

    public function definition(): array
    {
        return [
            'movie_id' => \App\Models\Movie::factory(),
            'location' => fake()->company() . ' Cinema',
            'city' => fake()->city(),
            'show_date' => fake()->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
            'show_time' => fake()->time('H:i'),
            'price_silver' => fake()->randomFloat(2, 200, 400),
            'price_gold' => fake()->randomFloat(2, 400, 600),
            'price_platinum' => fake()->randomFloat(2, 600, 800),
        ];
    }
}
