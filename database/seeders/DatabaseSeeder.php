<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Movie;
use App\Models\Review;
use App\Models\Show;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(25)->create();
        Movie::factory(40)->create()->each(function ($movie) {
            Show::factory()->count(rand(0, 4))->create(['movie_id' => $movie->id]);
        });

        $users = User::all();
        $shows = Show::all();

        foreach ($users as $user) {
            Booking::factory(rand(1, 6))->create([
                'user_id' => $user->id,
                'show_id' => $shows->random()->id,
            ]);

            Review::factory(rand(0, 3))->create([
                'user_id' => $user->id,
                'movie_id' => Movie::inRandomOrder()->first()->id,
            ]);
        }
    }
}
