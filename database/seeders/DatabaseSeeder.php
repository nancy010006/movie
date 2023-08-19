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
        \App\Models\Movie::factory(5)->hasTags(2)->hasActors(3)->create();
        \App\Models\ViewRecord::factory(50)->create();
        \App\Models\Preview::factory(15)->create();
    }
}
