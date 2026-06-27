<?php

namespace Database\Factories;

use App\Models\ContactMessage;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactMessageFactory extends Factory
{
    protected $model = ContactMessage::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'phone' => fake()->optional()->phoneNumber(),
            'subject' => fake()->randomElement([
                'Informasi PPDB',
                'Informasi Program Keahlian',
                'Kerjasama Industri',
                'Kritik & Saran',
                'Permohonan Data',
                'Informasi Magang',
                'Lainnya',
            ]),
            'message' => fake()->paragraphs(3, true),
            'is_read' => fake()->boolean(30),
        ];
    }

    public function read(): static
    {
        return $this->state(fn() => ['is_read' => true]);
    }

    public function unread(): static
    {
        return $this->state(fn() => ['is_read' => false]);
    }
}
