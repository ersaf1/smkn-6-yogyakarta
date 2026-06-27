<?php

namespace Database\Factories;

use App\Models\MenuItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuItemFactory extends Factory
{
    protected $model = MenuItem::class;

    public function definition(): array
    {
        return [
            'menu_id' => \App\Models\Menu::factory(),
            'parent_id' => null,
            'title' => fake()->words(3, true),
            'url' => '/' . fake()->slug(),
            'route' => null,
            'icon' => null,
            'order' => fake()->numberBetween(0, 50),
            'open_new_tab' => false,
            'is_active' => true,
        ];
    }

    public function childOf(int $parentId): static
    {
        return $this->state(fn() => ['parent_id' => $parentId]);
    }

    public function inactive(): static
    {
        return $this->state(fn() => ['is_active' => false]);
    }
}
