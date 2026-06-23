@extends('layouts.app')

@section('content')
<div class="bg-primary text-white py-12">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold">Galeri Foto</h1>
        <p class="text-white/70 mt-2"><a href="{{ route('home') }}" class="hover:underline">Home</a> / Galeri Foto</p>
    </div>
</div>

<div class="container mx-auto px-4 py-12">
    <!-- Category Filter -->
    @if($categories->count() > 0)
    <div class="flex flex-wrap gap-2 mb-8">
        <a href="{{ route('gallery.index') }}" class="px-4 py-2 rounded-full text-sm font-medium {{ !request('category') ? 'bg-primary text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }} transition-colors">
            Semua
        </a>
        @foreach($categories as $category)
            <a href="{{ route('gallery.index', ['category' => $category->slug]) }}" class="px-4 py-2 rounded-full text-sm font-medium {{ request('category') === $category->slug ? 'bg-primary text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }} transition-colors">
                {{ $category->name }}
            </a>
        @endforeach
    </div>
    @endif

    <!-- Gallery Grid -->
    @if($galleries->count() > 0)
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach($galleries as $gallery)
            <div class="group relative overflow-hidden rounded-lg aspect-square cursor-pointer" x-data="{ open: false }" @click="open = true">
                <img src="{{ Storage::url($gallery->image) }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-all duration-300 flex items-end">
                    <div class="p-4 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        @if($gallery->category)
                            <p class="text-sm font-medium">{{ $gallery->category->name }}</p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $galleries->links() }}
    </div>
    @else
    <div class="text-center py-12 text-gray-500">
        <p>Belum ada foto.</p>
    </div>
    @endif
</div>
@endsection








