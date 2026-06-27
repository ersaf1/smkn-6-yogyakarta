<?php

namespace Database\Factories;

use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PageFactory extends Factory
{
    protected $model = Page::class;

    public function definition(): array
    {
        $title = fake()->unique()->sentence(4);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'excerpt' => fake()->paragraph(),
            'content' => '<p>' . implode('</p><p>', fake()->paragraphs(5)) . '</p>',
            'featured_image' => null,
            'template' => 'default',
            'meta_title' => $title,
            'meta_description' => fake()->paragraph(),
            'is_published' => true,
            'order' => fake()->numberBetween(0, 50),
        ];
    }

    public function unpublished(): static
    {
        return $this->state(fn() => ['is_published' => false]);
    }
}
