<?php

namespace Database\Factories;

use App\Models\Statistic;
use Illuminate\Database\Eloquent\Factories\Factory;

class StatisticFactory extends Factory
{
    protected $model = Statistic::class;

    public function definition(): array
    {
        return [
            'label' => fake()->words(2, true),
            'value' => (string) fake()->numberBetween(10, 9999),
            'icon' => null,
            'suffix' => fake()->randomElement(['+', '×', '%', 'Orang', 'Unit', '']),
            'order' => fake()->numberBetween(0, 20),
            'is_active' => true,
        ];
    }
}
