@extends('layouts.app')

@section('content')
{{-- Banner --}}
<div class="relative bg-secondary text-white overflow-hidden">
    @if($page->featured_image)
    <img src="{{ Storage::url($page->featured_image) }}" alt="" class="absolute inset-0 w-full h-full object-cover opacity-30">
    @else
    <img src="{{ asset('images/banner.jpg') }}" alt="" class="absolute inset-0 w-full h-full object-cover opacity-30">
    @endif
    <div class="relative container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold">{{ $page->title }}</h1>
        <p class="text-white/70 mt-1 text-sm">
            <a href="{{ route('home') }}" class="hover:underline">Home</a>
            <span class="mx-1">/</span>
            {{ $page->title }}
        </p>
    </div>
</div>

<div class="container mx-auto px-4 py-10">
    <div class="max-w-4xl mx-auto">
        {{-- Kepala Sekolah page: foto besar di kiri --}}
        @if($page->slug === 'sambutan-kepala-sekolah')
        @php
            $kepalaName = \App\Models\Setting::get('kepala_sekolah_name', 'Mujari, S.Pd, M.Pd');
            $kepalaPhoto = \App\Models\Setting::get('kepala_sekolah_photo', '');
        @endphp
        <div class="flex flex-col md:flex-row gap-8 mb-8">
            @if($kepalaPhoto)
            <div class="flex-shrink-0">
                <img src="{{ Storage::url($kepalaPhoto) }}" alt="{{ $kepalaName }}"
                     class="w-56 h-auto object-cover rounded shadow-md">
                <p class="text-center text-sm font-semibold text-gray-700 mt-2">{{ $kepalaName }}</p>
                <p class="text-center text-xs text-gray-400">(Kepala Sekolah)</p>
            </div>
            @endif
            <div class="prose max-w-none text-gray-700">
                {!! $page->content !!}
            </div>
        </div>
        @else
        <div class="prose max-w-none text-gray-700">
            {!! $page->content !!}
        </div>
        @endif
    </div>
</div>
@endsection
