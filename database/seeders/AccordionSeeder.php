<?php

namespace Database\Seeders;

use App\Models\Accordion;
use Illuminate\Database\Seeder;

class AccordionSeeder extends Seeder
{
    public function run(): void
    {
        $accordions = [
            ['title' => 'Image Accordion #1', 'content' => 'Image Accordion Content Goes Here!', 'order' => 1],
            ['title' => 'Image Accordion #2', 'content' => 'Image Accordion Content Goes Here!', 'order' => 2],
            ['title' => 'Image Accordion #3', 'content' => 'Image Accordion Content Goes Here!', 'order' => 3],
            ['title' => 'Image Accordion #4', 'content' => 'Image Accordion Content Goes Here!', 'order' => 4],
        ];

        foreach ($accordions as $accordion) {
            Accordion::create($accordion);
        }
    }
}
