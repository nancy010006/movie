<?php

namespace Database\Factories;

use App\Models\Preview;
use Illuminate\Database\Eloquent\Factories\Factory;

class PreviewFactory extends Factory
{
    protected $model = Preview::class;

    public function definition()
    {
        $images = [
            'photos/螢幕擷取畫面 2023-08-19 163001.png',
            $this->faker->imageUrl, // 其他隨機生成的圖片路徑
            $this->faker->imageUrl, // 其他隨機生成的圖片路徑
            $this->faker->imageUrl, // 其他隨機生成的圖片路徑
        ];

        return [
            'image_path' => $this->faker->randomElement($images),
        ];
    }
}
