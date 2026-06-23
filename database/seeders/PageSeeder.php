<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            [
                'title' => 'Sambutan Kepala Sekolah',
                'slug' => 'sambutan-kepala-sekolah',
                'content' => '<p>Dengan memanjatkan puji syukur ke hadirat Tuhan Yang Maha Esa akhirnya kami dapat menyelesaikan revisi website SMK N 6 Yogyakarta. Website ini dapat terselesaikan dengan baik berkat kerjasama dari berbagai pihak terutama Bapak/Ibu Guru SMK Negeri 6 Yogyakarta. Pembangunan website SMK Negeri 6 ini dilaksanakan dalam upaya penyediaan dan pelayanan informasi serta memenuhi kebutuhan masyarakat / instansi /institusi yang semoga keberadaannya memberikan kemanfaatan dan dapat memenuhi tuntutan keterbukaan informasi publik.</p><p>Dengan website www.smkn6yk.sch.id diharapkan kepada semua pengunjung dapat menjaga dan memelihara keaslian data serta informasi lainnya, sehingga kemanfaatannya dapat berlangsung dengan baik dan dengan mudah dapat di akses.</p><p>Saran dan kritik membangun sangat kami harapkan untuk kesempurnaan informasi yang disampaikan kepada masyarakat. Akhirnya kami mengucapkan terima kasih dan selamat datang di website kami.</p><p>Kepala Sekolah,<br>Mujari, S.Pd, M.Pd</p>',
                'is_published' => true,
            ],
            [
                'title' => 'Sejarah Sekolah',
                'slug' => 'sejarah-sekolah',
                'content' => '<p>1. Berdiri sebelum 1946, dengan nama SGKP (Sekolah Guru Kepandaian Putri) dan pada tahun tersebut pindah dari Jakarta ke Yogyakarta karena Yogyakarta menjadi ibukota Republik Indonesia. Beralamat di Jln Hayam Wuruk no 11. Dengan Kepala Sekolah ibu Kartini Prawirotanoyo, sekolah ini mempunyai kelas A = Masak, B = Menjahit dan C = Kerajinan.</p><p>2. Pada tahun 1964 berganti nama menjadi SKKA (Sekolah Kesejahteraan Keluarga Atas), dan pada 1971 sekolah ini menempati gedung di jalan Kenari 2, kemudian di jln Kenari 4. Dengan Kepala Sekolah ibu Roemijati Soegiharto sekolah ini mempunyai Jurusan Tata Boga, Tata Busana dan Tata Graha.</p><p>3. Pada tahun 1974 nama sekolah bukan lagi SKKA melainkan SMKK (Sekolah Menengah Kesejahteraan Keluarga) sekolah ini di kepalai oleh Ibu Suwarni, sampai dengan beliau purna tugas dan di lanjutkan oleh PLH ibu Supartini selama belum ada Kepala Sekolah pengganti (1980 s.d 1990).</p><p>4. Tahun 1996 nama SMKK berubah menjadi SMKN 6 (Sekolah Menengah Kejuruan).</p>',
                'is_published' => true,
            ],
            [
                'title' => 'Visi Misi',
                'slug' => 'visi-misi',
                'content' => '<h4>VISI</h4><p>Menghasilkan tamatan unggul mampu bersaing di tingkat global.</p><h4>MISI</h4><ol><li>Mewujudkan Sumber Daya Manusia yang Profesional, Dedikasi tinggi, Unggul, Kreatif, dan Inovatif, serta berakhlak mulia, peduli terhadap lingkungan, dan berakar pada budaya bangsa</li><li>Mewujudkan manajemen sekolah yang mandiri dan melakukan pelayanan prima</li><li>Mewujudkan tamatan yang berkebhinekaan global</li><li>Menyiapkan tamatan mampu berwirausaha</li><li>Mewujudkan kemitraan yang bermakna dengan Dunia Kerja Nasional dan Internasional</li><li>Melaksanakan pembelajaran berbasis kompetensi standar internasional</li><li>Mewujudkan sarana prasarana berstandar industri</li></ol><h4>MOTTO</h4><p>"Young Entrepreneur School"</p>',
                'is_published' => true,
            ],
            [
                'title' => 'Struktur Organisasi',
                'slug' => 'struktur-organisasi',
                'content' => '<p>Konten Struktur Organisasi akan diisi melalui admin panel.</p>',
                'is_published' => true,
            ],
            [
                'title' => 'Sarana Prasarana',
                'slug' => 'saran-prasarana',
                'content' => '<p>Konten Sarana Prasarana akan diisi melalui admin panel.</p>',
                'is_published' => true,
            ],
            [
                'title' => 'Prestasi Sekolah',
                'slug' => 'prestasi-sekolah',
                'content' => '<p>Konten Prestasi Sekolah akan diisi melalui admin panel.</p>',
                'is_published' => true,
            ],
            [
                'title' => 'Program Unggulan',
                'slug' => 'program-unggulan',
                'content' => '<p>Konten Program Unggulan akan diisi melalui admin panel.</p>',
                'is_published' => true,
            ],
            [
                'title' => 'Relasi DU/DI',
                'slug' => 'relasi-du-di',
                'content' => '<p>Konten Relasi DU/DI akan diisi melalui admin panel.</p>',
                'is_published' => true,
            ],
            [
                'title' => 'BKK SMKN 6 Yogyakarta',
                'slug' => 'bkk-smkn-6-yogyakarta',
                'content' => '<p>Konten BKK SMKN 6 Yogyakarta akan diisi melalui admin panel.</p>',
                'is_published' => true,
            ],
            [
                'title' => 'Pendataan Lulusan',
                'slug' => 'pendataan-lulusan',
                'content' => '<p>Konten Pendataan Lulusan akan diisi melalui admin panel.</p>',
                'is_published' => true,
            ],
            [
                'title' => 'Katalog',
                'slug' => 'katalog',
                'content' => '<p>Konten Katalog akan diisi melalui admin panel.</p>',
                'is_published' => true,
            ],
            [
                'title' => 'SK TIM LSP',
                'slug' => 'sk-tim-lsp',
                'content' => '<p>Konten SK TIM LSP akan diisi melalui admin panel.</p>',
                'is_published' => true,
            ],
        ];

        foreach ($pages as $page) {
            Page::create($page);
        }
    }
}
