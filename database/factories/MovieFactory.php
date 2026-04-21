<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->unique()->words(3, true),
            'description' => fake()->paragraph(3),
            'link' => fake()->optional()->url(),
            'rating' => fake()->randomFloat(1, 4, 10),
            'poster' => 'poster.jpg',
            'category' => fake()->randomElement(['Action', 'Drama', 'Sci-Fi', 'Romance', 'Comedy']),
            'language' => fake()->randomElement(['English', 'Urdu', 'Hindi', 'Spanish']),
            'duration' => fake()->numberBetween(90, 180),
            'year' => fake()->year(),
            'trailer_url' => 'https://www.youtube.com/embed/' . Str::random(11),
        ];
    }
}
