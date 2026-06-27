<?php

namespace Database\Factories;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{
    protected $model = Setting::class;

    public function definition(): array
    {
        return [
            'group' => fake()->randomElement(['general', 'contact', 'social', 'seo']),
            'key' => fake()->unique()->word(),
            'value' => fake()->sentence(),
            'type' => fake()->randomElement(['text', 'textarea', 'image', 'email', 'phone', 'url']),
        ];
    }
}
