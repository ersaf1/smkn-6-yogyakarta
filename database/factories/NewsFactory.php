<?php

namespace Database\Factories;

use App\Models\News;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NewsFactory extends Factory
{
    protected $model = News::class;

    public function definition(): array
    {
        $title = fake()->unique()->sentence(6);

        return [
            'category_id' => \App\Models\NewsCategory::factory(),
            'user_id' => User::factory(),
            'title' => $title,
            'slug' => Str::slug($title),
            'excerpt' => fake()->paragraph(),
            'content' => '<p>' . implode('</p><p>', fake()->paragraphs(6)) . '</p>',
            'featured_image' => null,
            'meta_title' => $title,
            'meta_description' => fake()->paragraph(),
            'is_published' => true,
            'is_featured' => fake()->boolean(20),
            'published_at' => fake()->dateTimeBetween('-6 months', 'now'),
        ];
    }

    public function unpublished(): static
    {
        return $this->state(fn() => ['is_published' => false]);
    }

    public function featured(): static
    {
        return $this->state(fn() => ['is_featured' => true]);
    }
}
