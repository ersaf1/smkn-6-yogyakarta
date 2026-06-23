@extends('layouts.app')

@section('content')
{{-- Page Banner (sama seperti live site - bg secondary + breadcrumb) --}}
<div class="bg-secondary text-white">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold">Berita</h1>
        <p class="text-white/70 mt-1 text-sm">
            <a href="{{ route('home') }}" class="hover:underline">Home</a>
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
        <article class="bg-white rounded overflow-hidden shadow-sm hover:shadow-md transition-shadow group">
            @if($item->featured_image)
            <a href="{{ route('news.show', $item->slug) }}" class="block overflow-hidden">
                <img src="{{ Storage::url($item->featured_image) }}" alt="{{ $item->title }}"
                     class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
            </a>
            @endif
            <div class="p-5">
                <h2 class="font-bold text-gray-800 mb-2 leading-snug line-clamp-2">
                    <a href="{{ route('news.show', $item->slug) }}" class="hover:text-primary transition-colors">
                        {{ $item->title }}
                    </a>
                </h2>
                <p class="text-xs text-gray-400 mb-3">
                    {{ $item->published_at?->format('M j, Y') ?? $item->created_at->format('M j, Y') }}
                </p>
                <p class="text-gray-600 text-sm line-clamp-3 mb-4 leading-relaxed">
                    {{ $item->excerpt ?? Str::limit(strip_tags($item->content), 180) }}
                </p>
                <a href="{{ route('news.show', $item->slug) }}" class="text-primary font-semibold text-sm hover:underline">
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
