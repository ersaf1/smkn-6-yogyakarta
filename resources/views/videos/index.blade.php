@extends('layouts.app')

@section('content')
{{-- Banner --}}
<div class="relative bg-secondary text-white overflow-hidden">
    <img src="{{ asset('images/banner.jpg') }}" alt="" class="absolute inset-0 w-full h-full object-cover opacity-30">
    <div class="relative container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold">Video</h1>
        <p class="text-white/70 mt-1 text-sm">
            <a href="{{ route('home') }}" class="hover:underline">Home</a>
            <span class="mx-1">/</span>
            Video
        </p>
    </div>
</div>

<div class="container mx-auto px-4 py-10">
    @if($videos->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($videos as $video)
        <div class="bg-white rounded overflow-hidden shadow-sm hover:shadow-md transition-shadow">
            <div class="relative" style="padding-bottom:56.25%">
                <iframe src="{{ $video->embed_url }}" class="absolute inset-0 w-full h-full"
                        frameborder="0" allowfullscreen loading="lazy"></iframe>
            </div>
            <div class="p-4">
                <h3 class="font-semibold text-gray-800 text-sm">{{ $video->title }}</h3>
                @if($video->description)
                <p class="text-gray-500 text-xs mt-1 line-clamp-2">{{ $video->description }}</p>
                @endif
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="text-center py-16 text-gray-400">Belum ada video.</div>
    @endif
</div>
@endsection
