<?php

namespace Database\Seeders;

use App\Models\Accordion;
use App\Models\Achievement;
use App\Models\Competency;
use App\Models\ContactMessage;
use App\Models\Download;
use App\Models\Extracurricular;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Page;
use App\Models\Partner;
use App\Models\Slider;
use App\Models\Statistic;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DummySeeder extends Seeder
{
    public function run(): void
    {
        $this->createUsers();
        $this->createSliders();
        $this->createNewsCategories();
        $this->createNews();
        $this->createPartners();
        $this->createTeachers();
        $this->createGalleryCategories();
        $this->createGalleries();
        $this->createAchievements();
        $this->createExtracurriculars();
        $this->createDownloads();
        $this->createContactMessages();
        $this->createAccordions();
        $this->createVideos();
        $this->createVideoBanners();
        $this->updatePages();
        $this->updateCompetencies();
        $this->updateStatistics();
    }

    private function createUsers(): void
    {
        User::firstOrCreate(
            ['email' => 'operator@smkn6yk.sch.id'],
            [
                'name' => 'Operator Sekolah',
                'password' => Hash::make('password'),
            ]
        );

        User::firstOrCreate(
            ['email' => 'kepsek@smkn6yk.sch.id'],
            [
                'name' => 'Kepala Sekolah',
                'password' => Hash::make('password'),
            ]
        );

        User::factory()->count(5)->create();
    }

    private function createVideos(): void
    {
        $videoItems = [
            [
                'title' => 'Profil Usaha Perjalanan Wisata',
                'description' => 'Program keahlian Usaha Perjalanan Wisata SMKN 6 Yogyakarta',
                'section' => 'video',
                'video_file' => 'videos/upw.mp4',
                'order' => 1,
            ],
            [
                'title' => 'Profil Perhotelan',
                'description' => 'Program keahlian Perhotelan SMKN 6 Yogyakarta',
                'section' => 'video',
                'video_file' => 'videos/perhotelan.mp4',
                'order' => 2,
            ],
            [
                'title' => 'Profil Kuliner',
                'description' => 'Program keahlian Kuliner SMKN 6 Yogyakarta',
                'section' => 'video',
                'video_file' => 'videos/kuliner.mp4',
                'order' => 3,
            ],
        ];

        foreach ($videoItems as $v) {
            \App\Models\Video::factory()->create($v);
        }
    }

    private function createVideoBanners(): void
    {
        $banners = [
            [
                'title' => 'Profil SMKN 6 Yogyakarta',
                'description' => 'Video profil sekolah menengah kejuruan negeri 6 Yogyakarta',
                'section' => 'banner',
                'video_file' => 'videos/banner/profil-sekolah.mp4',
                'order' => 1,
            ],
            [
                'title' => 'Fasilitas Sekolah',
                'description' => 'Tour fasilitas lengkap SMKN 6 Yogyakarta',
                'section' => 'banner',
                'video_file' => 'videos/banner/fasilitas.mp4',
                'order' => 2,
            ],
            [
                'title' => 'Kegiatan PPDB 2026',
                'description' => 'Informasi Penerimaan Peserta Didik Baru tahun ajaran 2026/2027',
                'section' => 'banner',
                'video_file' => 'videos/banner/ppdb-2026.mp4',
                'order' => 3,
            ],
            [
                'title' => 'Praktik Kerja Lapangan',
                'description' => 'Kegiatan PKL siswa di industri mitra',
                'section' => 'banner',
                'video_file' => 'videos/banner/pkl.mp4',
                'order' => 4,
            ],
            [
                'title' => 'Ekstrakurikuler Unggulan',
                'description' => 'Kegiatan ekstrakurikuler SMKN 6 Yogyakarta',
                'section' => 'banner',
                'video_file' => 'videos/banner/ekskul.mp4',
                'order' => 5,
            ],
            [
                'title' => 'Prestasi Siswa',
                'description' => 'Deretan prestasi siswa SMKN 6 Yogyakarta',
                'section' => 'banner',
                'video_file' => 'videos/banner/prestasi.mp4',
                'order' => 6,
            ],
        ];

        foreach ($banners as $b) {
            \App\Models\Video::factory()->create($b);
        }
    }

    private function createSliders(): void
    {
        Slider::factory()->create([
            'title' => 'SMKN 6 YOGYAKARTA',
            'subtitle' => 'Young Entrepreneur School - Mencetak Generasi Unggul, Kreatif, dan Berdaya Saing Global',
            'button_text' => 'Profil Sekolah',
            'button_url' => '/profil-sekolah',
            'image' => 'images/slider/slider1.jpg',
            'order' => 1,
        ]);

        Slider::factory()->create([
            'title' => 'PENERIMAAN PESERTA DIDIK BARU',
            'subtitle' => 'Bergabunglah bersama SMKN 6 Yogyakarta dan wujudkan masa depanmu di bidang pariwisata, kuliner, dan fashion',
            'button_text' => 'Daftar Sekarang',
            'button_url' => '/ppdb',
            'image' => 'images/slider/slider2.jpg',
            'order' => 2,
        ]);

        Slider::factory()->create([
            'title' => '5 PROGRAM KEAHLIAN UNGGULAN',
            'subtitle' => 'Usaha Perjalanan Wisata, Perhotelan, Kuliner, Kecantikan & SPA, Tata Busana - Siap Kerja, Siap Wirausaha',
            'button_text' => 'Lihat Program',
            'button_url' => '/kompetensi-keahlian',
            'image' => 'images/slider/slider1.jpg',
            'order' => 3,
        ]);
    }

    private function createNewsCategories(): void
    {
        $categories = [
            ['name' => 'Berita Sekolah', 'description' => 'Informasi dan berita terbaru seputar kegiatan SMKN 6 Yogyakarta'],
            ['name' => 'Prestasi', 'description' => 'Pencapaian dan prestasi siswa dan guru SMKN 6 Yogyakarta'],
            ['name' => 'Pengumuman', 'description' => 'Pengumuman resmi SMKN 6 Yogyakarta untuk siswa, guru, dan orang tua'],
            ['name' => 'Kegiatan', 'description' => 'Liputan kegiatan belajar mengajar, praktik, dan event sekolah'],
            ['name' => 'Informasi Akademik', 'description' => 'Informasi terkait jadwal pelajaran, ujian, dan kalender akademik'],
            ['name' => 'Kerjasama Industri', 'description' => 'Kemitraan dan kerjasama dengan Dunia Usaha dan Dunia Industri'],
        ];

        foreach ($categories as $i => $c) {
            NewsCategory::factory()->create([
                'name' => $c['name'],
                'description' => $c['description'],
                'order' => $i + 1,
            ]);
        }
    }

    private function createNews(): void
    {
        $newsItems = [
            [
                'category_id' => 1, 'title' => 'Gema Sekolah Widya Pratita Edisi II Tahun 2026',
                'excerpt' => 'SMKN 6 Yogyakarta kembali menghadirkan inovasi literasi dan publikasi sekolah melalui penerbitan majalah digital bulanan Gema Sekolah Widya Pratita Edisi II Bulan Maret–April 2026.',
                'content' => '<p>SMKN 6 Yogyakarta kembali menghadirkan inovasi literasi dan publikasi sekolah melalui penerbitan majalah digital bulanan Gema Sekolah Widya Pratita Edisi II Bulan Maret–April 2026.</p><p>Mengusung tema "Wahana Aksi, Dedikasi, Edukasi, dan Inspirasi", majalah ini menjadi wujud nyata komitmen sekolah dalam dunia literasi.</p><p>Majalah ini memuat berbagai artikel menarik mulai dari kegiatan sekolah, prestasi siswa, hingga informasi penting lainnya yang relevan dengan dunia pendidikan vokasi.</p>',
                'is_featured' => true, 'published_at' => '2026-05-13 08:00:00',
            ],
            [
                'category_id' => 3, 'title' => 'Tes Kemampuan Akademik Daerah (TKAD) DIY 2026',
                'excerpt' => 'Bagi kamu lulusan luar Daerah Istimewa Yogyakarta jenjang SMP/MTs/Paket B/Wustha, ini kesempatanmu untuk mengikuti TKAD DIY.',
                'content' => '<p>Ayo Ikuti Tes Kemampuan Akademik Daerah (TKAD) DIY 2026! Bagi kamu lulusan luar Daerah Istimewa Yogyakarta jenjang SMP/MTs/Paket B/Wustha, ini kesempatanmu untuk mengikuti TKAD DIY.</p><p>Pendaftaran: 4 – 12 Mei 2026. Daftar online melalui: https://spmb.jogjaprov.go.id</p>',
                'is_featured' => false, 'published_at' => '2026-05-05 08:00:00',
            ],
            [
                'category_id' => 3, 'title' => 'Sistem Penerimaan Murid Baru (SPMB) Tahun Ajaran 2026/2027',
                'excerpt' => 'SMK Negeri 6 Yogyakarta membuka Sistem Penerimaan Murid Baru (SPMB) Tahun Ajaran 2026/2027.',
                'content' => '<p>SMK Negeri 6 Yogyakarta dengan bangga membuka Sistem Penerimaan Murid Baru (SPMB) Tahun Ajaran 2026/2027 sebagai wujud komitmen dalam mencetak generasi unggul, terampil, dan siap bersaing di dunia kerja maupun wirausaha.</p><p>Pendaftaran dibuka mulai 1 Juni 2026 melalui portal resmi SPMB DIY.</p>',
                'is_featured' => true, 'published_at' => '2026-05-05 08:00:00',
            ],
            [
                'category_id' => 2, 'title' => 'Juara 1 Lomba Kompetensi Siswa Tingkat Provinsi DIY Bidang Restaurant Service',
                'excerpt' => 'Siswa SMKN 6 Yogyakarta berhasil meraih Juara 1 dalam LKS tingkat Provinsi DIY.',
                'content' => '<p>Siswa SMKN 6 Yogyakarta berhasil meraih Juara 1 dalam Lomba Kompetensi Siswa (LKS) tingkat Provinsi DIY bidang Restaurant Service.</p><p>Prestasi ini membuktikan kualitas pendidikan vokasi di SMKN 6 Yogyakarta yang mampu bersaing di tingkat provinsi maupun nasional.</p>',
                'is_featured' => true, 'published_at' => '2026-04-20 08:00:00',
            ],
            [
                'category_id' => 4, 'title' => 'Kerjasama SMKN 6 Yogyakarta dengan Hotel Berbintang untuk Program Magang',
                'excerpt' => 'SMKN 6 Yogyakarta menjalin kerjasama dengan beberapa hotel berbintang di Yogyakarta.',
                'content' => '<p>SMKN 6 Yogyakarta menjalin kerjasama dengan beberapa hotel berbintang di Yogyakarta untuk program magang siswa.</p><p>Kerjasama ini bertujuan untuk memberikan pengalaman kerja nyata kepada siswa sebelum lulus.</p>',
                'is_featured' => false, 'published_at' => '2026-04-10 08:00:00',
            ],
            [
                'category_id' => 4, 'title' => 'Workshop Kewirausahaan untuk Siswa Kelas XII',
                'excerpt' => 'SMKN 6 Yogyakarta menyelenggarakan workshop kewirausahaan bagi siswa kelas XII.',
                'content' => '<p>SMKN 6 Yogyakarta menyelenggarakan workshop kewirausahaan bagi siswa kelas XII sebagai bekal memasuki dunia kerja.</p><p>Workshop ini menghadirkan pelaku usaha sukses sebagai narasumber.</p>',
                'is_featured' => false, 'published_at' => '2026-03-25 08:00:00',
            ],
            [
                'category_id' => 1, 'title' => 'Upacara Peringatan Hari Pendidikan Nasional 2026',
                'excerpt' => 'SMKN 6 Yogyakarta menggelar upacara peringatan Hardiknas 2026 dengan khidmat.',
                'content' => '<p>SMKN 6 Yogyakarta menggelar upacara peringatan Hari Pendidikan Nasional 2026 di halaman sekolah.</p><p>Upacara diikuti oleh seluruh siswa, guru, dan karyawan dengan penuh semangat.</p>',
                'is_featured' => false, 'published_at' => '2026-05-02 08:00:00',
            ],
            [
                'category_id' => 5, 'title' => 'Jadwal Ujian Akhir Semester Genap 2025/2026',
                'excerpt' => 'Berikut adalah jadwal pelaksanaan Ujian Akhir Semester Genap tahun ajaran 2025/2026.',
                'content' => '<p>Ujian Akhir Semester Genap tahun ajaran 2025/2026 akan dilaksanakan pada tanggal 9-16 Juni 2026.</p><p>Seluruh siswa diharapkan mempersiapkan diri dengan sebaik-baiknya.</p>',
                'is_featured' => false, 'published_at' => '2026-05-20 08:00:00',
            ],
            [
                'category_id' => 6, 'title' => 'MoU dengan Hotel Manohara Yogyakarta',
                'excerpt' => 'SMKN 6 Yogyakarta resmi menjalin kerjasama dengan Hotel Manohara Yogyakarta.',
                'content' => '<p>SMKN 6 Yogyakarta dan Hotel Manohara Yogyakarta resmi menandatangani Nota Kesepahaman (MoU) untuk program magang dan rekrutmen.</p><p>Kerjasama ini diharapkan dapat meningkatkan kompetensi siswa program keahlian Perhotelan.</p>',
                'is_featured' => false, 'published_at' => '2026-04-15 08:00:00',
            ],
            [
                'category_id' => 2, 'title' => 'Siswa Tata Busana Juara 1 Fashion Show Tingkat Nasional',
                'excerpt' => 'Siswa program keahlian Tata Busana meraih Juara 1 Fashion Show tingkat Nasional.',
                'content' => '<p>Prestasi membanggakan kembali diraih oleh siswa SMKN 6 Yogyakarta. Kali ini dari program keahlian Tata Busana yang berhasil meraih Juara 1 Fashion Show tingkat Nasional.</p><p>Karya busana yang ditampilkan mengusung konsep wastra nusantara dengan sentuhan modern.</p>',
                'is_featured' => true, 'published_at' => '2026-03-10 08:00:00',
            ],
            [
                'category_id' => 4, 'title' => 'Kegiatan Bakti Sosial PMR SMKN 6 Yogyakarta',
                'excerpt' => 'PMR SMKN 6 Yogyakarta mengadakan kegiatan bakti sosial di Panti Asuhan.',
                'content' => '<p>Palang Merah Remaja (PMR) SMKN 6 Yogyakarta mengadakan kegiatan bakti sosial ke Panti Asuhan Putra Harapan.</p><p>Kegiatan ini diisi dengan donor darah, pemeriksaan kesehatan, dan santunan anak yatim.</p>',
                'is_featured' => false, 'published_at' => '2026-02-15 08:00:00',
            ],
            [
                'category_id' => 3, 'title' => 'Libur Semester Genap Tahun Ajaran 2025/2026',
                'excerpt' => 'Informasi libur semester genap dan jadwal masuk sekolah tahun ajaran baru.',
                'content' => '<p>Libur semester genap tahun ajaran 2025/2026 dimulai pada 20 Juni - 13 Juli 2026.</p><p>Hari pertama masuk sekolah tahun ajaran 2026/2027 adalah 14 Juli 2026.</p>',
                'is_featured' => false, 'published_at' => '2026-06-10 08:00:00',
            ],
        ];

        foreach ($newsItems as $n) {
            News::factory()->create($n);
        }

        News::factory()->count(10)->create([
            'category_id' => fake()->numberBetween(1, 6),
            'user_id' => 1,
        ]);
    }

    private function createPartners(): void
    {
        $partners = [
            ['name' => 'New Topsy', 'logo' => 'images/partners/newtopsy.webp', 'url' => 'https://newtopsy.com'],
            ['name' => 'Manohara Hotel', 'logo' => 'images/partners/manohara.webp', 'url' => 'https://manoharahotel.com'],
            ['name' => 'Grand Hotel Yogyakarta', 'logo' => 'images/partners/grandhotel.webp', 'url' => ''],
            ['name' => 'Gram Hotel', 'logo' => 'images/partners/gramhotel.webp', 'url' => ''],
            ['name' => 'Hotel Ambarukmo', 'logo' => 'images/partners/ambarukmo.webp', 'url' => ''],
            ['name' => 'Bakpia Pathok', 'logo' => 'images/partners/bakpia.webp', 'url' => ''],
            ['name' => 'Chiyo Restaurant', 'logo' => 'images/partners/chiyo.webp', 'url' => ''],
            ['name' => 'JTTC', 'logo' => 'images/partners/jttc.webp', 'url' => ''],
            ['name' => 'Dewave', 'logo' => 'images/partners/dewave.webp', 'url' => ''],
            ['name' => 'Fania Spa', 'logo' => 'images/partners/fania.webp', 'url' => ''],
            ['name' => 'Royal Ambarukmo Hotel', 'logo' => null, 'url' => ''],
            ['name' => 'Sahid Jaya Hotel', 'logo' => null, 'url' => ''],
            ['name' => 'Hyatt Regency Yogyakarta', 'logo' => null, 'url' => ''],
            ['name' => 'Malioboro Inn', 'logo' => null, 'url' => ''],
            ['name' => 'Phoenix Hotel Yogyakarta', 'logo' => null, 'url' => ''],
        ];

        foreach ($partners as $i => $p) {
            Partner::factory()->create([
                'name' => $p['name'],
                'logo' => $p['logo'],
                'url' => $p['url'],
                'order' => $i + 1,
            ]);
        }

        Partner::factory()->count(10)->create();
    }

    private function createTeachers(): void
    {
        $teachers = [
            ['name' => 'Mujari, S.Pd, M.Pd', 'nip' => '196808151993031002', 'position' => 'Kepala Sekolah', 'department' => 'Manajemen', 'status' => 'guru', 'order' => 1],
            ['name' => 'Dra. Sri Wahyuni, M.Pd', 'nip' => '197005201998032001', 'position' => 'Wakil Kepala Sekolah Bidang Kurikulum', 'department' => 'Manajemen', 'status' => 'guru', 'order' => 2],
            ['name' => 'Drs. Bambang Setiawan, M.Pd', 'nip' => '196905101997031001', 'position' => 'Wakil Kepala Sekolah Bidang Kesiswaan', 'department' => 'Manajemen', 'status' => 'guru', 'order' => 3],
            ['name' => 'Rina Hartati, S.Pd', 'nip' => '198504152010012002', 'position' => 'Guru Mata Pelajaran', 'department' => 'Usaha Perjalanan Wisata', 'status' => 'guru', 'order' => 4],
            ['name' => 'Ahmad Fauzi, S.Sn', 'nip' => '198801202011011003', 'position' => 'Guru Produktif', 'department' => 'Perhotelan', 'status' => 'guru', 'order' => 5],
            ['name' => 'Siti Nurhaliza, S.Pd', 'nip' => '199001152015012004', 'position' => 'Guru Produktif', 'department' => 'Kuliner', 'status' => 'guru', 'order' => 6],
            ['name' => 'Dewi Kartika, S.Pd', 'nip' => '199203102016012005', 'position' => 'Guru Produktif', 'department' => 'Tata Kecantikan', 'status' => 'guru', 'order' => 7],
            ['name' => 'Putri Ayu Lestari, S.Pd', 'nip' => '199105252017012006', 'position' => 'Guru Produktif', 'department' => 'Tata Busana', 'status' => 'guru', 'order' => 8],
            ['name' => 'Dr. Sutrisno, M.Pd', 'nip' => '197508152005011002', 'position' => 'Wakil Kepala Sekolah Bidang Sarpras', 'department' => 'Manajemen', 'status' => 'guru', 'order' => 9],
            ['name' => 'Ani Susilowati, S.Pd', 'nip' => '198212052008012003', 'position' => 'Guru Normatif', 'department' => 'Bahasa Indonesia', 'status' => 'guru', 'order' => 10],
            ['name' => 'Drs. Haryanto', 'nip' => '196707151994031005', 'position' => 'Guru Normatif', 'department' => 'Pendidikan Agama', 'status' => 'guru', 'order' => 11],
            ['name' => 'Fitri Handayani, S.Pd', 'nip' => '198803152011012006', 'position' => 'Guru Adaptif', 'department' => 'Matematika', 'status' => 'guru', 'order' => 12],
            ['name' => 'Budi Santoso, S.Pd', 'nip' => '198605102010011007', 'position' => 'Guru Adaptif', 'department' => 'Bahasa Inggris', 'status' => 'guru', 'order' => 13],
            ['name' => 'Tri Wahyuni, S.Pd', 'nip' => '199208152015012008', 'position' => 'Guru Produktif', 'department' => 'Usaha Perjalanan Wisata', 'status' => 'guru', 'order' => 14],
            ['name' => 'Agus Prasetyo, S.Pd', 'nip' => '197912052008011009', 'position' => 'Guru Produktif', 'department' => 'Perhotelan', 'status' => 'guru', 'order' => 15],
            ['name' => 'Nurul Hidayah, S.Pd', 'nip' => '199101152014012007', 'position' => 'Guru Produktif', 'department' => 'Kuliner', 'status' => 'guru', 'order' => 16],
            ['name' => 'Eko Purwanto, S.Kom', 'nip' => '198407152009011008', 'position' => 'Staff Tata Usaha', 'department' => 'Manajemen', 'status' => 'karyawan', 'order' => 17],
            ['name' => 'Dian Lestari, A.Md', 'nip' => '198905152011012009', 'position' => 'Pustakawan', 'department' => 'Manajemen', 'status' => 'tendik', 'order' => 18],
            ['name' => 'Suparman', 'nip' => '197305152006011005', 'position' => 'Laboran', 'department' => 'Kuliner', 'status' => 'tendik', 'order' => 19],
            ['name' => 'Rohmat Widodo', 'nip' => '198010152008011010', 'position' => 'Satpam', 'department' => 'Manajemen', 'status' => 'karyawan', 'order' => 20],
        ];

        foreach ($teachers as $t) {
            Teacher::factory()->create($t);
        }

        Teacher::factory()->count(15)->create();
    }

    private function createGalleryCategories(): void
    {
        $categories = [
            ['name' => 'Kegiatan Sekolah', 'description' => 'Dokumentasi kegiatan sekolah sehari-hari'],
            ['name' => 'Praktik Kerja', 'description' => 'Dokumentasi praktik kerja siswa'],
            ['name' => 'Prestasi', 'description' => 'Dokumentasi pencapaian dan prestasi'],
            ['name' => 'Fasilitas Sekolah', 'description' => 'Foto-foto fasilitas dan infrastruktur sekolah'],
            ['name' => 'Event & Acara', 'description' => 'Dokumentasi event dan acara sekolah'],
            ['name' => 'Wisuda & Pelepasan', 'description' => 'Momen wisuda dan pelepasan siswa'],
        ];

        foreach ($categories as $i => $c) {
            GalleryCategory::factory()->create([
                'name' => $c['name'],
                'description' => $c['description'],
                'order' => $i + 1,
            ]);
        }
    }

    private function createGalleries(): void
    {
        $galleries = [
            ['category_id' => 1, 'title' => 'Upacara Bendera Hari Senin', 'description' => 'Kegiatan upacara bendera rutin setiap hari Senin'],
            ['category_id' => 1, 'title' => 'Peringatan Hardiknas 2026', 'description' => 'Peringatan Hari Pendidikan Nasional tahun 2026'],
            ['category_id' => 1, 'title' => 'Class Meeting Akhir Semester', 'description' => 'Kegiatan class meeting akhir semester genap'],
            ['category_id' => 1, 'title' => 'Senam Pagi Bersama', 'description' => 'Kegiatan senam pagi Jumat sehat'],
            ['category_id' => 2, 'title' => 'Praktik Memasak Siswa Kuliner', 'description' => 'Praktik memasak siswa program keahlian Kuliner'],
            ['category_id' => 2, 'title' => 'Praktik Front Office Siswa Perhotelan', 'description' => 'Praktik pelayanan front office siswa Perhotelan'],
            ['category_id' => 2, 'title' => 'Praktik Tour Guide Siswa UPW', 'description' => 'Praktik pemandu wisata siswa UPW'],
            ['category_id' => 2, 'title' => 'Praktik SPA Therapy', 'description' => 'Praktik SPA therapy siswa Tata Kecantikan'],
            ['category_id' => 2, 'title' => 'Praktik Menjahit Tata Busana', 'description' => 'Praktik menjahit siswa program Tata Busana'],
            ['category_id' => 3, 'title' => 'Juara LKS Restaurant Service', 'description' => 'Prestasi Juara 1 LKS tingkat Provinsi DIY'],
            ['category_id' => 3, 'title' => 'Juara Lomba Tata Kecantikan', 'description' => 'Prestasi di bidang tata kecantikan'],
            ['category_id' => 3, 'title' => 'Juara Fashion Show Nasional', 'description' => 'Prestasi Fashion Show tingkat Nasional'],
            ['category_id' => 4, 'title' => 'Laboratorium Komputer', 'description' => 'Fasilitas laboratorium komputer sekolah'],
            ['category_id' => 4, 'title' => 'Ruang Praktik Perhotelan', 'description' => 'Fasilitas ruang praktik perhotelan'],
            ['category_id' => 4, 'title' => 'Dapur Praktik Kuliner', 'description' => 'Fasilitas dapur praktik program Kuliner'],
            ['category_id' => 4, 'title' => 'Perpustakaan Sekolah', 'description' => 'Fasilitas perpustakaan sekolah'],
            ['category_id' => 4, 'title' => 'Ruang Kelas', 'description' => 'Ruang kelas yang nyaman dan representatif'],
            ['category_id' => 4, 'title' => 'Aula Serbaguna', 'description' => 'Aula serbaguna untuk berbagai kegiatan'],
            ['category_id' => 5, 'title' => 'Pentas Seni Akhir Tahun', 'description' => 'Gelar karya dan pentas seni siswa'],
            ['category_id' => 5, 'title' => 'Bazar Kewirausahaan', 'description' => 'Bazar produk kewirausahaan siswa'],
            ['category_id' => 6, 'title' => 'Wisuda Kelas XII 2025/2026', 'description' => 'Pelepasan siswa kelas XII tahun ajaran 2025/2026'],
            ['category_id' => 6, 'title' => 'Perpisahan Siswa PKL', 'description' => 'Acara perpisahan siswa selesai PKL'],
        ];

        foreach ($galleries as $g) {
            Gallery::factory()->create($g);
        }

        Gallery::factory()->count(15)->create();
    }

    private function createAchievements(): void
    {
        $achievements = [
            [
                'title' => 'Juara 1 LKS Restaurant Service Tingkat Provinsi DIY',
                'description' => 'Siswa SMKN 6 Yogyakarta meraih Juara 1 dalam LKS bidang Restaurant Service tingkat Provinsi DIY.',
                'content' => '<p>Siswa SMKN 6 Yogyakarta berhasil meraih Juara 1 dalam Lomba Kompetensi Siswa (LKS) tingkat Provinsi DIY bidang Restaurant Service.</p><p>Prestasi ini diraih oleh siswa program keahlian Perhotelan setelah melalui seleksi ketat dan persiapan yang matang.</p>',
                'year' => 2026, 'level' => 'Provinsi', 'order' => 1,
            ],
            [
                'title' => 'Juara 2 LKS Tata Kecantikan Tingkat Provinsi DIY',
                'description' => 'Siswa program Tata Kecantikan meraih Juara 2 dalam LKS tingkat Provinsi DIY.',
                'content' => '<p>Siswa program keahlian Tata Kecantikan Rambut dan Kulit berhasil meraih Juara 2 dalam LKS tingkat Provinsi DIY tahun 2026.</p>',
                'year' => 2026, 'level' => 'Provinsi', 'order' => 2,
            ],
            [
                'title' => 'Juara 1 Lomba Masak Tradisional Tingkat Kota Yogyakarta',
                'description' => 'Siswa program Kuliner meraih Juara 1 dalam lomba masak tradisional tingkat Kota Yogyakarta.',
                'content' => '<p>Siswa program keahlian Kuliner berhasil meraih Juara 1 dalam lomba masak tradisional tingkat Kota Yogyakarta dengan menu khas Yogyakarta.</p>',
                'year' => 2025, 'level' => 'Kota', 'order' => 3,
            ],
            [
                'title' => 'Juara 3 Tour Guide Competition Tingkat Nasional',
                'description' => 'Siswa UPW meraih Juara 3 Tour Guide Competition tingkat Nasional.',
                'content' => '<p>Siswa program keahlian Usaha Perjalanan Wisata meraih Juara 3 dalam Tour Guide Competition tingkat Nasional yang diselenggarakan di Jakarta.</p>',
                'year' => 2025, 'level' => 'Nasional', 'order' => 4,
            ],
            [
                'title' => 'Akreditasi A untuk Semua Program Keahlian',
                'description' => 'SMKN 6 Yogyakarta berhasil mempertahankan Akreditasi A untuk semua program keahlian.',
                'content' => '<p>SMKN 6 Yogyakarta berhasil mempertahankan predikat Akreditasi A untuk semua program keahlian yang ada.</p><p>Ini merupakan bukti komitmen sekolah dalam menjaga mutu pendidikan vokasi.</p>',
                'year' => 2024, 'level' => 'Nasional', 'order' => 5,
            ],
            [
                'title' => 'Juara 1 Fashion Show Tingkat Nasional',
                'description' => 'Siswa Tata Busana meraih Juara 1 Fashion Show tingkat Nasional.',
                'content' => '<p>Siswa program keahlian Tata Busana berhasil meraih Juara 1 dalam Fashion Show tingkat Nasional.</p><p>Karya yang ditampilkan mengusung konsep wastra nusantara dengan sentuhan desain modern.</p>',
                'year' => 2025, 'level' => 'Nasional', 'order' => 6,
            ],
            [
                'title' => 'Juara 2 SPA Therapy Competition Tingkat Provinsi',
                'description' => 'Siswa Kecantikan meraih Juara 2 SPA Therapy Competition tingkat Provinsi.',
                'content' => '<p>Siswa program keahlian Kecantikan & SPA meraih Juara 2 dalam SPA Therapy Competition tingkat Provinsi DIY.</p>',
                'year' => 2025, 'level' => 'Provinsi', 'order' => 7,
            ],
            [
                'title' => 'Sekolah Adiwiyata Tingkat Kota Yogyakarta',
                'description' => 'SMKN 6 Yogyakarta meraih penghargaan Sekolah Adiwiyata tingkat Kota.',
                'content' => '<p>SMKN 6 Yogyakarta berhasil meraih penghargaan Sekolah Adiwiyata tingkat Kota Yogyakarta atas kepedulian terhadap lingkungan.</p>',
                'year' => 2024, 'level' => 'Kota', 'order' => 8,
            ],
            [
                'title' => 'Juara 1 Paduan Suara Tingkat Provinsi DIY',
                'description' => 'Paduan Suara SMKN 6 Yogyakarta meraih Juara 1 tingkat Provinsi.',
                'content' => '<p>Ekstrakurikuler Paduan Suara SMKN 6 Yogyakarta berhasil meraih Juara 1 dalam lomba paduan suara tingkat Provinsi DIY.</p>',
                'year' => 2024, 'level' => 'Provinsi', 'order' => 9,
            ],
            [
                'title' => 'Juara 2 Futsal Competition Antar SMK Se-DIY',
                'description' => 'Tim Futsal SMKN 6 Yogyakarta meraih Juara 2 turnamen futsal antar SMK.',
                'content' => '<p>Tim Futsal SMKN 6 Yogyakarta berhasil meraih Juara 2 dalam turnamen futsal antar SMK se-Daerah Istimewa Yogyakarta.</p>',
                'year' => 2025, 'level' => 'Provinsi', 'order' => 10,
            ],
        ];

        foreach ($achievements as $a) {
            Achievement::factory()->create($a);
        }

        Achievement::factory()->count(10)->create();
    }

    private function createExtracurriculars(): void
    {
        $ekskuls = [
            [
                'name' => 'Pramuka', 'description' => 'Kegiatan kepramukaan untuk membentuk karakter dan kemandirian siswa.',
                'content' => '<p>Pramuka SMKN 6 Yogyakarta merupakan salah satu ekstrakurikuler wajib yang diikuti oleh seluruh siswa.</p><p>Kegiatan ini bertujuan untuk membentuk karakter disiplin, mandiri, dan gotong royong.</p>',
                'coach' => 'Drs. Bambang Setiawan, M.Pd', 'schedule' => 'Sabtu, 07.00 - 10.00 WIB', 'order' => 1,
            ],
            [
                'name' => 'Futsal', 'description' => 'Ekstrakurikuler futsal untuk mengembangkan bakat olahraga siswa.',
                'content' => '<p>Futsal SMKN 6 Yogyakarta aktif mengikuti berbagai kompetisi futsal antar SMA/SMK se-DIY.</p>',
                'coach' => 'Ahmad Fauzi, S.Sn', 'schedule' => 'Rabu & Jumat, 15.00 - 17.00 WIB', 'order' => 2,
            ],
            [
                'name' => 'English Club', 'description' => 'Klub bahasa Inggris untuk meningkatkan kemampuan berbahasa Inggris siswa.',
                'content' => '<p>English Club SMKN 6 Yogyakarta menjadi wadah bagi siswa yang ingin meningkatkan kemampuan berbahasa Inggris.</p>',
                'coach' => 'Rina Hartati, S.Pd', 'schedule' => 'Kamis, 15.00 - 16.30 WIB', 'order' => 3,
            ],
            [
                'name' => 'Paduan Suara', 'description' => 'Ekstrakurikuler paduan suara untuk mengembangkan bakat seni vokal siswa.',
                'content' => '<p>Paduan Suara SMKN 6 Yogyakarta sering tampil di berbagai acara sekolah dan kompetisi.</p>',
                'coach' => 'Dewi Kartika, S.Pd', 'schedule' => 'Selasa & Kamis, 15.00 - 16.30 WIB', 'order' => 4,
            ],
            [
                'name' => 'PMR (Palang Merah Remaja)', 'description' => 'Membentuk jiwa sosial dan kemanusiaan melalui kegiatan PMR.',
                'content' => '<p>PMR SMKN 6 Yogyakarta aktif dalam kegiatan bakti sosial, donor darah, dan pelatihan P3K.</p>',
                'coach' => 'Siti Nurhaliza, S.Pd', 'schedule' => 'Jumat, 14.00 - 16.00 WIB', 'order' => 5,
            ],
            [
                'name' => 'Seni Tari', 'description' => 'Ekstrakurikuler seni tari untuk melestarikan budaya nusantara.',
                'content' => '<p>Seni Tari SMKN 6 Yogyakarta mempelajari berbagai tarian tradisional nusantara maupun kreasi baru.</p>',
                'coach' => 'Tri Wahyuni, S.Pd', 'schedule' => 'Selasa, 15.00 - 17.00 WIB', 'order' => 6,
            ],
            [
                'name' => 'Paskibra', 'description' => 'Pasukan Pengibar Bendera untuk melatih kedisiplinan dan jiwa nasionalisme.',
                'content' => '<p>Paskibra SMKN 6 Yogyakarta bertugas dalam upacara bendera hari Senin dan hari besar nasional.</p>',
                'coach' => 'Budi Santoso, S.Pd', 'schedule' => 'Rabu & Sabtu, 15.00 - 17.00 WIB', 'order' => 7,
            ],
            [
                'name' => 'Voli', 'description' => 'Ekstrakurikuler bola voli untuk mengembangkan bakat olahraga.',
                'content' => '<p>Tim Voli SMKN 6 Yogyakarta rutin berlatih dan mengikuti turnamen voli antar sekolah.</p>',
                'coach' => 'Agus Prasetyo, S.Pd', 'schedule' => 'Kamis & Sabtu, 15.00 - 17.00 WIB', 'order' => 8,
            ],
            [
                'name' => 'Jurnalistik', 'description' => 'Ekstrakurikuler jurnalistik untuk mengembangkan bakat menulis dan publikasi.',
                'content' => '<p>Jurnalistik SMKN 6 Yogyakarta mengelola majalah sekolah, website, dan media sosial sekolah.</p>',
                'coach' => 'Ani Susilowati, S.Pd', 'schedule' => 'Kamis, 15.00 - 16.30 WIB', 'order' => 9,
            ],
        ];

        foreach ($ekskuls as $e) {
            Extracurricular::factory()->create($e);
        }

        Extracurricular::factory()->count(5)->create();
    }

    private function createDownloads(): void
    {
        $downloads = [
            ['title' => 'Brosur PPDB 2026/2027', 'description' => 'Brosur informasi Penerimaan Peserta Didik Baru tahun ajaran 2026/2027', 'file_type' => 'pdf', 'order' => 1],
            ['title' => 'Kalender Pendidikan 2025/2026', 'description' => 'Kalender pendidikan SMKN 6 Yogyakarta tahun ajaran 2025/2026', 'file_type' => 'pdf', 'order' => 2],
            ['title' => 'Formulir Pendaftaran Siswa Baru', 'description' => 'Formulir pendaftaran calon siswa baru SMKN 6 Yogyakarta', 'file_type' => 'pdf', 'order' => 3],
            ['title' => 'Panduan Praktik Kerja Lapangan (PKL)', 'description' => 'Panduan lengkap pelaksanaan PKL bagi siswa kelas XI', 'file_type' => 'pdf', 'order' => 4],
            ['title' => 'Jadwal Pelajaran Semester Genap', 'description' => 'Jadwal pelajaran semester genap tahun 2025/2026', 'file_type' => 'pdf', 'order' => 5],
            ['title' => 'Profil Sekolah', 'description' => 'Dokumen profil lengkap SMKN 6 Yogyakarta', 'file_type' => 'pdf', 'order' => 6],
            ['title' => 'Kurikulum Program Keahlian', 'description' => 'Dokumen kurikulum semua program keahlian', 'file_type' => 'pdf', 'order' => 7],
            ['title' => 'Formulir Pendaftaran PKL', 'description' => 'Formulir pendaftaran Praktik Kerja Lapangan', 'file_type' => 'docx', 'order' => 8],
        ];

        foreach ($downloads as $d) {
            Download::factory()->create($d);
        }

        Download::factory()->count(10)->create();
    }

    private function createContactMessages(): void
    {
        ContactMessage::factory()->count(25)->create();
    }

    private function createAccordions(): void
    {
        Accordion::query()->delete();

        $accordions = [
            [
                'title' => 'Kuliner Nusantara',
                'content' => '<p>Program keahlian Kuliner dengan fokus masakan nusantara dan internasional. Dilengkapi dengan dapur praktik berstandar industri dan tenaga pengajar profesional.</p>',
                'order' => 1,
            ],
            [
                'title' => 'Perhotelan Bintang Lima',
                'content' => '<p>Program keahlian Perhotelan dengan standar hotel bintang lima dan sertifikasi internasional. Siswa dibekali keterampilan front office, housekeeping, dan food & beverage service.</p>',
                'order' => 2,
            ],
            [
                'title' => 'Wisata & Pariwisata',
                'content' => '<p>Program keahlian Usaha Perjalanan Wisata dengan jaringan mitra travel nasional. Fokus pada tour guiding, ticketing, dan pengelolaan perjalanan wisata.</p>',
                'order' => 3,
            ],
            [
                'title' => 'Kecantikan & SPA Therapy',
                'content' => '<p>Program keahlian Tata Kecantikan Rambut dan Kulit dengan sertifikasi BNSP. Dilengkapi dengan laboratorium kecantikan dan SPA room berstandar industri.</p>',
                'order' => 4,
            ],
            [
                'title' => 'Tata Busana',
                'content' => '<p>Program keahlian Tata Busana dengan fokus pada desain fashion dan pembuatan busana. Siswa belajar dari desainer profesional dan mengikuti fashion show nasional.</p>',
                'order' => 5,
            ],
        ];

        foreach ($accordions as $a) {
            Accordion::factory()->create($a);
        }

        Accordion::factory()->count(3)->create();
    }

    private function updatePages(): void
    {
        Page::where('slug', 'sambutan-kepala-sekolah')->update([
            'featured_image' => 'images/staff/kepala-sekolah.png',
        ]);

        Page::where('slug', 'struktur-organisasi')->update([
            'content' => '<p>Berikut adalah struktur organisasi SMK Negeri 6 Yogyakarta:</p>
            <ul>
                <li><strong>Kepala Sekolah:</strong> Mujari, S.Pd, M.Pd</li>
                <li><strong>Wakil Kepala Sekolah Bidang Kurikulum:</strong> Dra. Sri Wahyuni, M.Pd</li>
                <li><strong>Wakil Kepala Sekolah Bidang Kesiswaan:</strong> Drs. Bambang Setiawan, M.Pd</li>
                <li><strong>Wakil Kepala Sekolah Bidang Sarana Prasarana:</strong> Dr. Sutrisno, M.Pd</li>
                <li><strong>Wakil Kepala Sekolah Bidang Humas:</strong> Rina Hartati, S.Pd</li>
                <li><strong>Kepala Program Keahlian UPW:</strong> Tri Wahyuni, S.Pd</li>
                <li><strong>Kepala Program Keahlian Perhotelan:</strong> Agus Prasetyo, S.Pd</li>
                <li><strong>Kepala Program Keahlian Kuliner:</strong> Nurul Hidayah, S.Pd</li>
                <li><strong>Kepala Program Keahlian Tata Kecantikan:</strong> Dewi Kartika, S.Pd</li>
                <li><strong>Kepala Program Keahlian Tata Busana:</strong> Putri Ayu Lestari, S.Pd</li>
            </ul>',
        ]);

        Page::where('slug', 'saran-prasarana')->update([
            'content' => '<p>SMK Negeri 6 Yogyakarta memiliki sarana dan prasarana yang lengkap untuk mendukung proses belajar mengajar:</p>
            <ul>
                <li><strong>Ruangan:</strong> 24 ruang kelas, 5 laboratorium, 2 ruang praktik, perpustakaan, aula</li>
                <li><strong>Laboratorium:</strong> Lab Komputer, Lab Bahasa, Lab IPA, Lab Kuliner, Lab Kecantikan</li>
                <li><strong>Fasilitas Olahraga:</strong> Lapangan basket, lapangan voli, lapangan futsal</li>
                <li><strong>Lainnya:</strong> UKS, ruang BK, koperasi sekolah, kantin, mushola, parkir luas</li>
            </ul>',
        ]);

        Page::where('slug', 'prestasi-sekolah')->update([
            'content' => '<p>SMK Negeri 6 Yogyakarta telah meraih berbagai prestasi di tingkat kota, provinsi, nasional, dan internasional. Prestasi-prestasi tersebut meliputi bidang akademik, olahraga, seni, dan keterampilan vokasi.</p><p>Untuk melihat prestasi terkini, silakan kunjungi halaman <a href="/prestasi">Prestasi</a>.</p>',
        ]);
    }

    private function updateCompetencies(): void
    {
        $details = [
            1 => [
                'description' => 'Program keahlian yang mempelajari tentang perencanaan dan pengelolaan perjalanan wisata, tour guiding, ticketing, dan layanan informasi pariwisata.',
                'content' => '<p>Usaha Perjalanan Wisata (UPW) adalah program keahlian yang mempersiapkan siswa untuk bekerja di industri pariwisata dan perjalanan.</p><h5>Kompetensi yang dipelajari:</h5><ul><li>Perencanaan perjalanan wisata</li><li>Pemanduan wisata (tour guiding)</li><li>Ticketing dan reservasi</li><li>Informasi pariwisata</li><li>Bahasa asing (Inggris, Jepang, Mandarin)</li></ul>',
            ],
            2 => [
                'description' => 'Program keahlian yang mempelajari tentang manajemen perhotelan, front office, housekeeping, food & beverage service, dan laundry.',
                'content' => '<p>Perhotelan adalah program keahlian yang mempersiapkan siswa untuk bekerja di industri perhotelan dan akomodasi.</p><h5>Kompetensi yang dipelajari:</h5><ul><li>Front office dan reservasi</li><li>Housekeeping dan laundry</li><li>Food & beverage service</li><li>Room service</li><li>Bahasa asing perhotelan</li></ul>',
            ],
            3 => [
                'description' => 'Program keahlian yang mempelajari tentang tata boga, pengolahan makanan nusantara dan internasional, pastry & bakery, serta manajemen restoran.',
                'content' => '<p>Kuliner adalah program keahlian yang mempersiapkan siswa untuk bekerja di industri makanan dan minuman.</p><h5>Kompetensi yang dipelajari:</h5><ul><li>Pengolahan makanan nusantara</li><li>Pengolahan makanan internasional</li><li>Pastry & bakery</li><li>Manajemen restoran</li><li>Sanitasi dan hygiene</li></ul>',
            ],
            4 => [
                'description' => 'Program keahlian yang mempelajari tentang tata kecantikan rambut, kulit, SPA therapy, dan make-up artistry.',
                'content' => '<p>Kecantikan & SPA adalah program keahlian yang mempersiapkan siswa untuk bekerja di industri kecantikan dan perawatan tubuh.</p><h5>Kompetensi yang dipelajari:</h5><ul><li>Perawatan rambut dan kulit</li><li>Make-up artistry</li><li>SPA therapy</li><li>Manicure & pedicure</li><li>Manajemen salon kecantikan</li></ul>',
            ],
            5 => [
                'description' => 'Program keahlian yang mempelajari tentang desain fashion, pembuatan busana, pola, dan manajemen produksi garment.',
                'content' => '<p>Tata Busana adalah program keahlian yang mempersiapkan siswa untuk bekerja di industri fashion dan garment.</p><h5>Kompetensi yang dipelajari:</h5><ul><li>Desain fashion</li><li>Pembuatan pola</li><li>Menjahit busana</li><li>Teknik hiasan busana</li><li>Manajemen produksi garment</li></ul>',
            ],
        ];

        foreach ($details as $id => $data) {
            Competency::where('id', $id)->update($data);
        }
    }

    private function updateStatistics(): void
    {
        Statistic::where('id', 1)->update([
            'icon' => 'heroicon-o-academic-cap',
            'suffix' => '',
        ]);

        Statistic::where('id', 2)->update([
            'icon' => 'heroicon-o-users',
            'suffix' => '+',
        ]);

        Statistic::where('id', 3)->update([
            'icon' => 'heroicon-o-building-office',
            'suffix' => '+',
        ]);
    }

}
