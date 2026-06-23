@extends('layouts.app')

@section('content')
<div class="bg-primary text-white py-12">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold">{{ $news->title }}</h1>
        <p class="text-white/70 mt-2">
            <a href="{{ route('home') }}" class="hover:underline">Home</a> / 
            <a href="{{ route('news.index') }}" class="hover:underline">Berita</a> / 
            {{ Str::limit($news->title, 50) }}
        </p>
    </div>
</div>

<div class="container mx-auto px-4 py-12">
    <div class="max-w-4xl mx-auto">
        <article class="bg-white rounded-lg shadow-md overflow-hidden">
            @if($news->featured_image)
                <img src="{{ Storage::url($news->featured_image) }}" alt="{{ $news->title }}" class="w-full h-auto max-h-[500px] object-cover">
            @endif
            <div class="p-8">
                <div class="flex items-center gap-4 text-sm text-gray-500 mb-6">
                    @if($news->category)
                        <span class="bg-primary/10 text-primary px-3 py-1 rounded-full">{{ $news->category->name }}</span>
                    @endif
                    <span>{{ $news->user?->name ?? 'admin' }}</span>
                    <span>{{ $news->published_at?->format('M d, Y') ?? $news->created_at->format('M d, Y') }}</span>
                </div>
                <div class="prose prose-lg max-w-none">
                    {!! $news->content !!}
                </div>
            </div>
        </article>

        <!-- Related News -->
        @if($relatedNews->count() > 0)
        <div class="mt-12">
            <h3 class="text-2xl font-bold text-primary mb-6">Berita Terkait</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($relatedNews as $item)
                    <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        @if($item->featured_image)
                            <a href="{{ route('news.show', $item->slug) }}">
                                <img src="{{ Storage::url($item->featured_image) }}" alt="{{ $item->title }}" class="w-full h-32 object-cover">
                            </a>
                        @endif
                        <div class="p-4">
                            <h4 class="font-bold text-sm text-gray-800 line-clamp-2">
                                <a href="{{ route('news.show', $item->slug) }}" class="hover:text-primary transition-colors">
                                    {{ $item->title }}
                                </a>
                            </h4>
                            <p class="text-xs text-gray-500 mt-2">{{ $item->published_at?->format('M d, Y') }}</p>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
@endsection








