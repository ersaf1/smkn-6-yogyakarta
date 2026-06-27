<?php

namespace Database\Factories;

use App\Models\Competency;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CompetencyFactory extends Factory
{
    protected $model = Competency::class;

    public function definition(): array
    {
        $name = fake()->unique()->words(3, true);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => fake()->paragraph(),
            'content' => '<p>' . implode('</p><p>', fake()->paragraphs(4)) . '</p>',
            'icon' => null,
            'image' => null,
            'order' => fake()->numberBetween(0, 20),
            'is_active' => true,
        ];
    }
}
