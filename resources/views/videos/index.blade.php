@extends('layouts.app')

@section('content')
{{-- Banner --}}
<div class="relative h-64 md:h-80 flex items-center justify-center text-white"
    style="background-image: url('{{ Storage::url('images/banner.jpg') }}'); background-size: cover; background-position: center;">
    <div class="absolute inset-0 bg-black/50"></div>
    <div class="relative z-10 container mx-auto px-4 py-10">
        <h1 class="text-2xl font-bold font-['Roboto_Slab']">Video</h1>
        <p class="text-white/70 mt-1 text-sm">
            <a href="{{ route('home') }}" class="breadcrumb-link">Home</a>
            <span class="mx-1">/</span>
            Video
        </p>
    </div>
</div>

<div class="container mx-auto px-4 py-10">
    @if($videos->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($videos as $video)
        <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow border border-gray-100">
            <div class="relative" style="padding-bottom:56.25%">
                <iframe src="{{ $video->embed_url }}" class="absolute inset-0 w-full h-full"
                        frameborder="0" allowfullscreen loading="lazy"></iframe>
            </div>
            <div class="p-4">
                <h3 class="font-semibold text-gray-800 text-sm font-['Roboto_Slab']">{{ $video->title }}</h3>
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
