<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    protected $model = Teacher::class;

    public function definition(): array
    {
        $genders = ['Pak', 'Bu'];

        return [
            'name' => fake()->name('male'),
            'nip' => fake()->unique()->numerify('################'),
            'position' => fake()->randomElement([
                'Kepala Sekolah',
                'Wakil Kepala Sekolah',
                'Guru Mata Pelajaran',
                'Guru Produktif',
                'Guru Normatif',
                'Guru Adaptif',
                'Staff Tata Usaha',
                'Laboran',
                'Pustakawan',
            ]),
            'department' => fake()->randomElement([
                'Manajemen',
                'Usaha Perjalanan Wisata',
                'Perhotelan',
                'Kuliner',
                'Tata Kecantikan',
                'Tata Busana',
                'Matematika',
                'Bahasa Indonesia',
                'Bahasa Inggris',
                'Pendidikan Agama',
                'PPKn',
                'Penjasorkes',
            ]),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'photo' => null,
            'bio' => fake()->paragraph(),
            'status' => fake()->randomElement(['guru', 'karyawan', 'tendik']),
            'order' => fake()->numberBetween(0, 50),
            'is_active' => true,
        ];
    }

    public function inactive(): static
    {
        return $this->state(fn() => ['is_active' => false]);
    }
}
