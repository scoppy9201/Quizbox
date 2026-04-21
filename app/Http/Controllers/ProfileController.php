<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $booking = Booking::with('show.movie')
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        $reviews = Review::with('movie')
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        return view(
            'profile.index',
            [
                'bookings' => $booking,
                'reviews' => $reviews
            ]
        );
    }
}
