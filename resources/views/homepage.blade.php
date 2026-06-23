@extends('layouts.app')

@section('content')

{{-- ===================== HERO SLIDER ===================== --}}
@if($sliders->count() > 0)
<section class="relative overflow-hidden"
    x-data="{
        current: 0,
        total: {{ $sliders->count() }},
        init() { setInterval(() => { this.current = (this.current + 1) % this.total; }, 8000); },
        prev() { this.current = (this.current - 1 + this.total) % this.total; },
        next() { this.current = (this.current + 1) % this.total; }
    }"
    x-init="init()">

    <div class="relative" style="height:700px">
        @foreach($sliders as $index => $slider)
        <div class="absolute inset-0 transition-opacity duration-1000"
             :class="current === {{ $index }} ? 'opacity-100 z-10' : 'opacity-0 z-0'">
            @if($slider->image)
                <img src="{{ Storage::url($slider->image) }}" alt="{{ $slider->title }}"
                     class="w-full h-full object-cover">
            @else
                <div class="w-full h-full bg-secondary"></div>
            @endif
            <div class="absolute inset-0 bg-black/40"></div>
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="text-center text-white px-4">
                    <p class="uppercase tracking-widest text-sm mb-2 font-medium">SMKN 6 YOGYAKARTA</p>
                    <h2 class="text-5xl md:text-6xl font-bold mb-2 drop-shadow">Sekolah Unggul</h2>
                    <h3 class="text-4xl md:text-5xl font-bold mb-8 drop-shadow">{{ strtoupper($slider->title) }}</h3>
                    <a href="{{ $slider->button_url ?? route('contact.index') }}"
                       class="inline-block bg-primary text-white px-8 py-3 rounded font-semibold hover:bg-primary-dark transition-colors">
                        {{ $slider->button_text ?? 'Hubungi Kami' }}
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if($sliders->count() > 1)
    <button @click="prev()" aria-label="Previous"
            class="absolute left-4 top-1/2 -translate-y-1/2 z-20 flex items-center justify-center">
        <svg width="32" height="32" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
            <path d="M11.433 15.992L22.69 5.712c.393-.39.393-1.03 0-1.42-.393-.39-1.03-.39-1.423 0l-11.98 10.94c-.21.21-.3.49-.285.76-.015.28.075.56.284.77l11.98 10.94c.393.39 1.03.39 1.424 0 .393-.4.393-1.03 0-1.42l-11.257-10.29" fill="#ffffff" opacity="0.8" fill-rule="evenodd"/>
        </svg>
    </button>
    <button @click="next()" aria-label="Next"
            class="absolute right-4 top-1/2 -translate-y-1/2 z-20 flex items-center justify-center">
        <svg width="32" height="32" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
            <path d="M10.722 4.293c-.394-.39-1.032-.39-1.427 0-.393.39-.393 1.03 0 1.42l11.283 10.28-11.283 10.29c-.393.39-.393 1.02 0 1.42.395.39 1.033.39 1.427 0l12.007-10.94c.21-.21.3-.49.284-.77.014-.27-.076-.55-.286-.76L10.72 4.293z" fill="#ffffff" opacity="0.8" fill-rule="evenodd"/>
        </svg>
    </button>
    @endif
</section>
@endif

{{-- ===================== KEPALA SEKOLAH ===================== --}}
<section class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-start gap-10">
            @if($kepalaSekolahPhoto)
            <div class="flex-shrink-0 mx-auto md:mx-0">
                <img src="{{ Storage::url($kepalaSekolahPhoto) }}" alt="{{ $kepalaSekolahName }}"
                     class="w-64 h-auto object-cover rounded shadow-md">
            </div>
            @endif
            <div>
                <h2 class="text-2xl font-bold text-secondary mb-1">{{ $kepalaSekolahName }}</h2>
                <p class="text-gray-500 mb-3 text-sm">(Kepala Sekolah)</p>
                <h5 class="font-semibold text-gray-700 mb-3 text-sm">Asalamualaikum Wr. Wb</h5>
                @if($sambutanText)
                    <p class="text-gray-600 leading-relaxed text-sm">{!! Str::limit(strip_tags($sambutanText), 500) !!}</p>
                @else
                    <p class="text-gray-600 leading-relaxed text-sm">Kami mengucapkan selamat datang di website kami, Sekolah Menengah Kejuruan Negeri SMKN 6 Yogyakarta.</p>
                @endif
            </div>
        </div>
    </div>
</section>

{{-- ===================== IMAGE ACCORDION ===================== --}}
@if($accordions->count() > 0)
<section>
    <div class="flex" style="height: 380px" x-data="{ active: null }">
        @foreach($accordions as $i => $accordion)
        <div class="relative overflow-hidden cursor-pointer transition-all duration-500 ease-in-out"
             style="flex: 1"
             :style="active === {{ $i }} ? 'flex: 3.5' : 'flex: 1'"
             @mouseenter="active = {{ $i }}"
             @mouseleave="active = null">
            @if($accordion->image)
                <img src="{{ Storage::url($accordion->image) }}" alt="{{ $accordion->title }}"
                     class="w-full h-full object-cover">
            @else
                <div class="w-full h-full bg-gradient-to-b from-secondary to-secondary/70"></div>
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
            <div class="absolute bottom-0 left-0 right-0 p-5 text-white">
                <h3 class="font-bold text-lg">{{ $accordion->title }}</h3>
                <div x-show="active === {{ $i }}" x-cloak
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     class="text-sm text-gray-200 mt-1">
                    {!! Str::limit(strip_tags($accordion->content), 120) !!}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endif

{{-- ===================== PROGRAM KEAHLIAN ===================== --}}
@if($competencies->count() > 0)
<section class="py-14 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-secondary mb-10">Program Keahlian</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
            @foreach($competencies as $competency)
            <a href="{{ route('competencies.show', $competency->slug) }}"
               class="group flex flex-col items-center text-center p-5 hover:bg-gray-50 transition-colors rounded-lg">
                <div class="w-20 h-20 mb-4 bg-primary/10 rounded-full flex items-center justify-center group-hover:bg-primary transition-all duration-300">
                    @if($competency->icon)
                        <img src="{{ Storage::url($competency->icon) }}" alt="{{ $competency->name }}"
                             class="w-10 h-10 object-contain group-hover:brightness-0 group-hover:invert transition-all">
                    @else
                        <svg class="w-10 h-10 text-primary group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    @endif
                </div>
                <h3 class="font-semibold text-gray-700 text-sm group-hover:text-primary transition-colors leading-tight">
                    {{ $competency->name }}
                </h3>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ===================== DATA STATISTIK ===================== --}}
@if($statistics->count() > 0)
<section class="py-14 bg-secondary text-white"
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
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-10">Data Statistik</h2>
        <div class="flex flex-wrap justify-center gap-16">
            @foreach($statistics as $i => $stat)
            <div class="text-center">
                <div class="text-6xl font-bold mb-2" x-text="counters[{{ $i }}] !== undefined ? counters[{{ $i }}] : '{{ $stat->value }}'">{{ $stat->value }}</div>
                <h4 class="text-base font-normal text-white/80">{{ $stat->label }}</h4>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ===================== BERITA ===================== --}}
@if($news->count() > 0)
<section class="py-14 bg-lighter">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-secondary mb-10">BERITA</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($news as $item)
            <article class="bg-white rounded overflow-hidden shadow-sm hover:shadow-md transition-shadow group">
                @if($item->featured_image)
                <a href="{{ route('news.show', $item->slug) }}" class="block overflow-hidden">
                    <img src="{{ Storage::url($item->featured_image) }}" alt="{{ $item->title }}"
                         class="w-full object-cover group-hover:scale-105 transition-transform duration-500" style="height:200px">
                </a>
                @endif
                <div class="p-5">
                    <h3 class="font-bold text-gray-800 mb-2 leading-snug line-clamp-2">
                        <a href="{{ route('news.show', $item->slug) }}" class="hover:text-primary transition-colors">
                            {{ $item->title }}
                        </a>
                    </h3>
                    <p class="text-sm text-gray-400 mb-3">
                        {{ $item->published_at?->format('M j, Y') ?? $item->created_at->format('M j, Y') }}
                    </p>
                    <p class="text-gray-600 text-sm leading-relaxed mb-4 line-clamp-3">
                        {{ $item->excerpt ?? Str::limit(strip_tags($item->content), 180) }}
                    </p>
                    <a href="{{ route('news.show', $item->slug) }}" class="text-primary font-semibold text-sm hover:underline">
                        Read More
                    </a>
                </div>
            </article>
            @endforeach
        </div>
        <div class="text-center mt-8 flex items-center justify-center gap-6">
            <span class="text-gray-400 text-sm cursor-default">Load More</span>
            <a href="{{ route('news.index') }}"
               class="inline-block border-2 border-primary text-primary px-8 py-2.5 rounded font-semibold hover:bg-primary hover:text-white transition-colors text-sm">
                Berita Selengkapnya
            </a>
        </div>
    </div>
</section>
@endif

{{-- ===================== VIDEO ===================== --}}
@if($videos->count() > 0)
<section class="py-14 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-secondary mb-10">VIDEO</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($videos as $video)
            <div class="bg-white rounded overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                <div class="relative" style="padding-bottom:56.25%">
                    <iframe src="{{ $video->embed_url }}" class="absolute inset-0 w-full h-full"
                            frameborder="0" allowfullscreen loading="lazy"></iframe>
                </div>
                <div class="p-4">
                    <h3 class="font-semibold text-gray-800 text-sm">{{ $video->title }}</h3>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ===================== MITRA KERJA ===================== --}}
@if($partners->count() > 0)
<section class="py-12 bg-white border-t border-gray-100">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-bold text-center text-secondary mb-8">Mitra Kerja</h2>
        <div class="flex flex-wrap justify-center items-center gap-4">
            @foreach($partners as $partner)
            <div class="p-2">
                @if($partner->url)
                <a href="{{ $partner->url }}" target="_blank" rel="noopener">
                    @if($partner->logo)
                    <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}"
                         class="h-12 w-auto object-contain grayscale hover:grayscale-0 transition-all duration-300">
                    @else
                    <span class="text-gray-500 text-sm">{{ $partner->name }}</span>
                    @endif
                </a>
                @else
                @if($partner->logo)
                <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}"
                     class="h-12 w-auto object-contain grayscale hover:grayscale-0 transition-all duration-300">
                @else
                <span class="text-gray-500 text-sm">{{ $partner->name }}</span>
                @endif
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection
