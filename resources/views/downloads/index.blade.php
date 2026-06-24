@extends('layouts.app')

@section('content')
{{-- Banner --}}
<div class="relative h-64 md:h-80 flex items-center justify-center text-white"
    style="background-image: url('{{ Storage::url('images/banner.jpg') }}'); background-size: cover; background-position: center;">
    <div class="absolute inset-0 bg-black/50"></div>
    <div class="relative z-10 container mx-auto px-4 py-10">
        <h1 class="text-2xl font-bold font-['Roboto_Slab']">Download</h1>
        <p class="text-white/70 mt-1 text-sm">
            <a href="{{ route('home') }}" class="breadcrumb-link">Home</a>
            <span class="mx-1">/</span>
            Download
        </p>
    </div>
</div>

<div class="container mx-auto px-4 py-10">
    @if($downloads->count() > 0)
    <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-100">
        <div class="divide-y divide-gray-100">
            @foreach($downloads as $download)
            <div class="flex items-center justify-between p-5 hover:bg-gray-50 transition-colors">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 bg-primary/10 rounded flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800 text-sm font-['Roboto_Slab']">{{ $download->title }}</h3>
                        @if($download->description)
                        <p class="text-xs text-gray-500 mt-0.5">{{ $download->description }}</p>
                        @endif
                    </div>
                </div>
                @if($download->file)
                <a href="{{ route('downloads.download', $download) }}"
                   class="flex-shrink-0 bg-primary text-white px-5 py-2 rounded text-sm font-medium hover:bg-primary-dark transition-colors">
                    Download
                </a>
                @endif
            </div>
            @endforeach
        </div>
    </div>
    @else
    <div class="text-center py-16 text-gray-400">Belum ada file untuk diunduh.</div>
    @endif
</div>
@endsection
