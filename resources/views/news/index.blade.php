@extends('layouts.app')

@section('content')
{{-- Page Banner --}}
<div class="page-banner">
    <div class="container mx-auto px-4 py-10 relative">
        <h1 class="text-2xl font-bold font-['Roboto_Slab']">Berita</h1>
        <p class="text-white/70 mt-1 text-sm">
            <a href="{{ route('home') }}" class="breadcrumb-link">Home</a>
            <span class="mx-1">/</span>
            Berita
        </p>
    </div>
</div>

<div class="container mx-auto px-4 py-10">
    {{-- Category Filter --}}
    @if($categories->count() > 0)
    <div class="flex flex-wrap gap-2 mb-8">
        <a href="{{ route('news.index') }}"
           class="px-4 py-1.5 text-sm font-medium rounded-full transition-colors {{ !request('category') ? 'bg-primary text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
            Semua
        </a>
        @foreach($categories as $category)
        <a href="{{ route('news.index', ['category' => $category->slug]) }}"
           class="px-4 py-1.5 text-sm font-medium rounded-full transition-colors {{ request('category') === $category->slug ? 'bg-primary text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
            {{ $category->name }}
        </a>
        @endforeach
    </div>
    @endif

    {{-- News Grid --}}
    @if($news->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($news as $item)
        <article class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow group border border-gray-100">
            @if($item->featured_image)
            <a href="{{ route('news.show', $item->slug) }}" class="block overflow-hidden">
                <img src="{{ Storage::url($item->featured_image) }}" alt="{{ $item->title }}"
                     class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
            </a>
            @endif
            <div class="p-5">
                <h2 class="font-bold text-gray-800 mb-2 leading-snug line-clamp-2 font-['Roboto_Slab']">
                    <a href="{{ route('news.show', $item->slug) }}" class="hover:text-primary transition-colors">
                        {{ $item->title }}
                    </a>
                </h2>
                <p class="text-xs text-gray-400 mb-3 flex items-center gap-1">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    {{ $item->published_at?->format('M j, Y') ?? $item->created_at->format('M j, Y') }}
                </p>
                <p class="text-gray-600 text-sm line-clamp-3 mb-4 leading-relaxed">
                    {{ $item->excerpt ?? Str::limit(strip_tags($item->content), 180) }}
                </p>
                <a href="{{ route('news.show', $item->slug) }}" class="inline-block border-2 border-primary text-primary px-6 py-2 rounded font-semibold hover:bg-primary hover:text-white transition-colors text-sm">
                    Baca Berita
                </a>
            </div>
        </article>
        @endforeach
    </div>
    <div class="mt-8">
        {{ $news->links() }}
    </div>
    @else
    <div class="text-center py-16 text-gray-400">Belum ada berita.</div>
    @endif
</div>
@endsection
