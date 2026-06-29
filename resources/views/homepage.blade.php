@extends('layouts.app')

@section('content')

{{-- ===================== HERO SLIDER ===================== --}}
@if($sliders->count() > 0)
<section class="relative min-h-screen overflow-hidden bg-dark" style="min-height: 100dvh;"
    x-data="{
        current: 0,
        total: {{ $sliders->count() }},
        init() { setInterval(() => { this.current = (this.current + 1) % this.total; }, 8000); },
        prev() { this.current = (this.current - 1 + this.total) % this.total; },
        next() { this.current = (this.current + 1) % this.total; }
    }"
    x-init="init()">
    @foreach($sliders as $index => $slider)
    <div class="absolute inset-0 transition-opacity duration-1000"
         :class="current === {{ $index }} ? 'opacity-100 z-10' : 'opacity-0 z-0'">
        @if($slider->image)
            <img src="{{ Storage::url($slider->image) }}" alt="{{ $slider->title }}"
                 class="w-full h-full object-cover">
        @else
            <div class="w-full h-full bg-dark"></div>
        @endif
    </div>
    @endforeach
    <div class="absolute inset-0 hero-gradient z-20"></div>
    <div class="absolute inset-0 z-30 flex flex-col justify-center items-start px-4 sm:px-20 max-w-7xl mx-auto text-white">
        <p class="text-lg md:text-xl font-medium mb-2"># {{ $sliders->first()->subtitle ?? 'Sekolah Unggul' }}</p>
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold mb-8 tracking-tight text-white">{{ strtoupper($siteName ?? 'SMKN 6 YOGYAKARTA') }}</h1>
        <a href="{{ $sliders->first()->button_url ?? route('contact.index') }}"
           class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 px-8 rounded shadow-lg transition-transform transform hover:scale-105">
            {{ $sliders->first()->button_text ?? 'Hubungi Kami' }}
        </a>
    </div>

    @if($sliders->count() > 1)
    <button @click="prev()" aria-label="Previous"
            class="absolute left-4 top-1/2 -translate-y-1/2 z-40 text-white/50 hover:text-white transition-colors">
        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
    </button>
    <button @click="next()" aria-label="Next"
            class="absolute right-4 top-1/2 -translate-y-1/2 z-40 text-white/50 hover:text-white transition-colors">
        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
    </button>
    @endif
</section>
@endif

{{-- ===================== WELCOME + PROGRAM KEAHLIAN ===================== --}}
@php
    $fallbackImages = [
        'usaha-perjalanan-wisata' => 'assets/program-keahlian/usaha-perjalanan-wisata.webp',
        'perhotelan' => 'assets/program-keahlian/perhotelan.webp',
        'kuliner' => 'assets/program-keahlian/kuliner.webp',
        'tata-kecantikan-rambut-kulit' => 'assets/program-keahlian/kecantikan-spa.webp',
        'kecantikan' => 'assets/program-keahlian/kecantikan-spa.webp',
        'spa' => 'assets/program-keahlian/kecantikan-spa.webp',
        'tata-busana' => 'assets/program-keahlian/tata-busana.webp',
    ];
    $defaultFallback = 'assets/program-keahlian/kuliner.webp';

    function getCompetencyImage($competency, $fallbackImages, $defaultFallback) {
        if ($competency->image) {
            return Storage::url($competency->image);
        }
        if ($competency->icon) {
            return Storage::url($competency->icon);
        }
        $slug = $competency->slug;
        if (isset($fallbackImages[$slug])) {
            return '/' . $fallbackImages[$slug];
        }
        foreach ($fallbackImages as $key => $path) {
            if (Str::contains($slug, $key)) {
                return '/' . $path;
            }
        }
        return '/' . $defaultFallback;
    }
@endphp

<section class="bg-white" style="padding-top: 80px; padding-bottom: 80px;">
    <div class="mx-auto px-4 sm:px-6 lg:px-8" style="max-width: 1280px;">
        <div class="flex flex-col lg:flex-row items-start" style="gap: 48px;">

            {{-- Kolom Kiri: Foto + Sambutan --}}
            <div class="w-full lg:w-auto flex-shrink-0">
                {{-- Foto Kepala Sekolah --}}
                <div class="relative" style="width: 360px; height: 470px;">
                    @if($kepalaSekolahPhoto)
                        <img src="{{ Storage::url($kepalaSekolahPhoto) }}" alt="{{ $kepalaSekolahName }}"
                             class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                            <svg class="w-20 h-20 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/>
                            </svg>
                        </div>
                    @endif
                    {{-- Overlay Nama --}}
                    <div class="absolute bottom-0 left-0 right-0 bg-[#ef9800] text-white text-center" style="height: 60px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                        <span style="font-size: 17px; font-weight: 700; line-height: 1.3;">{{ $kepalaSekolahName }}</span>
                        <span style="font-size: 12px; font-weight: 600; line-height: 1.3;">(Kepala Sekolah)</span>
                    </div>
                </div>

                {{-- Sambutan --}}
                <div style="margin-top: 18px; display: flex; gap: 12px; align-items: flex-start;">
                    {{-- Quote Icon --}}
                    <div style="flex-shrink: 0; margin-right: 12px; margin-top: -2px;">
                        <span style="font-size: 44px; font-weight: bold; line-height: 1; color: #6B7280; font-family: Georgia, 'Times New Roman', serif;">&ldquo;</span>
                    </div>
                    {{-- Text --}}
                    <div>
                        <h4 style="font-size: 18px; font-weight: 700; color: #1F2937; line-height: 1.25; margin-bottom: 6px;">Assalamualaikum Wr. Wb</h4>
                        @if($sambutanText)
                            <p style="font-size: 16px; line-height: 1.7; color: #374151; max-width: 260px;">{!! Str::limit(strip_tags($sambutanText), 300) !!}</p>
                        @else
                            <p style="font-size: 16px; line-height: 1.7; color: #374151; max-width: 260px;">Kami mengucapkan selamat datang di website kami, Sekolah Menengah Kejuruan Negeri SMKN 6 Yogyakarta.</p>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Kolom Kanan: Program Keahlian --}}
            @if($competencies->count() > 0)
            <div class="w-full flex-1 min-w-0">
                <h2 class="font-extrabold text-[#173F8A] leading-tight" style="font-size: 48px;">Program Keahlian</h2>

                {{-- Flexbox Accordion Rows --}}
                @php $rows = $competencies->chunk(3); @endphp
                @foreach($rows as $row)
                <div class="program-row">
                    @foreach($row as $competency)
                    @php $imgSrc = getCompetencyImage($competency, $fallbackImages, $defaultFallback); @endphp
                    <a href="{{ route('competencies.show', $competency->slug) }}" class="program-item">
                        <img src="{{ $imgSrc }}" alt="{{ $competency->name }}" class="program-item-img" loading="lazy">
                        <div class="program-item-overlay"></div>
                        <div class="program-item-diagonal"></div>
                        <div class="program-item-diagonal-gold"></div>
                        <div class="program-item-content">
                            <span class="program-item-name">{{ $competency->name }}</span>
                        </div>
                        <div class="program-item-strip">
                            <span>{{ strtoupper($competency->name) }}</span>
                        </div>
                    </a>
                    @endforeach
                </div>
                @endforeach
            </div>
            @endif

        </div>
    </div>
</section>

{{-- ===================== VIDEO (Jurusan) ===================== --}}
@if($videos->count() > 0)
<section class="bg-zinc-100 py-12">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-secondary mb-10 uppercase tracking-widest">Video</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4" style="grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));">
            @foreach($videos as $video)
            <div class="bg-black aspect-[9/16] rounded shadow overflow-hidden">
                @if($video->video_file)
                <video class="w-full h-full object-cover" controls preload="metadata" playsinline
                       @if($video->thumbnail) poster="{{ Storage::url($video->thumbnail) }}" @endif>
                    <source src="{{ $video->video_url }}" type="video/mp4">
                </video>
                @else
                <div class="w-full h-full flex items-center justify-center text-gray-500 text-sm">Belum ada video</div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ===================== DATA STATISTIK ===================== --}}
@if($statistics->count() > 0)
<section class="stat-bg py-20 text-white"
    x-data="{
        started: false,
        counters: {},
        start() {
            if (this.started) return;
            this.started = true;
            @foreach($statistics as $i => $stat)
            this.animateCount({{ $i }}, {{ is_numeric($stat->value) ? (int)$stat->value : 0 }}, '{{ is_numeric($stat->value) ? '' : $stat->value }}');
            @endforeach
        },
        animateCount(id, target, staticVal) {
            if (staticVal !== '') { this.counters[id] = staticVal; return; }
            let n = 0;
            const step = Math.max(1, Math.ceil(target / 80));
            const t = setInterval(() => {
                n = Math.min(n + step, target);
                this.counters[id] = n;
                if (n >= target) clearInterval(t);
            }, 20);
        }
    }"
    x-intersect="start()">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-4xl font-extrabold text-center mb-16 tracking-wide">Data Statistik</h2>
        <div class="grid grid-cols-1 gap-12 text-center" style="grid-template-columns: repeat({{ min($statistics->count(), 3) }}, minmax(0, 1fr));">
            @foreach($statistics as $i => $stat)
            <div class="flex flex-col items-center {{ $i > 0 ? 'md:border-l md:border-white/20' : '' }}">
                <div class="bg-primary p-4 rounded-full mb-4">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                </div>
                <p class="text-6xl font-black mb-2" x-text="counters[{{ $i }}] !== undefined ? counters[{{ $i }}] : '{{ $stat->value }}'">{{ $stat->value }}</p>
                <p class="text-xl font-bold uppercase">{{ $stat->label }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ===================== BERITA ===================== --}}
@if($news->count() > 0)
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="section-title">Berita</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($news as $item)
            <article class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 flex flex-col">
                @if($item->featured_image)
                <a href="{{ route('news.show', $item->slug) }}" class="block overflow-hidden">
                    <img src="{{ Storage::url($item->featured_image) }}" alt="{{ $item->title }}"
                         class="w-full h-64 object-cover hover:scale-105 transition-transform duration-500">
                </a>
                @endif
                <div class="p-6 flex-grow flex flex-col">
                    <h3 class="font-bold text-lg mb-2 text-secondary hover:text-primary transition line-clamp-2">
                        <a href="{{ route('news.show', $item->slug) }}">{{ $item->title }}</a>
                    </h3>
                    <p class="text-xs text-gray-400 mb-4 flex items-center">
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        {{ $item->published_at?->format('M j, Y') ?? $item->created_at->format('M j, Y') }}
                    </p>
                    <p class="text-sm text-gray-600 line-clamp-4 mb-4 flex-grow">
                        {{ $item->excerpt ?? Str::limit(strip_tags($item->content), 180) }}
                    </p>
                    <a href="{{ route('news.show', $item->slug) }}"
                       class="inline-block w-full text-center border border-primary text-primary font-bold py-2 px-4 rounded hover:bg-primary hover:text-white transition mt-auto">
                        Read More
                    </a>
                </div>
            </article>
            @endforeach
        </div>
        <div class="mt-12 text-center">
            <a href="{{ route('news.index') }}"
               class="bg-primary hover:bg-primary-dark text-white font-bold py-3 px-8 rounded-lg shadow-md transition">
                Berita Selengkapnya
            </a>
        </div>
    </div>
</section>
@endif

{{-- ===================== MITRA KERJA ===================== --}}
@if($partners->count() > 0)
<section class="py-16 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="section-title">Mitra Kerja</h2>
        <div x-data="{
            current: 0,
            total: {{ $partners->count() }},
            perPage: 5,
            get pages() { return Math.ceil(this.total / this.perPage); },
            get maxPage() { return this.pages - 1; },
            next() { this.current = this.current < this.maxPage ? this.current + 1 : 0; },
            goTo(page) { this.current = page; }
        }" class="relative">
            <div class="overflow-hidden">
                <div class="flex transition-transform duration-500 ease-in-out"
                     :style="'transform: translateX(-' + (current * 100) + '%)'">
                    @php $chunks = $partners->chunk(5); @endphp
                    @foreach($chunks as $chunk)
                    <div class="w-full flex-shrink-0 flex justify-center items-center gap-10 opacity-90">
                        @foreach($chunk as $partner)
                        <div class="p-2 flex-shrink-0">
                            @if($partner->url)
                            <a href="{{ $partner->url }}" target="_blank" rel="noopener">
                                @if($partner->logo)
                                <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}"
                                     class="h-16 w-auto grayscale hover:grayscale-0 transition duration-300">
                                @else
                                <span class="text-gray-500 text-base font-medium">{{ $partner->name }}</span>
                                @endif
                            </a>
                            @else
                            @if($partner->logo)
                            <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}"
                                 class="h-16 w-auto grayscale hover:grayscale-0 transition duration-300">
                            @else
                            <span class="text-gray-500 text-base font-medium">{{ $partner->name }}</span>
                            @endif
                            @endif
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
            {{-- Dots --}}
            <div class="flex justify-center gap-2 mt-8">
                <template x-for="page in pages" :key="page">
                    <button @click="goTo(page - 1)"
                            class="w-3 h-3 rounded-full transition-colors duration-300"
                            :class="current === (page - 1) ? 'bg-[#213F99]' : 'bg-gray-300 hover:bg-gray-400'"
                            :aria-label="'Slide ' + page">
                    </button>
                </template>
            </div>
        </div>
    </div>
</section>
@endif

{{-- ===================== VIDEO BANNER ===================== --}}
@if($videoBanners->count() > 0)
<section class="w-full bg-black py-12">
    <div class="max-w-7xl mx-auto px-4 mb-8">
        <h2 class="text-3xl font-bold text-center text-white uppercase tracking-widest">Video Banner</h2>
    </div>
    <div class="flex overflow-x-auto gap-4 px-4 pb-4" style="scrollbar-width: none; -ms-overflow-style: none;">
        @foreach($videoBanners as $video)
        <div class="flex-shrink-0 w-full sm:w-80 md:w-96 h-64 rounded-xl overflow-hidden">
            @if($video->video_file)
            <video class="w-full h-full object-cover rounded-xl" controls preload="metadata" playsinline
                   @if($video->thumbnail) poster="{{ Storage::url($video->thumbnail) }}" @endif>
                <source src="{{ $video->video_url }}" type="video/mp4">
            </video>
            @else
            <div class="w-full h-full flex items-center justify-center text-gray-500 text-sm bg-zinc-900 rounded-xl">Belum ada video</div>
            @endif
        </div>
        @endforeach
    </div>
</section>
@endif

@endsection
