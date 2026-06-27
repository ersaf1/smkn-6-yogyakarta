<?php

namespace Database\Factories;

use App\Models\Accordion;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccordionFactory extends Factory
{
    protected $model = Accordion::class;

    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'content' => '<p>' . implode('</p><p>', fake()->paragraphs(3)) . '</p>',
            'image' => null,
            'order' => fake()->numberBetween(0, 20),
            'is_active' => true,
        ];
    }
}
