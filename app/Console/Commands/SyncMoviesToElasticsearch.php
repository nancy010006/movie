<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Elasticsearch\ClientBuilder;
use App\Models\Movie; // 請根據你的命名空間和模型名稱進行調整

class SyncMoviesToElasticsearch extends Command
{
    protected $signature = 'sync:movies-to-elasticsearch';
    protected $description = 'Sync movies from database to Elasticsearch';

    private $client;

    public function __construct()
    {
        parent::__construct();
        $this->client = ClientBuilder::create()->setHosts(['localhost:9200'])->build(); // 請根據你的Elasticsearch主機地址進行調整
    }

    public function handle()
    {
        // 先確保索引存在，如果不存在則創建它
        $indexParams = [
            'index' => 'movies',
            'body' => [
                'settings' => [
                    'analysis' => [
                        'analyzer' => [
                            'default' => [
                                'type' => 'standard'
                            ]
                        ]
                    ]
                ],
                'mappings' => [
                    'properties' => [
                        'title' => [
                            'type' => 'text'
                        ],
                        'video_path' => [
                            'type' => 'text'
                        ],
                        'view_count' => [
                            'type' => 'integer'
                        ],
                        'tags' => [
                            'type' => 'text'
                        ],
                        'actors' => [
                            'type' => 'text'
                        ]
                        // 其他字段
                    ]
                ]
            ]
        ];

        // 刪除現有索引 (警告: 這將刪除索引中的所有數據)
        if ($this->client->indices()->exists(['index' => 'movies'])) {
            $this->client->indices()->delete(['index' => 'movies']);
        }

        // 創建具有所需設置和映射的新索引
        $this->client->indices()->create($indexParams);

        $movies = Movie::with(['tags', 'actors'])->get(); // 使用預加載以提高效率
        $host = 'http://local.resources';
        foreach ($movies as $movie) {
            $params = [
                'index' => 'movies',
                'id'    => $movie->id,
                'body'  => [
                    'title'       => $movie->title,
                    'video_path'  => "{$host}/{$movie->video_path}",
                    'view_count'  => $movie->view_count,
                    'tags'        => $movie->tags->pluck('name')->toArray(), // 取得所有標籤名稱
                    'actors'      => $movie->actors->pluck('name')->toArray() // 取得所有演員名稱
                    // 其他字段
                ]
            ];

            $this->client->index($params);
        }

        $this->info('Movies have been synced to Elasticsearch successfully.');
    }
}
