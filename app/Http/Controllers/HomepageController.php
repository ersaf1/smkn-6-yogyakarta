<?php

namespace App\Http\Controllers;

use App\Models\Accordion;
use App\Models\Competency;
use App\Models\News;
use App\Models\Partner;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Statistic;
use App\Models\Video;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('is_active', true)->orderBy('order')->get();
        $accordions = Accordion::where('is_active', true)->orderBy('order')->get();
        $competencies = Competency::where('is_active', true)->orderBy('order')->get();
        $statistics = Statistic::where('is_active', true)->orderBy('order')->get();
        $news = News::where('is_published', true)
            ->with('category')
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();
        $partners = Partner::where('is_active', true)->orderBy('order')->get();
        $videos = Video::where('is_active', true)->orderBy('order')->limit(3)->get();

        $kepalaSekolahName = Setting::get('kepala_sekolah_name', 'Mujari, S.Pd, M.Pd');
        $kepalaSekolahPhoto = Setting::get('kepala_sekolah_photo', '');
        $sambutanText = Setting::get('sambutan_text', '');
        $siteName = Setting::get('site_name', 'SMK Negeri 6 Yogyakarta');

        return view('homepage', compact(
            'sliders', 'accordions', 'competencies', 'statistics',
            'news', 'partners', 'videos', 'kepalaSekolahName', 'kepalaSekolahPhoto',
            'sambutanText', 'siteName'
        ));
    }
}
