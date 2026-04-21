<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Movie;
use App\Models\Show;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BookingController extends Controller
{


    public function store(Request $request)
    {
        $validated = $request->validate([
            'show_id' => 'required|exists:shows,id',
            'class_type' => 'required|in:Silver,Gold,Platinum',
            'quantity' => 'required|integer|min:1',
            'is_kid' => 'nullable|boolean',
        ]);

        $show = Show::findOrFail($validated['show_id']);

        // Determine price per ticket
        $pricePerTicket = match ($validated['class_type']) {
            'Silver' => $show->price_silver,
            'Gold' => $show->price_gold,
            'Platinum' => $show->price_platinum,
            default => 0,
        };

        // Kid discount
        $isKid = $request->has('is_kid') && $request->is_kid;
        if ($isKid) {
            $pricePerTicket *= 0.5;
        }

        $totalPrice = $pricePerTicket * $validated['quantity'];

        Booking::create([
            'user_id' => auth()->id(),
            'show_id' => $validated['show_id'],
            'class_type' => $validated['class_type'],
            'quantity' => $validated['quantity'],
            'is_kid' => $isKid,
            'price_per_ticket' => $pricePerTicket,
            'total_price' => $totalPrice,
        ]);

        return redirect()->route('profile.index')
            ->with('success', 'Ticket booked successfully!');
    }
}
