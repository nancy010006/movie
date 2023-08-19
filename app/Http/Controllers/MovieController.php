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

        // 加上 host 變數
        $host = 'http://local.resources'; // 請替換為實際的 host
        foreach ($movies as $movie) {
            $movie->video_path = "{$host}/{$movie->video_path}";
            foreach ($movie->previews as $preview) {
                $preview->image_path = "{$host}/{$preview->image_path}";
            }
        }

        return response()->json($movies);
    }

}
