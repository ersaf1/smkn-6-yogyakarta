<?php

namespace Database\Factories;

use App\Models\Download;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DownloadFactory extends Factory
{
    protected $model = Download::class;

    public function definition(): array
    {
        $title = fake()->unique()->sentence(4);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => fake()->paragraph(),
            'file' => null,
            'file_type' => fake()->randomElement(['pdf', 'doc', 'docx', 'xls', 'xlsx', 'zip', 'jpg']),
            'download_count' => fake()->numberBetween(0, 500),
            'order' => fake()->numberBetween(0, 30),
            'is_active' => true,
        ];
    }
}
