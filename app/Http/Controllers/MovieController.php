<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Tag;
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

    public function show($id)
    {
        $movie = Movie::with(['tags', 'actors', 'viewRecords', 'previews'])->find($id);

        if ($movie) {
            return response()->json($movie);
        } else {
            return response()->json(['error' => 'Video not found'], 404);
        }
    }

    public function addTag(Request $request, Movie $movie)
    {
        $tagName = $request->input('tag');

        // 查找或創建標籤
        $tag = Tag::firstOrCreate(['name' => $tagName]);

        // 確保此標籤還沒有與此電影相關聯
        if (!$movie->tags->pluck('id')->contains($tag->id)) {
            $movie->tags()->attach($tag->id);
            return response()->json(['message' => 'Tag added successfully'], 201); // 201 Created
        }

        return response()->json(['message' => 'Tag already associated with this movie'], 409); // 409 Conflict
    }


}
