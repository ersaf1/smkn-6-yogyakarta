@extends('layouts.app')

@section('content')
<!-- Slider Section -->
@if($sliders->count() > 0)
<section class="relative" x-data="{ current: 0 }">
    <div class="relative h-[500px] md:h-[600px] overflow-hidden">
        @foreach($sliders as $index => $slider)
            <div class="absolute inset-0 transition-opacity duration-1000" x-show="current === {{ $index }}" x-cloak>
                <img src="{{ Storage::url($slider->image) }}" alt="{{ $slider->title }}" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black/40"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="text-center text-white px-4">
                        <h2 class="text-4xl md:text-6xl font-bold mb-4">{{ $slider->title }}</h2>
                        @if($slider->subtitle)
                            <p class="text-xl md:text-2xl mb-8">{{ $slider->subtitle }}</p>
                        @endif
                        @if($slider->button_text && $slider->button_url)
                            <a href="{{ $slider->button_url }}" class="inline-block bg-accent text-white px-8 py-3 rounded-lg font-semibold hover:bg-accent/90 transition-colors">
                                {{ $slider->button_text }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
    <!-- Navigation Arrows -->
    @if($sliders->count() > 1)
        <button @click="current = current === 0 ? {{ $sliders->count() - 1 }} : current - 1" class="absolute left-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-white/20 hover:bg-white/40 rounded-full flex items-center justify-center text-white transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>
        <button @click="current = current === {{ $sliders->count() - 1 }} ? 0 : current + 1" class="absolute right-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-white/20 hover:bg-white/40 rounded-full flex items-center justify-center text-white transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </button>
    @endif
</section>
@endif

<!-- Kepala Sekolah Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center gap-8">
            @if($kepalaSekolahPhoto)
                <div class="flex-shrink-0">
                    <img src="{{ Storage::url($kepalaSekolahPhoto) }}" alt="{{ $kepalaSekolahName }}" class="w-48 h-48 object-cover rounded-lg shadow-lg">
                </div>
            @endif
            <div class="text-center md:text-left">
                <h2 class="text-2xl font-bold text-primary mb-2">{{ $kepalaSekolahName }}</h2>
                <p class="text-gray-600 mb-2">(Kepala Sekolah)</p>
                @if($sambutanText)
                    <p class="text-gray-700 leading-relaxed">{!! Str::limit(strip_tags($sambutanText), 300) !!}</p>
                @endif
                <a href="{{ route('pages.show', 'sambutan-kepala-sekolah') }}" class="inline-block mt-4 text-primary font-semibold hover:underline">
                    Baca Selengkapnya &rarr;
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Image Accordion Section -->
@if($accordions->count() > 0)
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-{{ min($accordions->count(), 4) }} gap-4">
            @foreach($accordions as $accordion)
                <div class="relative group overflow-hidden rounded-lg h-80 cursor-pointer" x-data="{ expanded: false }" @mouseenter="expanded = true" @mouseleave="expanded = false">
                    @if($accordion->image)
                        <img src="{{ Storage::url($accordion->image) }}" alt="{{ $accordion->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-primary to-primary-dark"></div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                        <h3 class="text-xl font-bold mb-2">{{ $accordion->title }}</h3>
                        <div x-show="expanded" x-cloak class="text-sm text-gray-200">
                            {!! Str::limit(strip_tags($accordion->content), 100) !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Program Keahlian Section -->
@if($competencies->count() > 0)
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-primary mb-12">Program Keahlian</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-{{ min($competencies->count(), 5) }} gap-6">
            @foreach($competencies as $competency)
                <a href="{{ route('competencies.show', $competency->slug) }}" class="group text-center">
                    <div class="w-24 h-24 mx-auto mb-4 bg-primary/10 rounded-full flex items-center justify-center group-hover:bg-primary/20 transition-colors">
                        @if($competency->icon)
                            <img src="{{ Storage::url($competency->icon) }}" alt="{{ $competency->name }}" class="w-12 h-12 object-contain">
                        @else
                            <svg class="w-12 h-12 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        @endif
                    </div>
                    <h3 class="font-semibold text-gray-800 group-hover:text-primary transition-colors">{{ $competency->name }}</h3>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Data Statistik Section -->
@if($statistics->count() > 0)
<section class="py-16 bg-primary text-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">Data Statistik</h2>
        <div class="grid grid-cols-2 md:grid-cols-{{ min($statistics->count(), 4) }} gap-8">
            @foreach($statistics as $stat)
                <div class="text-center">
                    <div class="text-5xl font-bold mb-2">{{ $stat->value }}{{ $stat->suffix ?? '' }}</div>
                    <div class="text-lg text-white/70">{{ $stat->label }}</div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Berita Section -->
@if($news->count() > 0)
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-primary mb-12">BERITA</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($news as $item)
                <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    @if($item->featured_image)
                        <a href="{{ route('news.show', $item->slug) }}">
                            <img src="{{ Storage::url($item->featured_image) }}" alt="{{ $item->title }}" class="w-full h-48 object-cover">
                        </a>
                    @endif
                    <div class="p-6">
                        <h3 class="font-bold text-lg text-gray-800 mb-2 line-clamp-2">
                            <a href="{{ route('news.show', $item->slug) }}" class="hover:text-primary transition-colors">
                                {{ $item->title }}
                            </a>
                        </h3>
                        <p class="text-sm text-gray-500 mb-3">{{ $item->published_at?->format('M d, Y') ?? $item->created_at->format('M d, Y') }}</p>
                        <p class="text-gray-600 text-sm line-clamp-3 mb-4">{{ $item->excerpt ?? Str::limit(strip_tags($item->content), 150) }}</p>
                        <a href="{{ route('news.show', $item->slug) }}" class="text-primary font-semibold text-sm hover:underline">
                            Read More &rarr;
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
        <div class="text-center mt-8">
            <a href="{{ route('news.index') }}" class="inline-block bg-accent text-white px-8 py-3 rounded-lg font-semibold hover:bg-accent/90 transition-colors">
                Berita Selengkapnya
            </a>
        </div>
    </div>
</section>
@endif
@endsection








