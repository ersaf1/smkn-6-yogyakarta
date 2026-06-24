@extends('layouts.app')

@section('content')
{{-- Banner --}}
<div class="relative h-64 md:h-80 flex items-center justify-center text-white"
    style="background-image: url('{{ Storage::url('images/banner.jpg') }}'); background-size: cover; background-position: center;">
    <div class="absolute inset-0 bg-black/50"></div>
    <div class="relative z-10 container mx-auto px-4 py-10">
        <h1 class="text-2xl font-bold font-['Roboto_Slab']">Prestasi</h1>
        <p class="text-white/70 mt-1 text-sm">
            <a href="{{ route('home') }}" class="breadcrumb-link">Home</a>
            <span class="mx-1">/</span>
            Prestasi
        </p>
    </div>
</div>

<div class="container mx-auto px-4 py-10">
    @if($achievements->count() > 0)
    <div class="max-w-4xl">
        <h4 class="font-bold text-gray-700 text-lg mb-6 font-['Roboto_Slab']">PRESTASI YANG DIRAIH PESERTA DIDIK</h4>
        <div class="space-y-4">
            @foreach($achievements->groupBy('level') as $level => $items)
            <div class="mb-6">
                <h5 class="font-bold text-dark mb-3 text-base uppercase tracking-wide font-['Roboto_Slab']">{{ $level }}</h5>
                <ul class="list-disc pl-5 space-y-1">
                    @foreach($items as $achievement)
                    <li class="text-gray-700 text-sm leading-relaxed">
                        <span class="font-medium">{{ $achievement->title }}</span>
                        @if($achievement->year) <span class="text-gray-400">({{ $achievement->year }})</span> @endif
                        @if($achievement->description)
                        <p class="text-gray-500 text-xs mt-0.5 ml-1">{{ $achievement->description }}</p>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
    </div>
    @else
    <div class="text-center py-16 text-gray-400">Belum ada data prestasi.</div>
    @endif
</div>
@endsection
