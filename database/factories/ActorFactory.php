<?php

namespace Database\Factories;

use App\Models\Actor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActorFactory extends Factory
{
    protected $model = Actor::class;

    public function definition()
    {
        $actors = [
            'actorA',
            'actorB',
            'actorC',
            'actorD',
            'actorE',
            'actorF',
        ];
        return [
            'name' => $this->faker->randomElement($actors),
        ];
    }
}
