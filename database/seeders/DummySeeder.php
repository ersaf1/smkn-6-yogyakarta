<?php

namespace Database\Seeders;

use App\Models\Accordion;
use App\Models\Achievement;
use App\Models\Download;
use App\Models\Extracurricular;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Partner;
use App\Models\Slider;
use App\Models\Teacher;
use App\Models\Video;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DummySeeder extends Seeder
{
    public function run(): void
    {
        $this->seedSliders();
        $this->seedNewsCategories();
        $this->seedNews();
        $this->seedPartners();
        $this->seedTeachers();
        $this->seedGalleryCategories();
        $this->seedGalleries();
        $this->seedVideos();
        $this->seedAchievements();
        $this->seedExtracurriculars();
        $this->seedDownloads();
        $this->updateAccordions();
    }

    private function seedSliders(): void
    {
        $sliders = [
            [
                'title' => 'SMKN 6 YOGYAKARTA',
                'subtitle' => 'Sekolah Unggul',
                'button_text' => 'Hubungi Kami',
                'button_url' => '/hubungi-kami',
                'image' => 'images/slider/slider1.jpg',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'SMKN 6 YOGYAKARTA',
                'subtitle' => 'Sekolah Unggul',
                'button_text' => 'Hubungi Kami',
                'button_url' => '/hubungi-kami',
                'image' => 'images/slider/slider2.jpg',
                'order' => 2,
                'is_active' => true,
            ],
        ];

        foreach ($sliders as $s) {
            Slider::create($s);
        }
    }

    private function seedNewsCategories(): void
    {
        $categories = [
            ['name' => 'Berita Sekolah', 'slug' => 'berita-sekolah', 'description' => 'Berita umum seputar sekolah', 'order' => 1, 'is_active' => true],
            ['name' => 'Prestasi', 'slug' => 'prestasi', 'description' => 'Berita prestasi siswa dan guru', 'order' => 2, 'is_active' => true],
            ['name' => 'Pengumuman', 'slug' => 'pengumuman', 'description' => 'Pengumuman resmi sekolah', 'order' => 3, 'is_active' => true],
            ['name' => 'Kegiatan', 'slug' => 'kegiatan', 'description' => 'Kegiatan sekolah', 'order' => 4, 'is_active' => true],
        ];

        foreach ($categories as $c) {
            NewsCategory::create($c);
        }
    }

    private function seedNews(): void
    {
        $news = [
            [
                'category_id' => 1,
                'user_id' => 1,
                'title' => 'Gema Sekolah Widya Pratita',
                'slug' => 'gema-sekolah-widya-pratita',
                'excerpt' => 'SMKN 6 Yogyakarta kembali menghadirkan inovasi literasi dan publikasi sekolah melalui penerbitan majalah digital bulanan Gema Sekolah Widya Pratita Edisi II Bulan Maret–April 2026.',
                'content' => '<p>SMKN 6 Yogyakarta kembali menghadirkan inovasi literasi dan publikasi sekolah melalui penerbitan majalah digital bulanan Gema Sekolah Widya Pratita Edisi II Bulan Maret–April 2026. Mengusung tema "Wahana Aksi, Dedikasi, Edukasi, dan Inspirasi", majalah ini menjadi wujud nyata komitmen sekolah dalam dunia literasi.</p><p>Majalah ini memuat berbagai artikel menarik mulai dari kegiatan sekolah, prestasi siswa, hingga informasi penting lainnya yang relevan dengan dunia pendidikan vokasi.</p>',
                'is_published' => true,
                'is_featured' => true,
                'published_at' => '2026-05-13 08:00:00',
            ],
            [
                'category_id' => 3,
                'user_id' => 1,
                'title' => 'Tes Kemampuan Akademik Daerah (TKAD) DIY 2026',
                'slug' => 'tes-kemampuan-akademik-daerah-tkad-diy-2026',
                'excerpt' => 'Bagi kamu lulusan luar Daerah Istimewa Yogyakarta jenjang SMP/MTs/Paket B/Wustha, ini kesempatanmu untuk mengikuti TKAD DIY.',
                'content' => '<p>Ayo Ikuti Tes Kemampuan Akademik Daerah (TKAD) DIY 2026! Bagi kamu lulusan luar Daerah Istimewa Yogyakarta jenjang SMP/MTs/Paket B/Wustha, ini kesempatanmu untuk mengikuti TKAD DIY.</p><p>Pendaftaran: 4 – 12 Mei 2026. Daftar online melalui: https://spmb.jogjaprov.go.id</p>',
                'is_published' => true,
                'is_featured' => false,
                'published_at' => '2026-05-05 08:00:00',
            ],
            [
                'category_id' => 3,
                'user_id' => 1,
                'title' => 'Sistem Penerimaan Murid Baru (SPMB) Tahun 2026',
                'slug' => 'sistem-penerimaan-murid-baru-spmb-smkn-6-yogyakarta-tahun-ajaran-2026-2027',
                'excerpt' => 'SMK Negeri 6 Yogyakarta dengan bangga membuka Sistem Penerimaan Murid Baru (SPMB) Tahun Ajaran 2026/2027 sebagai wujud komitmen dalam mencetak generasi unggul.',
                'content' => '<p>SMK Negeri 6 Yogyakarta dengan bangga membuka Sistem Penerimaan Murid Baru (SPMB) Tahun Ajaran 2026/2027 sebagai wujud komitmen dalam mencetak generasi unggul, terampil, dan siap bersaing di dunia kerja maupun wirausaha.</p><p>Melalui berbagai program keahlian berbasis industri, kami menghadirkan pendidikan berkualitas yang mengintegrasikan kurikulum nasional dengan kebutuhan dunia industri.</p>',
                'is_published' => true,
                'is_featured' => false,
                'published_at' => '2026-05-05 08:00:00',
            ],
            [
                'category_id' => 2,
                'user_id' => 1,
                'title' => 'Juara 1 Lomba Kompetensi Siswa Tingkat Provinsi DIY',
                'slug' => 'juara-1-lomba-kompetensi-siswa-tingkat-provinsi-diy',
                'excerpt' => 'Siswa SMKN 6 Yogyakarta berhasil meraih Juara 1 dalam Lomba Kompetensi Siswa (LKS) tingkat Provinsi DIY bidang Restaurant Service.',
                'content' => '<p>Siswa SMKN 6 Yogyakarta berhasil meraih Juara 1 dalam Lomba Kompetensi Siswa (LKS) tingkat Provinsi DIY bidang Restaurant Service. Prestasi ini membuktikan kualitas pendidikan vokasi di SMKN 6 Yogyakarta.</p><p>Dengan bimbingan dari guru-guru yang kompeten dan fasilitas praktik yang memadai, siswa kami mampu bersaing di tingkat nasional.</p>',
                'is_published' => true,
                'is_featured' => false,
                'published_at' => '2026-04-20 08:00:00',
            ],
            [
                'category_id' => 4,
                'user_id' => 1,
                'title' => 'Kerjasama SMKN 6 Yogyakarta Dengan Hotel Berbintang',
                'slug' => 'kerjasama-smkn-6-yogyakarta-dengan-hotel-berbintang',
                'excerpt' => 'SMKN 6 Yogyakarta menjalin kerjasama dengan beberapa hotel berbintang di Yogyakarta untuk program magang siswa.',
                'content' => '<p>SMKN 6 Yogyakarta menjalin kerjasama dengan beberapa hotel berbintang di Yogyakarta untuk program magang siswa. Kerjasama ini bertujuan untuk memberikan pengalaman kerja nyata kepada siswa sebelum lulus.</p><p>Beberapa mitra hotel yang bekerjasama antara lain Hotel Manohara, Grand Hotel, dan Ambarukmo Palace Hotel.</p>',
                'is_published' => true,
                'is_featured' => false,
                'published_at' => '2026-04-10 08:00:00',
            ],
            [
                'category_id' => 1,
                'user_id' => 1,
                'title' => 'Workshop Kewirausahaan Bagi Siswa Kelas XII',
                'slug' => 'workshop-kewirausahaan-bagi-siswa-kelas-xii',
                'excerpt' => 'SMKN 6 Yogyakarta menyelenggarakan workshop kewirausahaan bagi siswa kelas XII sebagai bekal memasuki dunia kerja.',
                'content' => '<p>SMKN 6 Yogyakarta menyelenggarakan workshop kewirausahaan bagi siswa kelas XII sebagai bekal memasuki dunia kerja. Workshop ini menghadirkan pelaku usaha sukses sebagai narasumber.</p><p>Kegiatan ini diikuti oleh seluruh siswa kelas XII dari semua program keahlian dengan antusias yang tinggi.</p>',
                'is_published' => true,
                'is_featured' => false,
                'published_at' => '2026-03-25 08:00:00',
            ],
        ];

        foreach ($news as $n) {
            News::create($n);
        }
    }

    private function seedPartners(): void
    {
        $partners = [
            ['name' => 'New Topsy', 'logo' => 'images/partners/newtopsy.webp', 'url' => '', 'order' => 1, 'is_active' => true],
            ['name' => 'Manohara Hotel', 'logo' => 'images/partners/manohara.webp', 'url' => '', 'order' => 2, 'is_active' => true],
            ['name' => 'Grand Hotel Yogyakarta', 'logo' => 'images/partners/grandhotel.webp', 'url' => '', 'order' => 3, 'is_active' => true],
            ['name' => 'Gram Hotel', 'logo' => 'images/partners/gramhotel.webp', 'url' => '', 'order' => 4, 'is_active' => true],
            ['name' => 'Hotel Ambarukmo', 'logo' => 'images/partners/ambarukmo.webp', 'url' => '', 'order' => 5, 'is_active' => true],
            ['name' => 'Bakpia Pathok', 'logo' => 'images/partners/bakpia.webp', 'url' => '', 'order' => 6, 'is_active' => true],
            ['name' => 'Chiyo Restaurant', 'logo' => 'images/partners/chiyo.webp', 'url' => '', 'order' => 7, 'is_active' => true],
            ['name' => 'JTTC', 'logo' => 'images/partners/jttc.webp', 'url' => '', 'order' => 8, 'is_active' => true],
            ['name' => 'Dewave', 'logo' => 'images/partners/dewave.webp', 'url' => '', 'order' => 9, 'is_active' => true],
            ['name' => 'Fania Spa', 'logo' => 'images/partners/fania.webp', 'url' => '', 'order' => 10, 'is_active' => true],
        ];

        foreach ($partners as $p) {
            Partner::create($p);
        }
    }

    private function seedTeachers(): void
    {
        $teachers = [
            ['name' => 'Mujari, S.Pd, M.Pd', 'nip' => '196808151993031002', 'position' => 'Kepala Sekolah', 'department' => 'Manajemen', 'status' => 'guru', 'order' => 1, 'is_active' => true],
            ['name' => 'Dra. Sri Wahyuni, M.Pd', 'nip' => '197005201998032001', 'position' => 'Wakil Kepala Sekolah Bidang Kurikulum', 'department' => 'Manajemen', 'status' => 'guru', 'order' => 2, 'is_active' => true],
            ['name' => 'Drs. Bambang Setiawan, M.Pd', 'nip' => '196905101997031001', 'position' => 'Wakil Kepala Sekolah Bidang Kesiswaan', 'department' => 'Manajemen', 'status' => 'guru', 'order' => 3, 'is_active' => true],
            ['name' => 'Rina Hartati, S.Pd', 'nip' => '198504152010012002', 'position' => 'Guru Mata Pelajaran', 'department' => 'Usaha Perjalanan Wisata', 'status' => 'guru', 'order' => 4, 'is_active' => true],
            ['name' => 'Ahmad Fauzi, S.Sn', 'nip' => '198801202011011003', 'position' => 'Guru Produktif', 'department' => 'Perhotelan', 'status' => 'guru', 'order' => 5, 'is_active' => true],
            ['name' => 'Siti Nurhaliza, S.Pd', 'nip' => '199001152015012004', 'position' => 'Guru Produktif', 'department' => 'Kuliner', 'status' => 'guru', 'order' => 6, 'is_active' => true],
            ['name' => 'Dewi Kartika, S.Pd', 'nip' => '199203102016012005', 'position' => 'Guru Produktif', 'department' => 'Tata Kecantikan', 'status' => 'guru', 'order' => 7, 'is_active' => true],
            ['name' => 'Putri Ayu Lestari, S.Pd', 'nip' => '199105252017012006', 'position' => 'Guru Produktif', 'department' => 'Tata Busana', 'status' => 'guru', 'order' => 8, 'is_active' => true],
        ];

        foreach ($teachers as $t) {
            Teacher::create($t);
        }
    }

    private function seedGalleryCategories(): void
    {
        $categories = [
            ['name' => 'Kegiatan Sekolah', 'slug' => 'kegiatan-sekolah', 'description' => 'Dokumentasi kegiatan sekolah', 'order' => 1, 'is_active' => true],
            ['name' => 'Praktik Kerja', 'slug' => 'praktik-kerja', 'description' => 'Dokumentasi praktik kerja siswa', 'order' => 2, 'is_active' => true],
            ['name' => 'Prestasi', 'slug' => 'prestasi', 'description' => 'Dokumentasi pencapaian prestasi', 'order' => 3, 'is_active' => true],
            ['name' => 'Fasilitas Sekolah', 'slug' => 'fasilitas-sekolah', 'description' => 'Foto fasilitas sekolah', 'order' => 4, 'is_active' => true],
        ];

        foreach ($categories as $c) {
            GalleryCategory::create($c);
        }
    }

    private function seedGalleries(): void
    {
        $galleries = [
            ['category_id' => 1, 'title' => 'Upacara Bendera Hari Senin', 'slug' => 'upacara-bendera-hari-senin', 'description' => 'Kegiatan upacara bendera rutin setiap hari Senin', 'order' => 1, 'is_active' => true],
            ['category_id' => 1, 'title' => 'Peringatan Hardiknas 2026', 'slug' => 'peringatan-hardiknas-2026', 'description' => 'Peringatan Hari Pendidikan Nasional tahun 2026', 'order' => 2, 'is_active' => true],
            ['category_id' => 1, 'title' => 'Class Meeting Akhir Semester', 'slug' => 'class-meeting-akhir-semester', 'description' => 'Kegiatan class meeting akhir semester genap', 'order' => 3, 'is_active' => true],
            ['category_id' => 2, 'title' => 'Praktik Memasak Siswa Kuliner', 'slug' => 'praktik-memasak-siswa-kuliner', 'description' => 'Praktik memasak siswa program keahlian Kuliner', 'order' => 4, 'is_active' => true],
            ['category_id' => 2, 'title' => 'Praktik Front Office Siswa Perhotelan', 'slug' => 'praktik-front-office-siswa-perhotelan', 'description' => 'Praktik pelayanan front office siswa Perhotelan', 'order' => 5, 'is_active' => true],
            ['category_id' => 2, 'title' => 'Praktik Tour Guide Siswa UPW', 'slug' => 'praktik-tour-guide-siswa-upw', 'description' => 'Praktik pemandu wisata siswa Usaha Perjalanan Wisata', 'order' => 6, 'is_active' => true],
            ['category_id' => 3, 'title' => 'Juara LKS Restaurant Service', 'slug' => 'juara-lks-restaurant-service', 'description' => 'Prestasi Juara 1 LKS tingkat Provinsi DIY', 'order' => 7, 'is_active' => true],
            ['category_id' => 3, 'title' => 'Juara Lomba Tata Kecantikan', 'slug' => 'juara-lomba-tata-kecantikan', 'description' => 'Prestasi di bidang tata kecantikan', 'order' => 8, 'is_active' => true],
            ['category_id' => 4, 'title' => 'Laboratorium Komputer', 'slug' => 'laboratorium-komputer', 'description' => 'Fasilitas laboratorium komputer sekolah', 'order' => 9, 'is_active' => true],
            ['category_id' => 4, 'title' => 'Ruang Praktik Perhotelan', 'slug' => 'ruang-praktik-perhotelan', 'description' => 'Fasilitas ruang praktik perhotelan', 'order' => 10, 'is_active' => true],
            ['category_id' => 4, 'title' => 'Dapur Praktik Kuliner', 'slug' => 'dapur-praktik-kuliner', 'description' => 'Fasilitas dapur praktik program Kuliner', 'order' => 11, 'is_active' => true],
            ['category_id' => 4, 'title' => 'Perpustakaan', 'slug' => 'perpustakaan', 'description' => 'Fasilitas perpustakaan sekolah', 'order' => 12, 'is_active' => true],
        ];

        foreach ($galleries as $g) {
            Gallery::create($g);
        }
    }

    private function seedVideos(): void
    {
        $videos = [
            [
                'title' => 'Profil SMK Negeri 6 Yogyakarta',
                'slug' => 'profil-smk-negeri-6-yogyakarta',
                'description' => 'Video profil SMK Negeri 6 Yogyakarta',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Kegiatan MPLS SMKN 6 Yogyakarta',
                'slug' => 'kegiatan-mpls-smkn-6-yogyakarta',
                'description' => 'Masa Pengenalan Lingkungan Sekolah tahun ajaran baru',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Praktik Kitchen Siswa Kuliner',
                'slug' => 'praktik-kitchen-siswa-kuliner',
                'description' => 'Dokumentasi praktik kitchen siswa program keahlian Kuliner',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($videos as $v) {
            Video::create($v);
        }
    }

    private function seedAchievements(): void
    {
        $achievements = [
            [
                'title' => 'Juara 1 LKS Restaurant Service Tingkat Provinsi DIY',
                'slug' => 'juara-1-lks-restaurant-service-tingkat-provinsi-diy',
                'description' => 'Siswa SMKN 6 Yogyakarta meraih Juara 1 dalam Lomba Kompetensi Siswa bidang Restaurant Service tingkat Provinsi DIY tahun 2026.',
                'content' => '<p>Siswa SMKN 6 Yogyakarta berhasil meraih Juara 1 dalam Lomba Kompetensi Siswa (LKS) tingkat Provinsi DIY bidang Restaurant Service. Prestasi ini diraih oleh siswa program keahlian Perhotelan setelah melalui seleksi ketat.</p>',
                'year' => 2026,
                'level' => 'Provinsi',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Juara 2 LKS Tata Kecantikan Tingkat Provinsi DIY',
                'slug' => 'juara-2-lks-tata-kecantikan-tingkat-provinsi-diy',
                'description' => 'Siswa program Tata Kecantikan meraih Juara 2 dalam LKS tingkat Provinsi DIY.',
                'content' => '<p>Siswa program keahlian Tata Kecantikan Rambut dan Kulit berhasil meraih Juara 2 dalam LKS tingkat Provinsi DIY tahun 2026.</p>',
                'year' => 2026,
                'level' => 'Provinsi',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Juara 1 Lomba Masak Tradisional Tingkat Kota Yogyakarta',
                'slug' => 'juara-1-lomba-masak-tradisional-tingkat-kota-yogyakarta',
                'description' => 'Siswa program Kuliner meraih Juara 1 dalam lomba masak tradisional tingkat Kota Yogyakarta.',
                'content' => '<p>Siswa program keahlian Kuliner berhasil meraih Juara 1 dalam lomba masak tradisional tingkat Kota Yogyakarta dengan menu khas Yogyakarta.</p>',
                'year' => 2025,
                'level' => 'Kota',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Juara 3 Tour Guide Competition Tingkat Nasional',
                'slug' => 'juara-3-tour-guide-competition-tingkat-nasional',
                'description' => 'Siswa UPW meraih Juara 3 Tour Guide Competition tingkat Nasional.',
                'content' => '<p>Siswa program keahlian Usaha Perjalanan Wisata meraih Juara 3 dalam Tour Guide Competition tingkat Nasional yang diselenggarakan di Jakarta.</p>',
                'year' => 2025,
                'level' => 'Nasional',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Akreditasi A untuk Semua Program Keahlian',
                'slug' => 'akreditasi-a-untuk-semua-program-keahlian',
                'description' => 'SMKN 6 Yogyakarta berhasil mempertahankan Akreditasi A untuk semua program keahlian.',
                'content' => '<p>SMKN 6 Yogyakarta berhasil mempertahankan predikat Akreditasi A untuk semua program keahlian yang ada. Ini merupakan bukti komitmen sekolah dalam menjaga mutu pendidikan vokasi.</p>',
                'year' => 2024,
                'level' => 'Nasional',
                'order' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($achievements as $a) {
            Achievement::create($a);
        }
    }

    private function seedExtracurriculars(): void
    {
        $ekskuls = [
            [
                'name' => 'Pramuka',
                'slug' => 'pramuka',
                'description' => 'Kegiatan kepramukaan untuk membentuk karakter dan kemandirian siswa.',
                'content' => '<p>Pramuka SMKN 6 Yogyakarta merupakan salah satu ekstrakurikuler wajib yang diikuti oleh seluruh siswa. Kegiatan ini bertujuan untuk membentuk karakter disiplin, mandiri, dan gotong royong.</p><p>Jadwal kegiatan: Setiap hari Sabtu pukul 07.00 – 10.00 WIB</p>',
                'coach' => 'Drs. Bambang Setiawan, M.Pd',
                'schedule' => 'Sabtu, 07.00 - 10.00 WIB',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Futsal',
                'slug' => 'futsal',
                'description' => 'Ekstrakurikuler futsal untuk mengembangkan bakat olahraga siswa.',
                'content' => '<p>Futsal SMKN 6 Yogyakarta aktif mengikuti berbagai kompetisi futsal antar SMA/SMK se-DIY. Latihan rutin dilakukan setiap minggu.</p><p>Jadwal kegiatan: Setiap hari Rabu dan Jumat pukul 15.00 – 17.00 WIB</p>',
                'coach' => 'Ahmad Fauzi, S.Sn',
                'schedule' => 'Rabu & Jumat, 15.00 - 17.00 WIB',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'English Club',
                'slug' => 'english-club',
                'description' => 'Klub bahasa Inggris untuk meningkatkan kemampuan berbahasa Inggris siswa.',
                'content' => '<p>English Club SMKN 6 Yogyakarta menjadi wadah bagi siswa yang ingin meningkatkan kemampuan berbahasa Inggris, baik speaking maupun writing. Kegiatan meliputi diskusi, presentasi, dan English camp.</p><p>Jadwal kegiatan: Setiap hari Kamis pukul 15.00 – 16.30 WIB</p>',
                'coach' => 'Rina Hartati, S.Pd',
                'schedule' => 'Kamis, 15.00 - 16.30 WIB',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Paduan Suara',
                'slug' => 'paduan-suara',
                'description' => 'Ekstrakurikuler paduan suara untuk mengembangkan bakat seni vokal siswa.',
                'content' => '<p>Paduan Suara SMKN 6 Yogyakarta sering tampil di berbagai acara sekolah dan kompetisi paduan suara tingkat kota dan provinsi.</p><p>Jadwal kegiatan: Setiap hari Selasa dan Kamis pukul 15.00 – 16.30 WIB</p>',
                'coach' => 'Dewi Kartika, S.Pd',
                'schedule' => 'Selasa & Kamis, 15.00 - 16.30 WIB',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'PMR (Palang Merah Remaja)',
                'slug' => 'pmr-palang-merah-remaja',
                'description' => 'Ekstrakurikuler Palang Merah Remaja untuk membentuk jiwa sosial dan kemanusiaan.',
                'content' => '<p>PMR SMKN 6 Yogyakarta aktif dalam kegiatan bakti sosial, donor darah, dan pelatihan P3K. Anggota PMR juga menjadi relawan di berbagai event sekolah.</p><p>Jadwal kegiatan: Setiap hari Jumat pukul 14.00 – 16.00 WIB</p>',
                'coach' => 'Siti Nurhaliza, S.Pd',
                'schedule' => 'Jumat, 14.00 - 16.00 WIB',
                'order' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($ekskuls as $e) {
            Extracurricular::create($e);
        }
    }

    private function seedDownloads(): void
    {
        $downloads = [
            [
                'title' => 'Brosur PPDB 2026/2027',
                'slug' => 'brosur-ppdb-2026-2027',
                'description' => 'Brosur informasi Penerimaan Peserta Didik Baru tahun ajaran 2026/2027',
                'file_type' => 'pdf',
                'download_count' => 0,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Kalender Pendidikan 2025/2026',
                'slug' => 'kalender-pendidikan-2025-2026',
                'description' => 'Kalender pendidikan SMKN 6 Yogyakarta tahun ajaran 2025/2026',
                'file_type' => 'pdf',
                'download_count' => 0,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Formulir Pendaftaran Siswa Baru',
                'slug' => 'formulir-pendaftaran-siswa-baru',
                'description' => 'Formulir pendaftaran calon siswa baru SMKN 6 Yogyakarta',
                'file_type' => 'pdf',
                'download_count' => 0,
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Panduan Praktik Kerja Lapangan (PKL)',
                'slug' => 'panduan-praktik-kerja-lapangan-pkl',
                'description' => 'Panduan lengkap pelaksanaan PKL bagi siswa kelas XI',
                'file_type' => 'pdf',
                'download_count' => 0,
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($downloads as $d) {
            Download::create($d);
        }
    }

    private function updateAccordions(): void
    {
        Accordion::query()->delete();

        $accordions = [
            [
                'title' => 'Kuliner Nusantara',
                'content' => 'Program keahlian Kuliner dengan fokus masakan nusantara dan internasional.',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Perhotelan Bintang Lima',
                'content' => 'Program keahlian Perhotelan dengan standar hotel bintang lima dan sertifikasi internasional.',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Wisata & Pariwisata',
                'content' => 'Program keahlian Usaha Perjalanan Wisata dengan jaringan mitra travel nasional.',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Kecantikan & SPA Therapy',
                'content' => 'Program keahlian Tata Kecantikan dan SPA dengan sertifikasi BNSP.',
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($accordions as $a) {
            Accordion::create($a);
        }
    }
}
