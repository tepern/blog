<?php

namespace Database\Factories\Blog;

use App\Models\Blog\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\UserFactory;
use App\Models\User;

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
    public function definition()
    {
        $title = $this->faker->sentence(rand(3, 8), true);
        $text = $this->faker->realText(rand(1000, 4000));
        $author = User::factory()->create();

        $createdAt = $this->faker->dateTimeBetween('-3 months', '-2 months');

        return [
            'title' => $title,
            'author' => $author->id,
            'brief' => $this->faker->text(rand(40, 100)),
            'fullText' => $text,
            'createdAt' => $createdAt
        ];
    }
}