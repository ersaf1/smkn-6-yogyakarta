@extends('layouts.app')

@section('content')
<div class="bg-primary text-white py-12">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold">Ekstrakulikuler</h1>
        <p class="text-white/70 mt-2"><a href="{{ route('home') }}" class="hover:underline">Home</a> / Ekstrakulikuler</p>
    </div>
</div>

<div class="container mx-auto px-4 py-12">
    @if($extracurriculars->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($extracurriculars as $extracurricular)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                @if($extracurricular->image)
                    <img src="{{ Storage::url($extracurricular->image) }}" alt="{{ $extracurricular->name }}" class="w-full h-48 object-cover">
                @endif
                <div class="p-6">
                    <h3 class="font-bold text-lg text-gray-800 mb-2">{{ $extracurricular->name }}</h3>
                    @if($extracurricular->coach)
                        <p class="text-sm text-gray-600 mb-1"><strong>Pembina:</strong> {{ $extracurricular->coach }}</p>
                    @endif
                    @if($extracurricular->schedule)
                        <p class="text-sm text-gray-600 mb-3"><strong>Jadwal:</strong> {{ $extracurricular->schedule }}</p>
                    @endif
                    @if($extracurricular->description)
                        <p class="text-gray-600 text-sm line-clamp-3">{{ $extracurricular->description }}</p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
    @else
    <div class="text-center py-12 text-gray-500">
        <p>Belum ada data ekstrakulikuler.</p>
    </div>
    @endif
</div>
@endsection








