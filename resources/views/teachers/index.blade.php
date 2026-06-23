@extends('layouts.app')

@section('content')
{{-- Banner --}}
<div class="relative bg-secondary text-white overflow-hidden">
    <img src="{{ asset('images/banner.jpg') }}" alt="" class="absolute inset-0 w-full h-full object-cover opacity-30">
    <div class="relative container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold">Guru &amp; Karyawan</h1>
        <p class="text-white/70 mt-1 text-sm">
            <a href="{{ route('home') }}" class="hover:underline">Home</a>
            <span class="mx-1">/</span>
            Guru &amp; Karyawan
        </p>
    </div>
</div>

<div class="container mx-auto px-4 py-10">
    @if($teachers->count() > 0)
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
        @foreach($teachers as $teacher)
        <div class="bg-white rounded overflow-hidden shadow-sm hover:shadow-md transition-shadow text-center group">
            <div class="overflow-hidden">
                @if($teacher->photo)
                <img src="{{ Storage::url($teacher->photo) }}" alt="{{ $teacher->name }}"
                     class="w-full aspect-square object-cover group-hover:scale-105 transition-transform duration-500">
                @else
                <div class="w-full aspect-square bg-secondary/10 flex items-center justify-center">
                    <svg class="w-16 h-16 text-secondary/30" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/>
                    </svg>
                </div>
                @endif
            </div>
            <div class="p-3">
                <h3 class="font-semibold text-gray-800 text-sm leading-tight">{{ $teacher->name }}</h3>
                <p class="text-xs text-primary mt-1">{{ $teacher->position }}</p>
                @if($teacher->department)
                <p class="text-xs text-gray-400 mt-0.5">{{ $teacher->department }}</p>
                @endif
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="text-center py-16 text-gray-400">Belum ada data guru &amp; karyawan.</div>
    @endif
</div>
@endsection
