<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $title = $this->faker->sentence;
        $slug = $this->faker->slug;
        return [
            'slug' => $slug,
            'title' => $title,
            'description' => $this->faker->realText(255),
            'body' => $this->faker->realText(),
            'published_at' => $this->faker->optional(0.5)->dateTimeThisMonth(),
        ];
    }
}
