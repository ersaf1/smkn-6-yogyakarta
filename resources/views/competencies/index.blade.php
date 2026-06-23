@extends('layouts.app')

@section('content')
{{-- Banner --}}
<div class="relative bg-secondary text-white overflow-hidden">
    <img src="{{ asset('images/banner.jpg') }}" alt="" class="absolute inset-0 w-full h-full object-cover opacity-30">
    <div class="relative container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold">Kompetensi Keahlian</h1>
        <p class="text-white/70 mt-1 text-sm">
            <a href="{{ route('home') }}" class="hover:underline">Home</a>
            <span class="mx-1">/</span>
            Kompetensi Keahlian
        </p>
    </div>
</div>

<div class="container mx-auto px-4 py-10">
    @if($competencies->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($competencies as $competency)
        <a href="{{ route('competencies.show', $competency->slug) }}"
           class="bg-white rounded overflow-hidden shadow-sm hover:shadow-md transition-shadow group block">
            @if($competency->image)
            <div class="overflow-hidden">
                <img src="{{ Storage::url($competency->image) }}" alt="{{ $competency->name }}"
                     class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
            </div>
            @else
            <div class="w-full h-48 bg-secondary/10 flex items-center justify-center">
                <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center">
                    @if($competency->icon)
                    <img src="{{ Storage::url($competency->icon) }}" alt="" class="w-10 h-10 object-contain">
                    @else
                    <svg class="w-10 h-10 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    @endif
                </div>
            </div>
            @endif
            <div class="p-5">
                <h3 class="font-bold text-gray-800 group-hover:text-primary transition-colors">{{ $competency->name }}</h3>
                @if($competency->description)
                <p class="text-gray-500 text-sm mt-2 line-clamp-2">{{ $competency->description }}</p>
                @endif
            </div>
        </a>
        @endforeach
    </div>
    @else
    <div class="text-center py-16 text-gray-400">Belum ada data kompetensi keahlian.</div>
    @endif
</div>
@endsection
