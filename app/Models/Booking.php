<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'show_id',
        'class_type',
        'quantity',
        'is_kid',
        'price_per_ticket',
        'total_price',
    ];

    public function show()
    {
        return $this->belongsTo(Show::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
