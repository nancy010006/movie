<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MoviesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        foreach (range(1, 20) as $index) {
            \DB::table('movies')->insert([
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'video_path' => 'path/to/video' . $index . '.mp4',
                'view_count' => $faker->numberBetween(50, 1000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
