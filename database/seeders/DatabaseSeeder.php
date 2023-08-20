<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call([
        //     MoviesTableSeeder::class,
        //     PreviewsTableSeeder::class,
        // ]);
        // 使用工廠生成假資料
        \App\Models\Tag::factory(10)->create();
        \App\Models\Actor::factory(10)->create();
        $movies = \App\Models\Movie::factory(20)->hasTags(4)->hasActors(2)->create();
        foreach ($movies as $movie) {
            \App\Models\Preview::factory(3)->create(['movie_id' => $movie->id]);
            \App\Models\ViewRecord::factory(10)->create(['movie_id' => $movie->id]);
        }

    }
}
