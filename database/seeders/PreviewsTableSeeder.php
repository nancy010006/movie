<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PreviewsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        foreach (range(1, 20) as $movieId) {
            $previewCount = random_int(0, 5);
            foreach (range(1, $previewCount) as $index) {
                \DB::table('previews')->insert([
                    'movie_id' => $movieId,
                    'image_path' => 'path/to/image' . $movieId . '_' . $index . '.jpg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
