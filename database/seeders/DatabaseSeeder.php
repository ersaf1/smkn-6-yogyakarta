<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            SettingSeeder::class,
            MenuSeeder::class,
            CompetencySeeder::class,
            StatisticSeeder::class,
            AccordionSeeder::class,
            PageSeeder::class,
            DummySeeder::class,
        ]);
    }
}
