<?php

namespace Database\Factories;

use App\Models\ViewRecord;
use Illuminate\Database\Eloquent\Factories\Factory;

class ViewRecordFactory extends Factory
{
    protected $model = ViewRecord::class;

    public function definition()
    {
        return [
            'movie_id' => \App\Models\Movie::factory(),
            'view_date' => $this->faker->date,
        ];
    }
}
