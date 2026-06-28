<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Slider;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Teacher;
use App\Models\Competency;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use App\Models\Statistic;
use App\Models\Partner;
use App\Models\Achievement;
use App\Models\Extracurricular;
use App\Models\Download;
use App\Models\Video;
use App\Models\Setting;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Accordion;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminCrudTest extends TestCase
{
    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::factory()->create([
            'email' => 'admin@smkn6yk.sch.id',
            'password' => Hash::make('password'),
        ]);

        Storage::fake('public');
    }

    public function test_slider_crud(): void
    {
        $slider = Slider::create([
            'title' => 'Test Slider',
            'subtitle' => 'Subtitle Test',
            'image' => 'sliders/test.jpg',
            'button_text' => 'Click Me',
            'button_url' => 'https://example.com',
            'order' => 1,
            'is_active' => true,
        ]);
        $this->assertDatabaseHas('sliders', ['title' => 'Test Slider']);

        $slider->update(['title' => 'Slider Update']);
        $this->assertDatabaseHas('sliders', ['title' => 'Slider Update']);
    }

    public function test_news_crud(): void
    {
        $category = NewsCategory::create([
            'name' => 'Academik',
            'slug' => 'academik',
            'is_active' => true,
            'order' => 1,
        ]);

        $news = News::create([
            'user_id' => $this->admin->id,
            'title' => 'Berita Test',
            'slug' => 'berita-test',
            'content' => '<p>Content test</p>',
            'category_id' => $category->id,
            'is_published' => true,
            'published_at' => now(),
        ]);
        $this->assertDatabaseHas('news', ['title' => 'Berita Test']);

        $news->update(['title' => 'Berita Update']);
        $this->assertDatabaseHas('news', ['title' => 'Berita Update']);
    }

    public function test_news_category_crud(): void
    {
        $category = NewsCategory::create([
            'name' => 'Olahraga',
            'slug' => 'olahraga',
            'is_active' => true,
            'order' => 1,
        ]);
        $this->assertDatabaseHas('news_categories', ['name' => 'Olahraga']);

        $category->update(['name' => 'Olahraga Update']);
        $this->assertDatabaseHas('news_categories', ['name' => 'Olahraga Update']);
    }

    public function test_teacher_crud(): void
    {
        $teacher = Teacher::create([
            'name' => 'Guru Test',
            'position' => 'Guru Mapel',
            'is_active' => true,
            'order' => 1,
        ]);
        $this->assertDatabaseHas('teachers', ['name' => 'Guru Test']);

        $teacher->update(['position' => 'Wakil Kepala']);
        $this->assertDatabaseHas('teachers', ['position' => 'Wakil Kepala']);

        $teacher->delete();
        $this->assertSoftDeleted('teachers', ['id' => $teacher->id]);
    }

    public function test_competency_crud(): void
    {
        $competency = Competency::create([
            'name' => 'Teknik Komputer dan Jaringan',
            'slug' => 'teknik-komputer-dan-jaringan',
            'description' => 'Jurusan TKJ',
            'is_active' => true,
            'order' => 1,
        ]);
        $this->assertDatabaseHas('competencies', ['name' => 'Teknik Komputer dan Jaringan']);

        $competency->update(['name' => 'TKJ Update']);
        $this->assertDatabaseHas('competencies', ['name' => 'TKJ Update']);
    }

    public function test_gallery_crud(): void
    {
        $category = GalleryCategory::create([
            'name' => 'Kegiatan Sekolah',
            'slug' => 'kegiatan-sekolah',
            'is_active' => true,
            'order' => 1,
        ]);

        $gallery = Gallery::create([
            'category_id' => $category->id,
            'title' => 'Foto Kegiatan',
            'image' => 'galleries/foto.jpg',
            'is_active' => true,
            'order' => 1,
        ]);
        $this->assertDatabaseHas('galleries', ['title' => 'Foto Kegiatan']);

        $gallery->update(['title' => 'Foto Update']);
        $this->assertDatabaseHas('galleries', ['title' => 'Foto Update']);
    }

    public function test_gallery_category_crud(): void
    {
        $category = GalleryCategory::create([
            'name' => 'Kegiatan',
            'slug' => 'kegiatan',
            'is_active' => true,
            'order' => 1,
        ]);
        $this->assertDatabaseHas('gallery_categories', ['name' => 'Kegiatan']);
    }

    public function test_statistic_crud(): void
    {
        $stat = Statistic::create([
            'label' => 'Siswa',
            'value' => '1200',
            'is_active' => true,
            'order' => 1,
        ]);
        $this->assertDatabaseHas('statistics', ['label' => 'Siswa']);

        $stat->update(['value' => '1300']);
        $this->assertDatabaseHas('statistics', ['value' => '1300']);
    }

    public function test_partner_crud(): void
    {
        $partner = Partner::create([
            'name' => 'PT Mitra Sejahtera',
            'url' => 'https://mitra.com',
            'is_active' => true,
            'order' => 1,
        ]);
        $this->assertDatabaseHas('partners', ['name' => 'PT Mitra Sejahtera']);

        $partner->update(['name' => 'PT Mitra Update']);
        $this->assertDatabaseHas('partners', ['name' => 'PT Mitra Update']);
    }

    public function test_achievement_crud(): void
    {
        $achievement = Achievement::create([
            'title' => 'Juara 1 Lomba',
            'description' => 'Kejuaraan tingkat kota',
            'is_active' => true,
            'order' => 1,
        ]);
        $this->assertDatabaseHas('achievements', ['title' => 'Juara 1 Lomba']);

        $achievement->update(['title' => 'Juara 2']);
        $this->assertDatabaseHas('achievements', ['title' => 'Juara 2']);
    }

    public function test_extracurricular_crud(): void
    {
        $ekskul = Extracurricular::create([
            'name' => 'Pramuka',
            'slug' => 'pramuka',
            'description' => 'Kegiatan pramuka',
            'is_active' => true,
            'order' => 1,
        ]);
        $this->assertDatabaseHas('extracurriculars', ['name' => 'Pramuka']);

        $ekskul->update(['name' => 'Pramuka Update']);
        $this->assertDatabaseHas('extracurriculars', ['name' => 'Pramuka Update']);
    }

    public function test_download_crud(): void
    {
        $download = Download::create([
            'title' => 'Modul Ajar',
            'file' => 'downloads/modul.pdf',
            'is_active' => true,
            'order' => 1,
        ]);
        $this->assertDatabaseHas('downloads', ['title' => 'Modul Ajar']);

        $download->update(['title' => 'Modul Update']);
        $this->assertDatabaseHas('downloads', ['title' => 'Modul Update']);
    }

    public function test_video_crud(): void
    {
        $video = Video::create([
            'title' => 'Video Profil',
            'video_file' => 'videos/profil.mp4',
            'is_active' => true,
            'order' => 1,
        ]);
        $this->assertDatabaseHas('videos', ['title' => 'Video Profil']);

        $video->update(['title' => 'Video Update']);
        $this->assertDatabaseHas('videos', ['title' => 'Video Update']);
    }

    public function test_setting_crud(): void
    {
        $setting = Setting::create([
            'key' => 'site_name',
            'value' => 'SMKN 6 Yogyakarta',
            'type' => 'text',
            'group' => 'general',
        ]);
        $this->assertDatabaseHas('settings', ['key' => 'site_name']);

        $setting->update(['value' => 'SMKN 6 Yogya']);
        $this->assertDatabaseHas('settings', ['value' => 'SMKN 6 Yogya']);
    }

    public function test_menu_crud(): void
    {
        $menu = Menu::create([
            'name' => 'Profile',
            'slug' => 'profile',
        ]);
        $this->assertDatabaseHas('menus', ['name' => 'Profile']);

        $menu->update(['name' => 'Profile Update']);
        $this->assertDatabaseHas('menus', ['name' => 'Profile Update']);
    }

    public function test_page_crud(): void
    {
        $page = Page::create([
            'title' => 'Tentang Kami',
            'slug' => 'tentang-kami',
            'content' => '<p>Isi halaman</p>',
            'is_active' => true,
        ]);
        $this->assertDatabaseHas('pages', ['title' => 'Tentang Kami']);

        $page->update(['title' => 'Tentang Kami Update']);
        $this->assertDatabaseHas('pages', ['title' => 'Tentang Kami Update']);
    }

    public function test_accordion_crud(): void
    {
        $accordion = Accordion::create([
            'title' => 'FAQ 1',
            'content' => 'Jawaban FAQ',
            'is_active' => true,
            'order' => 1,
        ]);
        $this->assertDatabaseHas('accordions', ['title' => 'FAQ 1']);

        $accordion->update(['title' => 'FAQ Update']);
        $this->assertDatabaseHas('accordions', ['title' => 'FAQ Update']);
    }

    public function test_contact_message_crud(): void
    {
        $msg = ContactMessage::create([
            'name' => 'Pengunjung',
            'email' => 'pengunjung@test.com',
            'phone' => '08123456789',
            'subject' => 'Pertanyaan',
            'message' => 'Isi pesan test',
        ]);
        $this->assertDatabaseHas('contact_messages', ['email' => 'pengunjung@test.com']);

        $msg->update(['is_read' => true]);
        $this->assertDatabaseHas('contact_messages', ['is_read' => true]);
    }

    public function test_all_models_have_crud(): void
    {
        $models = [
            'sliders' => Slider::count(),
            'news' => News::count(),
            'news_categories' => NewsCategory::count(),
            'teachers' => Teacher::count(),
            'competencies' => Competency::count(),
            'galleries' => Gallery::count(),
            'gallery_categories' => GalleryCategory::count(),
            'statistics' => Statistic::count(),
            'partners' => Partner::count(),
            'achievements' => Achievement::count(),
            'extracurriculars' => Extracurricular::count(),
            'downloads' => Download::count(),
            'videos' => Video::count(),
            'settings' => Setting::count(),
            'menus' => Menu::count(),
            'pages' => Page::count(),
            'accordions' => Accordion::count(),
            'contact_messages' => ContactMessage::count(),
        ];

        foreach ($models as $table => $count) {
            $this->assertEquals(0, $count, "Table {$table} should be empty before seeding");
        }

        Slider::factory()->count(3)->create();
        NewsCategory::factory()->count(2)->create();
        Teacher::factory()->count(5)->create();
        Competency::factory()->count(4)->create();
        GalleryCategory::factory()->count(2)->create();
        Gallery::factory()->count(3)->create();
        Statistic::factory()->count(3)->create();
        Partner::factory()->count(3)->create();
        Achievement::factory()->count(3)->create();
        Extracurricular::factory()->count(3)->create();
        Download::factory()->count(3)->create();
        Video::factory()->count(3)->create();
        Page::factory()->count(3)->create();
        Accordion::factory()->count(3)->create();
        ContactMessage::factory()->count(3)->create();

        $this->assertEquals(3, Slider::count());
        $this->assertEquals(2, NewsCategory::count());
        $this->assertEquals(5, Teacher::count());
        $this->assertEquals(4, Competency::count());
        $this->assertEquals(3, Gallery::count());
        $this->assertEquals(3, Statistic::count());
        $this->assertEquals(3, Partner::count());
        $this->assertEquals(3, Achievement::count());
        $this->assertEquals(3, Extracurricular::count());
        $this->assertEquals(3, Download::count());
        $this->assertEquals(3, Video::count());
        $this->assertEquals(3, Page::count());
        $this->assertEquals(3, Accordion::count());
        $this->assertEquals(3, ContactMessage::count());
    }
}
