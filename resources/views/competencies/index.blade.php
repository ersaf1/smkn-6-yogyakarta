@extends('layouts.app')

@section('content')
<div class="bg-primary text-white py-12">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold">Kompetensi Keahlian</h1>
        <p class="text-white/70 mt-2"><a href="{{ route('home') }}" class="hover:underline">Home</a> / Kompetensi Keahlian</p>
    </div>
</div>

<div class="container mx-auto px-4 py-12">
    @if($competencies->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($competencies as $competency)
            <a href="{{ route('competencies.show', $competency->slug) }}" class="group bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                @if($competency->image)
                    <img src="{{ Storage::url($competency->image) }}" alt="{{ $competency->name }}" class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gradient-to-br from-primary to-primary-dark flex items-center justify-center">
                        @if($competency->icon)
                            <img src="{{ Storage::url($competency->icon) }}" alt="{{ $competency->name }}" class="w-20 h-20 object-contain">
                        @else
                            <svg class="w-20 h-20 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        @endif
                    </div>
                @endif
                <div class="p-6">
                    <h3 class="font-bold text-lg text-gray-800 group-hover:text-primary transition-colors">{{ $competency->name }}</h3>
                    @if($competency->description)
                        <p class="text-gray-600 text-sm mt-2 line-clamp-3">{{ $competency->description }}</p>
                    @endif
                </div>
            </a>
        @endforeach
    </div>
    @else
    <div class="text-center py-12 text-gray-500">
        <p>Belum ada data kompetensi keahlian.</p>
    </div>
    @endif
</div>
@endsection








