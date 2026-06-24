@extends('layouts.app')

@section('content')
{{-- Banner --}}
<div class="relative h-64 md:h-80 flex items-center justify-center text-white
    @if(!$page->featured_image) page-banner @endif"
    @if($page->featured_image)
        style="background-image: url('{{ Storage::url($page->featured_image) }}'); background-size: cover; background-position: center;"
    @endif>
    @if($page->featured_image)
    <div class="absolute inset-0 bg-black/50"></div>
    @endif
    <div class="relative z-10 container mx-auto px-4 py-10">
        <h1 class="text-2xl font-bold font-['Roboto_Slab']">{{ $page->title }}</h1>
        <p class="text-white/70 mt-1 text-sm">
            <a href="{{ route('home') }}" class="breadcrumb-link">Home</a>
            <span class="mx-1">/</span>
            {{ $page->title }}
        </p>
    </div>
</div>

@php
    $kepalaName  = \App\Models\Setting::get('kepala_sekolah_name', 'Mujari, S.Pd, M.Pd');
    $kepalaTitle = \App\Models\Setting::get('kepala_sekolah_title', 'Kepala Sekolah');
    $kepalaPhoto = \App\Models\Setting::get('kepala_sekolah_photo', 'images/staff/kepala-sekolah.png');
    $partners    = \App\Models\Partner::where('is_active', true)->orderBy('order')->get();

    // Halaman yang pakai layout 2 kolom (foto kepsek + konten)
    $twoColumnSlugs = ['sambutan-kepala-sekolah', 'sejarah-sekolah', 'visi-misi', 'struktur-organisasi', 'saran-prasarana', 'prestasi-sekolah', 'program-unggulan', 'relasi-du-di'];
@endphp

@if(in_array($page->slug, $twoColumnSlugs))

{{-- Layout 2 kolom: foto kepala sekolah di kiri, konten di kanan --}}
<main class="max-w-7xl mx-auto px-4 py-16">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">

        {{-- Kolom kiri: foto kepala sekolah sticky --}}
        <aside class="lg:col-span-4">
            <div class="sticky top-24">
                <div class="relative overflow-hidden shadow-xl pb-10">
                    <img src="{{ $kepalaPhoto ? Storage::url($kepalaPhoto) : '/storage/images/staff/kepala-sekolah.png' }}"
                         alt="{{ $kepalaName }}"
                         class="w-full object-cover block">
                    <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[90%] bg-primary text-white py-3 px-4 text-center shadow-lg">
                        <h3 class="font-bold text-lg leading-tight font-['Roboto_Slab']">{{ $kepalaName }}</h3>
                        <p class="text-sm opacity-90">({{ $kepalaTitle }})</p>
                    </div>
                </div>
            </div>
        </aside>

        {{-- Kolom kanan: konten --}}
        <article class="lg:col-span-8">
            <header class="mb-8 border-b-2 border-gray-100 pb-4">
                <h2 class="text-3xl font-bold text-gray-800 uppercase tracking-tight font-['Roboto_Slab']">{{ $page->title }}</h2>
            </header>

            @if($page->slug === 'sejarah-sekolah')
            {{-- Sejarah: dengan ikon kutipan --}}
            <div class="flex">
                <div class="text-gray-200 mr-4 mt-[-10px] flex-shrink-0">
                    <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14.017 21L14.017 18C14.017 16.8954 14.9124 16 16.017 16H19.017C19.5693 16 20.017 15.5523 20.017 15V9C20.017 8.44772 19.5693 8 19.017 8H16.017C14.9124 8 14.017 7.10457 14.017 6V3L14.017 3C14.017 1.89543 14.9124 1 16.017 1H19.017C21.2261 1 23.017 2.79086 23.017 5V15C23.017 17.2091 21.2261 19 19.017 19H16.017L16.017 21H14.017ZM1 21L1 18C1 16.8954 1.89543 16 3 16H6C6.55228 16 7 15.5523 7 15V9C7 8.44772 6.55228 8 6 8H3C1.89543 8 1 7.10457 1 6V3L1 3C1 1.89543 1.89543 1 3 1H6C8.20914 1 10 2.79086 10 5V15C10 17.2091 8.20914 19 6 19H3L3 21H1Z"/>
                    </svg>
                </div>
                <div class="prose max-w-none text-sm text-gray-700">
                    {!! $page->content !!}
                </div>
            </div>

            @elseif($page->slug === 'struktur-organisasi')
            {{-- Struktur organisasi: konten full width (biasanya gambar bagan) --}}
            <div class="prose max-w-none text-gray-700">
                {!! $page->content !!}
            </div>
            @if(!$page->content)
            <div class="bg-gray-50 border-2 border-dashed border-gray-300 rounded-lg p-20 text-center text-gray-400">
                Bagan struktur organisasi belum tersedia.
            </div>
            @endif

            @else
            {{-- Default konten untuk halaman 2 kolom lainnya --}}
            <div class="prose max-w-none text-gray-700">
                {!! $page->content !!}
            </div>
            @endif

        </article>

    </div>
</main>

{{-- Section Partner --}}
@if($partners->count())
<section class="bg-white py-12 border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex flex-wrap justify-center items-center gap-8 md:gap-12 opacity-80">
            @foreach($partners as $partner)
                @if($partner->url)
                    <a href="{{ $partner->url }}" target="_blank" rel="noopener">
                        <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}" class="h-16 object-contain">
                    </a>
                @else
                    <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}" class="h-16 object-contain">
                @endif
            @endforeach
        </div>
    </div>
</section>
@endif

@else
{{-- Layout generik untuk halaman lain --}}
<div class="container mx-auto px-4 py-10">
    <div class="max-w-4xl mx-auto">
        <div class="prose max-w-none text-gray-700">
            {!! $page->content !!}
        </div>
    </div>
</div>
@endif
@endsection
