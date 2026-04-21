<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'link',
        'rating',
        'poster',
        'category',
        'language',
        'duration',
        'year',
        'trailer_url'
    ];

    public function shows()
    {
        return  $this->hasMany(Show::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public static function booted()
    {
        static::creating(function ($movie) {
            $movie->slug = Str::slug($movie->title);
        });

        static::updating(function ($movie) {
            $movie->slug =  Str::slug($movie->title);
        });
    }
}
