<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Show;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ShowController extends Controller
{
    public function index()
    {
        $shows = Show::with('movie')->latest()->paginate(6);
        return view('shows.index', compact('shows'));
    }
}
