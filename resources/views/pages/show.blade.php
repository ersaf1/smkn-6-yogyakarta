@extends('layouts.app')

@section('content')
<div class="bg-primary text-white py-12">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold">{{ $page->title }}</h1>
        <p class="text-white/70 mt-2">
            <a href="{{ route('home') }}" class="hover:underline">Home</a> / {{ $page->title }}
        </p>
    </div>
</div>

<div class="container mx-auto px-4 py-12">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            @if($page->featured_image)
                <img src="{{ Storage::url($page->featured_image) }}" alt="{{ $page->title }}" class="w-full h-auto max-h-[400px] object-cover">
            @endif
            <div class="p-8">
                @if($page->excerpt)
                    <p class="text-lg text-gray-700 mb-6">{{ $page->excerpt }}</p>
                @endif
                @if($page->content)
                    <div class="prose prose-lg max-w-none">
                        {!! $page->content !!}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection








