@extends('layouts.app')

@section('content')
<div class="bg-primary text-white py-12">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold">Berita</h1>
        <p class="text-white/70 mt-2"><a href="{{ route('home') }}" class="hover:underline">Home</a> / Berita</p>
    </div>
</div>

<div class="container mx-auto px-4 py-12">
    <!-- Category Filter -->
    @if($categories->count() > 0)
    <div class="flex flex-wrap gap-2 mb-8">
        <a href="{{ route('news.index') }}" class="px-4 py-2 rounded-full text-sm font-medium {{ !request('category') ? 'bg-primary text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }} transition-colors">
            Semua
        </a>
        @foreach($categories as $category)
            <a href="{{ route('news.index', ['category' => $category->slug]) }}" class="px-4 py-2 rounded-full text-sm font-medium {{ request('category') === $category->slug ? 'bg-primary text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }} transition-colors">
                {{ $category->name }}
            </a>
        @endforeach
    </div>
    @endif

    <!-- News Grid -->
    @if($news->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($news as $item)
            <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                @if($item->featured_image)
                    <a href="{{ route('news.show', $item->slug) }}">
                        <img src="{{ Storage::url($item->featured_image) }}" alt="{{ $item->title }}" class="w-full h-48 object-cover">
                    </a>
                @endif
                <div class="p-6">
                    <h2 class="font-bold text-lg text-gray-800 mb-2 line-clamp-2">
                        <a href="{{ route('news.show', $item->slug) }}" class="hover:text-primary transition-colors">
                            {{ $item->title }}
                        </a>
                    </h2>
                    <div class="flex items-center gap-4 text-sm text-gray-500 mb-3">
                        <span>{{ $item->user?->name ?? 'admin' }}</span>
                        <span>{{ $item->published_at?->format('M d, Y') ?? $item->created_at->format('M d, Y') }}</span>
                    </div>
                    <p class="text-gray-600 text-sm line-clamp-3 mb-4">{{ $item->excerpt ?? Str::limit(strip_tags($item->content), 150) }}</p>
                    <a href="{{ route('news.show', $item->slug) }}" class="text-primary font-semibold text-sm hover:underline">
                        Baca Berita &rarr;
                    </a>
                </div>
            </article>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $news->links() }}
    </div>
    @else
    <div class="text-center py-12 text-gray-500">
        <p>Belum ada berita.</p>
    </div>
    @endif
</div>
@endsection








