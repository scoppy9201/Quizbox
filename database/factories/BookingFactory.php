<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'show_id' => \App\Models\Show::factory(),
            'class_type' => fake()->randomElement(['Silver', 'Gold', 'Platinum']),
            'quantity' => $qty = fake()->numberBetween(1, 5),
            'is_kid' => fake()->boolean(20),
            'price_per_ticket' => $price = fake()->randomFloat(2, 200, 800),
            'total_price' => fn(array $attributes) => $attributes['quantity'] * $attributes['price_per_ticket'],
        ];
    }
}
