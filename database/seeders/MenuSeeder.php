<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $mainMenu = Menu::firstOrCreate(
            ['slug' => 'main-menu'],
            ['name' => 'Main Menu']
        );

        MenuItem::firstOrCreate(
            ['menu_id' => $mainMenu->id, 'title' => 'Home'],
            ['url' => '/', 'order' => 1, 'is_active' => true]
        );

        $profil = MenuItem::firstOrCreate(
            ['menu_id' => $mainMenu->id, 'title' => 'Profil'],
            ['url' => '#', 'order' => 2, 'is_active' => true]
        );

        $profilChildren = [
            ['title' => 'Sambutan Kepala Sekolah', 'url' => '/sambutan-kepala-sekolah', 'order' => 1],
            ['title' => 'Sejarah Sekolah', 'url' => '/sejarah-sekolah', 'order' => 2],
            ['title' => 'Visi Misi', 'url' => '/visi-misi', 'order' => 3],
            ['title' => 'Struktur Organisasi', 'url' => '/struktur-organisasi', 'order' => 4],
            ['title' => 'Saran Prasarana', 'url' => '/saran-prasarana', 'order' => 5],
            ['title' => 'Prestasi Sekolah', 'url' => '/prestasi-sekolah', 'order' => 6],
            ['title' => 'Program Unggulan', 'url' => '/program-unggulan', 'order' => 7],
            ['title' => 'Relasi DU/DI', 'url' => '/relasi-du-di', 'order' => 8],
        ];

        foreach ($profilChildren as $child) {
            MenuItem::firstOrCreate(
                ['menu_id' => $mainMenu->id, 'parent_id' => $profil->id, 'title' => $child['title']],
                ['url' => $child['url'], 'order' => $child['order'], 'is_active' => true]
            );
        }

        MenuItem::firstOrCreate(
            ['menu_id' => $mainMenu->id, 'title' => 'Website Lama'],
            ['url' => 'https://site.smkn6yk.sch.id', 'order' => 3, 'open_new_tab' => true, 'is_active' => true]
        );

        MenuItem::firstOrCreate(
            ['menu_id' => $mainMenu->id, 'title' => 'Guru & Karyawan'],
            ['url' => '/guru-karyawan', 'order' => 4, 'is_active' => true]
        );

        $kompetensi = MenuItem::firstOrCreate(
            ['menu_id' => $mainMenu->id, 'title' => 'Kompetensi Keahlian'],
            ['url' => '#', 'order' => 5, 'is_active' => true]
        );

        $kompetensiChildren = [
            ['title' => 'Usaha Perjalanan Wisata', 'url' => '/kompetensi-keahlian/usaha-perjalanan-wisata', 'order' => 1],
            ['title' => 'Perhotelan', 'url' => '/kompetensi-keahlian/perhotelan', 'order' => 2],
            ['title' => 'Kuliner', 'url' => '/kompetensi-keahlian/kuliner', 'order' => 3],
            ['title' => 'Tata Kecantikan Rambut dan Kulit (3th)', 'url' => '/kompetensi-keahlian/tata-kecantikan-rambut-kulit', 'order' => 4],
            ['title' => 'Tata Busana', 'url' => '/kompetensi-keahlian/tata-busana', 'order' => 5],
            ['title' => 'SPA & Beauty Therapy (4th)', 'url' => '/kompetensi-keahlian/spa-beauty-therapy-4th', 'order' => 6],
        ];

        foreach ($kompetensiChildren as $child) {
            MenuItem::firstOrCreate(
                ['menu_id' => $mainMenu->id, 'parent_id' => $kompetensi->id, 'title' => $child['title']],
                ['url' => $child['url'], 'order' => $child['order'], 'is_active' => true]
            );
        }

        $siswa = MenuItem::firstOrCreate(
            ['menu_id' => $mainMenu->id, 'title' => 'Siswa'],
            ['url' => '#', 'order' => 6, 'is_active' => true]
        );

        MenuItem::firstOrCreate(
            ['menu_id' => $mainMenu->id, 'parent_id' => $siswa->id, 'title' => 'Prestasi'],
            ['url' => '/prestasi', 'order' => 1, 'is_active' => true]
        );

        MenuItem::firstOrCreate(
            ['menu_id' => $mainMenu->id, 'parent_id' => $siswa->id, 'title' => 'Ekstrakulikuler'],
            ['url' => '/ekstrakulikuler', 'order' => 2, 'is_active' => true]
        );

        $fitur = MenuItem::firstOrCreate(
            ['menu_id' => $mainMenu->id, 'title' => 'Fitur'],
            ['url' => '#', 'order' => 7, 'is_active' => true]
        );

        MenuItem::firstOrCreate(
            ['menu_id' => $mainMenu->id, 'parent_id' => $fitur->id, 'title' => 'Galeri Foto'],
            ['url' => '/galeri-foto', 'order' => 1, 'is_active' => true]
        );

        MenuItem::firstOrCreate(
            ['menu_id' => $mainMenu->id, 'parent_id' => $fitur->id, 'title' => 'Dapodik'],
            ['url' => 'http://www.smkn6jogja.sch.id/data-dapodik', 'order' => 2, 'open_new_tab' => true, 'is_active' => true]
        );

        MenuItem::firstOrCreate(
            ['menu_id' => $mainMenu->id, 'parent_id' => $fitur->id, 'title' => 'Erapor'],
            ['url' => 'http://erapor.smkn6jogja.sch.id:8154/', 'order' => 3, 'open_new_tab' => true, 'is_active' => true]
        );

        $lsp = MenuItem::firstOrCreate(
            ['menu_id' => $mainMenu->id, 'parent_id' => $fitur->id, 'title' => 'LSP'],
            ['url' => '#', 'order' => 4, 'is_active' => true]
        );

        MenuItem::firstOrCreate(
            ['menu_id' => $mainMenu->id, 'parent_id' => $lsp->id, 'title' => 'SK TIM LSP'],
            ['url' => '/sk-tim-lsp', 'order' => 1, 'is_active' => true]
        );

        MenuItem::firstOrCreate(
            ['menu_id' => $mainMenu->id, 'parent_id' => $fitur->id, 'title' => 'Pemetaan PMP'],
            ['url' => 'http://pmp.dikdasmen.kemdikbud.go.id:1745/', 'order' => 5, 'open_new_tab' => true, 'is_active' => true]
        );

        MenuItem::firstOrCreate(
            ['menu_id' => $mainMenu->id, 'parent_id' => $fitur->id, 'title' => 'Video'],
            ['url' => '/video', 'order' => 6, 'is_active' => true]
        );

        MenuItem::firstOrCreate(
            ['menu_id' => $mainMenu->id, 'parent_id' => $fitur->id, 'title' => 'Download'],
            ['url' => '/download', 'order' => 7, 'is_active' => true]
        );

        $lulusan = MenuItem::firstOrCreate(
            ['menu_id' => $mainMenu->id, 'title' => 'Lulusan'],
            ['url' => '#', 'order' => 8, 'is_active' => true]
        );

        MenuItem::firstOrCreate(
            ['menu_id' => $mainMenu->id, 'parent_id' => $lulusan->id, 'title' => 'BKK SMKN 6 Yogyakarta'],
            ['url' => '/bkk-smkn-6-yogyakarta', 'order' => 1, 'is_active' => true]
        );

        MenuItem::firstOrCreate(
            ['menu_id' => $mainMenu->id, 'parent_id' => $lulusan->id, 'title' => 'Pendataan Lulusan'],
            ['url' => '/pendataan-lulusan', 'order' => 2, 'is_active' => true]
        );

        MenuItem::firstOrCreate(
            ['menu_id' => $mainMenu->id, 'title' => 'Katalog'],
            ['url' => '/katalog', 'order' => 9, 'is_active' => true]
        );

        MenuItem::firstOrCreate(
            ['menu_id' => $mainMenu->id, 'title' => 'Hubungi Kami'],
            ['url' => '/hubungi-kami', 'order' => 10, 'is_active' => true]
        );
    }
}
