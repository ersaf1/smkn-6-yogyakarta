@extends('layouts.app')

@section('content')
@php
    $partners = \App\Models\Partner::where('is_active', true)->orderBy('order')->get();
@endphp

{{-- Banner --}}
<div class="relative h-64 md:h-80 flex items-center justify-center text-white"
    style="background-image: url('{{ $competency->image ? Storage::url($competency->image) : Storage::url('images/banner.jpg') }}'); background-size: cover; background-position: center;">
    <div class="absolute inset-0 bg-black/55"></div>
    <div class="relative z-10 container mx-auto px-4 py-10">
        <h1 class="text-2xl font-bold font-['Roboto_Slab']">{{ $competency->name }}</h1>
        <p class="text-white/70 mt-1 text-sm">
            <a href="{{ route('home') }}" class="breadcrumb-link">Home</a>
            <span class="mx-1">/</span>
            <a href="{{ route('competencies.index') }}" class="breadcrumb-link">Kompetensi Keahlian</a>
            <span class="mx-1">/</span>
            {{ $competency->name }}
        </p>
    </div>
</div>

{{-- Main Content --}}
<main class="max-w-7xl mx-auto px-4 py-16">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">

        {{-- Kolom kiri: foto KAPROGLI sticky --}}
        <aside class="lg:col-span-4">
            <div class="sticky top-24">
                <div class="relative overflow-hidden shadow-xl pb-10">
                    @if($competency->image)
                    <img src="{{ Storage::url($competency->image) }}"
                         alt="{{ $competency->name }}"
                         class="w-full object-cover block">
                    @else
                    <div class="w-full aspect-[3/4] bg-primary/10 flex items-center justify-center">
                        <svg class="w-24 h-24 text-primary/30" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/>
                        </svg>
                    </div>
                    @endif
                    <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[90%] bg-primary text-white py-3 px-4 text-center shadow-lg">
                        <h3 class="font-bold text-lg leading-tight font-['Roboto_Slab']">{{ $competency->name }}</h3>
                        <p class="text-sm opacity-90">Kompetensi Keahlian</p>
                    </div>
                </div>
            </div>
        </aside>

        {{-- Kolom kanan: konten --}}
        <article class="lg:col-span-8">
            <header class="mb-8 border-b-2 border-gray-100 pb-4">
                <h2 class="text-3xl font-bold text-gray-800 uppercase tracking-tight font-['Roboto_Slab']">{{ $competency->name }}</h2>
            </header>

            @if($competency->description)
            <p class="text-lg text-gray-600 mb-6 leading-relaxed">{{ $competency->description }}</p>
            @endif

            @if($competency->content)
            <div class="prose max-w-none text-gray-700">
                {!! $competency->content !!}
            </div>
            @endif

            <div class="mt-10">
                <a href="{{ route('competencies.index') }}" class="inline-flex items-center gap-2 text-primary font-semibold hover:underline text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Kembali ke Kompetensi Keahlian
                </a>
            </div>
        </article>

    </div>
</main>

{{-- Section Partner --}}
@if($partners->count())
<section class="bg-white py-12 border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex flex-wrap justify-center items-center gap-8 md:gap-12 opacity-80">
            @foreach($partners as $partner)
                @if($partner->url)
                    <a href="{{ $partner->url }}" target="_blank" rel="noopener">
                        <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}" class="h-16 object-contain">
                    </a>
                @else
                    <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}" class="h-16 object-contain">
                @endif
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
