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
            'view_date' => $this->faker->date,
        ];
    }
}
