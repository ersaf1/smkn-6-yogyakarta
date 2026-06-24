@extends('layouts.app')

@section('content')
{{-- Banner --}}
<div class="page-banner">
    <div class="container mx-auto px-4 py-10 relative">
        <h1 class="text-2xl font-bold font-['Roboto_Slab']">Berita</h1>
        <p class="text-white/70 mt-1 text-sm">
            <a href="{{ route('home') }}" class="breadcrumb-link">Home</a>
            <span class="mx-1">/</span>
            <a href="{{ route('news.index') }}" class="breadcrumb-link">Berita</a>
            <span class="mx-1">/</span>
            {{ Str::limit($news->title, 40) }}
        </p>
    </div>
</div>

<div class="container mx-auto px-4 py-10">
    <div class="max-w-3xl mx-auto">
        @if($news->featured_image)
        <img src="{{ Storage::url($news->featured_image) }}" alt="{{ $news->title }}"
             class="w-full rounded-lg mb-8 shadow">
        @endif
        <h1 class="text-3xl font-bold text-dark mb-3 leading-tight font-['Roboto_Slab']">{{ $news->title }}</h1>
        <div class="flex items-center gap-4 text-sm text-gray-400 mb-8">
            <span class="flex items-center gap-1">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                {{ $news->published_at?->format('d M Y') ?? $news->created_at->format('d M Y') }}
            </span>
            @if($news->category)
            <span class="bg-primary/10 text-primary px-3 py-0.5 rounded-full">{{ $news->category->name }}</span>
            @endif
        </div>
        <div class="prose max-w-none text-gray-700 leading-relaxed">
            {!! $news->content !!}
        </div>
        <div class="mt-10 pt-6 border-t border-gray-200">
            <a href="{{ route('news.index') }}" class="inline-flex items-center gap-2 text-primary font-semibold hover:underline">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Kembali ke Berita
            </a>
        </div>
    </div>
</div>
@endsection
