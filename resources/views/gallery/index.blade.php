@extends('layouts.app')

@section('content')
{{-- Banner --}}
<div class="relative h-64 md:h-80 flex items-center justify-center text-white"
    style="background-image: url('{{ Storage::url('images/banner.jpg') }}'); background-size: cover; background-position: center;">
    <div class="absolute inset-0 bg-black/50"></div>
    <div class="relative z-10 container mx-auto px-4 py-10">
        <h1 class="text-2xl font-bold font-['Roboto_Slab']">Galeri Foto</h1>
        <p class="text-white/70 mt-1 text-sm">
            <a href="{{ route('home') }}" class="breadcrumb-link">Home</a>
            <span class="mx-1">/</span>
            Galeri Foto
        </p>
    </div>
</div>

<div class="container mx-auto px-4 py-10">
    @if($galleries->count() > 0)
        @foreach($galleries->groupBy('category.name') as $categoryName => $items)
        <h2 class="text-xl font-bold text-dark mb-4 font-['Roboto_Slab']">{{ $categoryName ?? 'Galeri' }}</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mb-10">
            @foreach($items as $photo)
            <div class="overflow-hidden rounded-lg group cursor-pointer"
                 x-data
                 @click="$dispatch('open-lightbox', { src: '{{ $photo->image ? Storage::url($photo->image) : asset('images/slider/gallery1.webp') }}', alt: '{{ addslashes($photo->title) }}' })">
                @if($photo->image)
                <img src="{{ Storage::url($photo->image) }}" alt="{{ $photo->title }}"
                     class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500">
                @else
                <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400 text-sm">
                    {{ $photo->title }}
                </div>
                @endif
            </div>
            @endforeach
        </div>
        @endforeach
    @else
    <div class="text-center py-16 text-gray-400">Belum ada foto galeri.</div>
    @endif
</div>

{{-- Lightbox --}}
<div x-data="{ open: false, src: '', alt: '' }"
     @open-lightbox.window="open = true; src = $event.detail.src; alt = $event.detail.alt"
     x-show="open" x-cloak
     class="fixed inset-0 z-50 bg-black/80 flex items-center justify-center p-4"
     @click.self="open = false">
    <div class="relative max-w-4xl w-full">
        <button @click="open = false" class="absolute -top-10 right-0 text-white text-2xl hover:text-primary">&times;</button>
        <img :src="src" :alt="alt" class="w-full h-auto rounded-lg shadow-2xl">
    </div>
</div>
@endsection
