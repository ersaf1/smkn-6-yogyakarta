<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // General
            ['group' => 'general', 'key' => 'site_name', 'value' => 'SMK Negeri 6 Yogyakarta', 'type' => 'text'],
            ['group' => 'general', 'key' => 'logo', 'value' => 'images/logo.png', 'type' => 'image'],
            ['group' => 'general', 'key' => 'favicon', 'value' => '', 'type' => 'image'],
            ['group' => 'general', 'key' => 'kepala_sekolah_name', 'value' => 'Mujari, S.Pd, M.Pd', 'type' => 'text'],
            ['group' => 'general', 'key' => 'kepala_sekolah_photo', 'value' => 'images/staff/kepala-sekolah.png', 'type' => 'image'],
            ['group' => 'general', 'key' => 'kepala_sekolah_title', 'value' => 'Kepala Sekolah', 'type' => 'text'],
            ['group' => 'general', 'key' => 'sambutan_text', 'value' => 'Dengan memanjatkan puji syukur ke hadirat Tuhan Yang Maha Esa akhirnya kami dapat menyelesaikan revisi website SMK N 6 Yogyakarta. Website ini dapat terselesaikan dengan baik berkat kerjasama dari berbagai pihak terutama Bapak/Ibu Guru SMK Negeri 6 Yogyakarta.', 'type' => 'textarea'],

            // Contact
            ['group' => 'contact', 'key' => 'address', 'value' => 'Jl. Kenari No.4, Semaki, Kec. Umbulharjo, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55166', 'type' => 'textarea'],
            ['group' => 'contact', 'key' => 'phone', 'value' => '0274 512251', 'type' => 'phone'],
            ['group' => 'contact', 'key' => 'email', 'value' => 'smkn6yk@gmail.com', 'type' => 'email'],
            ['group' => 'contact', 'key' => 'email_secondary', 'value' => 'mail@smkn6yk.sch.id', 'type' => 'email'],
            ['group' => 'contact', 'key' => 'work_hours', 'value' => "Senin – Kamis : 07.00 – 15.30 WIB\nJumat : 07.00 – 14.00 WIB", 'type' => 'textarea'],

            // Social Media
            ['group' => 'social', 'key' => 'instagram', 'value' => 'https://www.instagram.com/smkn6yogyakarta', 'type' => 'url'],
            ['group' => 'social', 'key' => 'youtube', 'value' => 'https://youtube.com/@smkn6yogyakartaofficial', 'type' => 'url'],
            ['group' => 'social', 'key' => 'facebook', 'value' => '', 'type' => 'url'],
            ['group' => 'social', 'key' => 'twitter', 'value' => '', 'type' => 'url'],

            // SEO
            ['group' => 'seo', 'key' => 'meta_title', 'value' => 'SMK Negeri 6 Yogyakarta - Sekolah Unggul', 'type' => 'text'],
            ['group' => 'seo', 'key' => 'meta_description', 'value' => 'SMK Negeri 6 Yogyakarta merupakan sekolah menengah kejuruan unggulan di Yogyakarta dengan berbagai program keahlian.', 'type' => 'textarea'],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
