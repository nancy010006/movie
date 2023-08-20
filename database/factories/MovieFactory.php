<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    protected $model = Movie::class;

    public function definition()
    {
        $videos = [
            'videos/tigergoodgood_3172624437493153678.mp4',
            'videos/uccu0323_3172327330899320080.mp4',
            $this->faker->url, // 其他隨機生成的影片路徑
            $this->faker->url, // 其他隨機生成的影片路徑
            $this->faker->url, // 其他隨機生成的影片路徑
        ];

        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->text,
            'video_path' => $this->faker->randomElement($videos),
            'view_count' => $this->faker->numberBetween(1, 10000),
        ];
    }
}
