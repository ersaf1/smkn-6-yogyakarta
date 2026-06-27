<?php

namespace Database\Factories;

use App\Models\Achievement;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AchievementFactory extends Factory
{
    protected $model = Achievement::class;

    public function definition(): array
    {
        $title = fake()->unique()->sentence(6);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => fake()->paragraph(),
            'content' => '<p>' . implode('</p><p>', fake()->paragraphs(4)) . '</p>',
            'image' => null,
            'year' => fake()->numberBetween(2020, 2026),
            'level' => fake()->randomElement(['Sekolah', 'Kota', 'Kabupaten', 'Provinsi', 'Nasional', 'Internasional']),
            'order' => fake()->numberBetween(0, 30),
            'is_active' => true,
        ];
    }
}
