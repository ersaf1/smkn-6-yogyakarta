<?php

namespace Database\Seeders;

use App\Models\Statistic;
use Illuminate\Database\Seeder;

class StatisticSeeder extends Seeder
{
    public function run(): void
    {
        $statistics = [
            ['label' => 'Akreditasi', 'value' => 'A', 'order' => 1],
            ['label' => 'Siswa Aktif', 'value' => '456', 'order' => 2],
            ['label' => 'Mitra Kerja', 'value' => '78', 'order' => 3],
        ];

        foreach ($statistics as $statistic) {
            Statistic::create($statistic);
        }
    }
}
