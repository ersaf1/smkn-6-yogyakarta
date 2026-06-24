@extends('layouts.app')

@section('content')
{{-- Banner --}}
<div class="relative h-64 md:h-80 flex items-center justify-center text-white"
    style="background-image: url('{{ Storage::url('images/banner.jpg') }}'); background-size: cover; background-position: center;">
    <div class="absolute inset-0 bg-black/50"></div>
    <div class="relative z-10 container mx-auto px-4 py-10">
        <h1 class="text-2xl font-bold font-['Roboto_Slab']">Ekstrakulikuler</h1>
        <p class="text-white/70 mt-1 text-sm">
            <a href="{{ route('home') }}" class="breadcrumb-link">Home</a>
            <span class="mx-1">/</span>
            Ekstrakulikuler
        </p>
    </div>
</div>

<div class="container mx-auto px-4 py-10">
    @if($extracurriculars->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($extracurriculars as $ekskul)
        <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow group border border-gray-100">
            @if($ekskul->image)
            <div class="overflow-hidden">
                <img src="{{ Storage::url($ekskul->image) }}" alt="{{ $ekskul->name }}"
                     class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
            </div>
            @else
            <div class="w-full h-48 bg-primary/10 flex items-center justify-center">
                <svg class="w-12 h-12 text-primary/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            @endif
            <div class="p-5">
                <h3 class="font-bold text-gray-800 mb-2 font-['Roboto_Slab']">{{ $ekskul->name }}</h3>
                <p class="text-gray-600 text-sm line-clamp-2 mb-3">{{ $ekskul->description }}</p>
                @if($ekskul->schedule)
                <p class="text-xs text-primary"><span class="font-medium">Jadwal:</span> {{ $ekskul->schedule }}</p>
                @endif
                @if($ekskul->coach)
                <p class="text-xs text-gray-400 mt-1">Pembina: {{ $ekskul->coach }}</p>
                @endif
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="text-center py-16 text-gray-400">Belum ada data ekstrakulikuler.</div>
    @endif
</div>
@endsection
