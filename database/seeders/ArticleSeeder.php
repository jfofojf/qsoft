<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use App\Models\Article;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;


class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::factory()
            ->count(5)
            ->create(['published_at' => carbon::now()]);

        Article::factory()
            ->count(10)
            ->create();

        $articles = Article::all();
        foreach ($articles as $article) {
            $rand = rand(0, 1);
            $article->tags()->create(['name' => substr($article->slug, 0, 15)]);
            if ($rand) {
                $article->tags()->create(['name' => substr($article->title, 0, 15)]);
            }
        }
    }
}
