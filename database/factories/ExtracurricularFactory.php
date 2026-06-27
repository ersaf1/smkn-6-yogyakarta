<?php

namespace Database\Factories;

use App\Models\Extracurricular;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ExtracurricularFactory extends Factory
{
    protected $model = Extracurricular::class;

    public function definition(): array
    {
        $name = fake()->unique()->words(2, true);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => fake()->paragraph(),
            'content' => '<p>' . implode('</p><p>', fake()->paragraphs(3)) . '</p>',
            'image' => null,
            'coach' => fake()->name(),
            'schedule' => fake()->dayOfWeek() . ', ' . fake()->time('H:i') . ' - ' . fake()->time('H:i') . ' WIB',
            'order' => fake()->numberBetween(0, 20),
            'is_active' => true,
        ];
    }
}
