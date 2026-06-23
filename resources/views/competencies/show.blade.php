@extends('layouts.app')

@section('content')
{{-- Banner --}}
<div class="relative bg-secondary text-white overflow-hidden">
    @if($competency->image)
    <img src="{{ Storage::url($competency->image) }}" alt="" class="absolute inset-0 w-full h-full object-cover opacity-30">
    @else
    <img src="{{ asset('images/banner.jpg') }}" alt="" class="absolute inset-0 w-full h-full object-cover opacity-30">
    @endif
    <div class="relative container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold">{{ $competency->name }}</h1>
        <p class="text-white/70 mt-1 text-sm">
            <a href="{{ route('home') }}" class="hover:underline">Home</a>
            <span class="mx-1">/</span>
            <a href="{{ route('competencies.index') }}" class="hover:underline">Kompetensi Keahlian</a>
            <span class="mx-1">/</span>
            {{ $competency->name }}
        </p>
    </div>
</div>

<div class="container mx-auto px-4 py-10">
    <div class="max-w-4xl mx-auto">
        @if($competency->image)
        <img src="{{ Storage::url($competency->image) }}" alt="{{ $competency->name }}"
             class="w-full rounded shadow mb-8 max-h-96 object-cover">
        @endif
        @if($competency->description)
        <p class="text-lg text-gray-600 mb-6">{{ $competency->description }}</p>
        @endif
        @if($competency->content)
        <div class="prose max-w-none text-gray-700">{!! $competency->content !!}</div>
        @endif
        <div class="mt-8">
            <a href="{{ route('competencies.index') }}" class="inline-flex items-center gap-2 text-primary font-semibold hover:underline text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Kembali
            </a>
        </div>
    </div>
</div>
@endsection
