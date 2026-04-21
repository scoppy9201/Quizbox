<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Movie;
use App\Models\Review;
use App\Models\Show;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Tạo tài khoản admin cố định
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'admin',
        ]);

        // Tạo user thường
        $users = User::factory(25)->create([
            'role' => 'user'
        ]);

        // Gộp admin + user lại (để dùng chung)
        $allUsers = $users->push($admin);

        // Tạo movie + show
        $movies = Movie::factory(40)->create()->each(function ($movie) {
            Show::factory()
                ->count(rand(1, 4)) // luôn có ít nhất 1 show
                ->create(['movie_id' => $movie->id]);
        });

        $shows = Show::all();

        // Tạo booking + review
        foreach ($allUsers as $user) {
            Booking::factory(rand(1, 5))->create([
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
