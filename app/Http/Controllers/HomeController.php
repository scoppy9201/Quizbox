<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'latestQuizzes' => Movie::latest()->take(8)->get(),
            'featuredQuizzes' => Movie::orderByDesc('rating')->take(8)->get(),
        ]);
    }
}
