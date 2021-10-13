<?php

namespace Database\Seeders;

use App\Models\CarEngine;
use Illuminate\Database\Seeder;
use App\Models\Article;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ArticleSeeder::class,
            CarEngineSeeder::class,
            CarBodySeeder::class,
            CarClassSeeder::class,
            CarSeeder::class,
        ]);
    }
}
