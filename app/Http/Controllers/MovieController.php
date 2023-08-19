<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Support\Facades\Log;


class MovieController extends Controller
{

    public function index()
    {
        $movies = Movie::with('previews')->get();
        return response()->json($movies);
        
    }

}
