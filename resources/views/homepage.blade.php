@extends('layouts.app')

@section('content')

{{-- ===================== HERO SLIDER ===================== --}}
@if($sliders->count() > 0)
<section class="relative h-[500px] md:h-[600px] overflow-hidden"
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
    <div class="relative z-30 h-full flex flex-col justify-center items-start px-4 sm:px-20 max-w-7xl mx-auto text-white">
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
<main class="max-w-7xl mx-auto px-4 py-16 grid grid-cols-1 lg:grid-cols-12 gap-12">
    {{-- Principal Profile --}}
    <section class="lg:col-span-5 flex flex-col items-center lg:items-start">
        <div class="relative w-full max-w-sm">
            @if($kepalaSekolahPhoto)
                <img src="{{ Storage::url($kepalaSekolahPhoto) }}" alt="{{ $kepalaSekolahName }}"
                     class="w-full rounded-lg shadow-xl">
            @else
                <div class="w-full aspect-[3/4] bg-gray-200 rounded-lg flex items-center justify-center">
                    <svg class="w-24 h-24 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/>
                    </svg>
                </div>
            @endif
            <div class="bg-primary text-white p-4 text-center relative z-10 -mt-5 rounded shadow-md mx-4">
                <h3 class="font-bold text-lg">{{ $kepalaSekolahName }}</h3>
                <p class="text-sm">(Kepala Sekolah)</p>
            </div>
        </div>
        <div class="mt-8 relative pl-10">
            <span class="absolute left-0 top-0 text-gray-300 text-6xl font-serif">&ldquo;</span>
            <h4 class="text-xl font-bold text-secondary mb-2">Assalamualaikum Wr. Wb</h4>
            @if($sambutanText)
                <p class="text-gray-600 leading-relaxed italic">{!! Str::limit(strip_tags($sambutanText), 300) !!}</p>
            @else
                <p class="text-gray-600 leading-relaxed italic">Kami mengucapkan selamat datang di website kami, Sekolah Menengah Kejuruan Negeri SMKN 6 Yogyakarta.</p>
            @endif
        </div>
    </section>

    {{-- Program Keahlian Grid --}}
    @if($competencies->count() > 0)
    <section class="lg:col-span-7">
        <h2 class="text-3xl font-bold text-secondary mb-8 border-l-4 border-primary pl-4">Program Keahlian</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($competencies as $competency)
            <a href="{{ route('competencies.show', $competency->slug) }}"
               class="relative group overflow-hidden rounded-lg shadow-md aspect-square">
                @if($competency->icon)
                    <img src="{{ Storage::url($competency->icon) }}" alt="{{ $competency->name }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                @else
                    <div class="w-full h-full bg-primary/10 flex items-center justify-center">
                        <span class="text-primary font-bold text-lg text-center px-2">{{ $competency->name }}</span>
                    </div>
                @endif
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                    <span class="text-white font-bold text-sm">{{ $competency->name }}</span>
                </div>
            </a>
            @endforeach
        </div>
    </section>
    @endif
</main>

{{-- ===================== VIDEO ===================== --}}
@if($videos->count() > 0)
<section class="bg-zinc-100 py-12">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-secondary mb-10 uppercase tracking-widest">Video</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-{{ min($videos->count(), 5) }} gap-4">
            @foreach($videos as $video)
            <div class="bg-black aspect-[9/16] rounded shadow overflow-hidden">
                <iframe src="{{ $video->embed_url }}" class="w-full h-full"
                        frameborder="0" allowfullscreen loading="lazy"></iframe>
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
        <div class="grid grid-cols-1 md:grid-cols-{{ min($statistics->count(), 3) }} gap-12 text-center">
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
        <div class="flex flex-wrap justify-center items-center gap-16 opacity-90">
            @foreach($partners as $partner)
            <div class="p-2">
                @if($partner->url)
                <a href="{{ $partner->url }}" target="_blank" rel="noopener">
                    @if($partner->logo)
                    <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}"
                         class="h-20 w-auto grayscale hover:grayscale-0 transition duration-300">
                    @else
                    <span class="text-gray-500 text-base font-medium">{{ $partner->name }}</span>
                    @endif
                </a>
                @else
                @if($partner->logo)
                <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}"
                     class="h-20 w-auto grayscale hover:grayscale-0 transition duration-300">
                @else
                <span class="text-gray-500 text-base font-medium">{{ $partner->name }}</span>
                @endif
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection
