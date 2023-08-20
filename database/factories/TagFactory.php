<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    protected $model = Tag::class;

    public function definition()
    {
        $tags = [
            'A',
            'B',
            'C',
            'D',
            'E',
        ];
        return [
            'name' => $this->faker->randomElement($tags),
        ];
    }
}
