@extends('layouts.app')

@section('content')
<div class="bg-primary text-white py-12">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold">Video</h1>
        <p class="text-white/70 mt-2"><a href="{{ route('home') }}" class="hover:underline">Home</a> / Video</p>
    </div>
</div>

<div class="container mx-auto px-4 py-12">
    @if($videos->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($videos as $video)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                <div class="relative pb-[56.25%]">
                    <iframe src="{{ $video->embed_url }}" class="absolute inset-0 w-full h-full" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="p-6">
                    <h3 class="font-bold text-lg text-gray-800 mb-2">{{ $video->title }}</h3>
                    @if($video->description)
                        <p class="text-gray-600 text-sm line-clamp-3">{{ $video->description }}</p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
    @else
    <div class="text-center py-12 text-gray-500">
        <p>Belum ada video.</p>
    </div>
    @endif
</div>
@endsection








