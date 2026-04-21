<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{

    use HasFactory;

    protected $fillable = [
        "location",
        "city",
        "show_time",
        "show_date",
        "movie_id",
        "price_silver",
        "price_gold",
        "price_platinum",
    ];

    public function movie()
    {
        return  $this->belongsTo(Movie::class);
    }

    public function bookings()
    {
        return  $this->hasMany(Booking::class);
    }
}
