<?php

namespace Database\Factories;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Factories\Factory;

class SliderFactory extends Factory
{
    protected $model = Slider::class;

    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'subtitle' => fake()->sentence(8),
            'button_text' => fake()->randomElement(['Selengkapnya', 'Hubungi Kami', 'Daftar Sekarang', 'Lihat Program']),
            'button_url' => fake()->randomElement(['/', '/hubungi-kami', '/ppdb', '/kompetensi-keahlian']),
            'image' => 'images/slider/slider' . fake()->numberBetween(1, 3) . '.jpg',
            'order' => fake()->numberBetween(1, 10),
            'is_active' => true,
        ];
    }
}
