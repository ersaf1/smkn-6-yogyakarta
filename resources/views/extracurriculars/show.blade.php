@extends('layouts.app')

@section('content')
{{-- Banner --}}
<div class="page-banner">
    <div class="container mx-auto px-4 py-10 relative">
        <h1 class="text-2xl font-bold font-['Roboto_Slab']">{{ $extracurricular->name }}</h1>
        <p class="text-white/70 mt-1 text-sm">
            <a href="{{ route('home') }}" class="breadcrumb-link">Home</a>
            <span class="mx-1">/</span>
            <a href="{{ route('extracurriculars.index') }}" class="breadcrumb-link">Ekstrakulikuler</a>
            <span class="mx-1">/</span>
            {{ $extracurricular->name }}
        </p>
    </div>
</div>

<div class="container mx-auto px-4 py-10">
    <div class="max-w-4xl mx-auto">
        @if($extracurricular->image)
        <img src="{{ Storage::url($extracurricular->image) }}" alt="{{ $extracurricular->name }}"
             class="w-full rounded-lg shadow mb-8 max-h-96 object-cover">
        @endif
        <div class="flex flex-wrap gap-6 mb-6">
            @if($extracurricular->coach)
            <div>
                <p class="text-xs text-gray-400">Pembina</p>
                <p class="font-semibold text-gray-800 text-sm">{{ $extracurricular->coach }}</p>
            </div>
            @endif
            @if($extracurricular->schedule)
            <div>
                <p class="text-xs text-gray-400">Jadwal</p>
                <p class="font-semibold text-gray-800 text-sm">{{ $extracurricular->schedule }}</p>
            </div>
            @endif
        </div>
        @if($extracurricular->description)
        <p class="text-gray-700 mb-4">{{ $extracurricular->description }}</p>
        @endif
        @if($extracurricular->content)
        <div class="prose max-w-none text-gray-700">{!! $extracurricular->content !!}</div>
        @endif
        <div class="mt-8">
            <a href="{{ route('extracurriculars.index') }}" class="inline-flex items-center gap-2 text-primary font-semibold hover:underline text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Kembali
            </a>
        </div>
    </div>
</div>
@endsection
