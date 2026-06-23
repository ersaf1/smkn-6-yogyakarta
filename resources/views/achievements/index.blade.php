@extends('layouts.app')

@section('content')
<div class="bg-primary text-white py-12">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold">Prestasi</h1>
        <p class="text-white/70 mt-2"><a href="{{ route('home') }}" class="hover:underline">Home</a> / Prestasi</p>
    </div>
</div>

<div class="container mx-auto px-4 py-12">
    @if($achievements->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($achievements as $achievement)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                @if($achievement->image)
                    <img src="{{ Storage::url($achievement->image) }}" alt="{{ $achievement->title }}" class="w-full h-48 object-cover">
                @endif
                <div class="p-6">
                    <h3 class="font-bold text-lg text-gray-800 mb-2">{{ $achievement->title }}</h3>
                    <div class="flex items-center gap-4 text-sm text-gray-500 mb-3">
                        @if($achievement->year)
                            <span>{{ $achievement->year }}</span>
                        @endif
                        @if($achievement->level)
                            <span>{{ $achievement->level }}</span>
                        @endif
                    </div>
                    @if($achievement->description)
                        <p class="text-gray-600 text-sm line-clamp-3">{{ $achievement->description }}</p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
    @else
    <div class="text-center py-12 text-gray-500">
        <p>Belum ada data prestasi.</p>
    </div>
    @endif
</div>
@endsection








