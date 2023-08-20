<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $elasticsearch = app('elasticsearch');

        $queryInput = strtolower($request->input('query')); // 將查詢轉為小寫

        $params = [
            'index' => 'movies',
            'body' => [
                'query' => [
                    'bool' => [
                        'should' => [
                            [
                                'match' => [
                                    'title' => $queryInput
                                ],
                            ],
                            [
                                'match' => [
                                    'actors' => $queryInput
                                ],
                            ],
                            [
                                'match' => [
                                    'tags' => $queryInput
                                ],
                            ],
                            [
                                'match' => [
                                    'description' => [
                                        'query' => $queryInput,
                                    ]
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];

        $results = $elasticsearch->search($params);

        $movies = array_map(function ($item) {
            return [
                'id' => $item['_id'],
                'title' => $item['_source']['title'],
                'video_path' => $item['_source']['video_path'],
            ];
        }, $results['hits']['hits']);

        return response()->json($movies);
    }
}
