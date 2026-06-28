<?php

namespace Database\Seeders;

use App\Models\Competency;
use Illuminate\Database\Seeder;

class CompetencySeeder extends Seeder
{
    public function run(): void
    {
        $competencies = [
            ['name' => 'Usaha Perjalanan Wisata', 'order' => 1],
            ['name' => 'Perhotelan', 'order' => 2],
            ['name' => 'Kuliner', 'order' => 3],
            ['name' => 'Kecantikan & SPA', 'order' => 4],
            ['name' => 'Tata Busana', 'order' => 5],
        ];

        foreach ($competencies as $competency) {
            Competency::firstOrCreate(
                ['name' => $competency['name']],
                $competency
            );
        }
    }
}
