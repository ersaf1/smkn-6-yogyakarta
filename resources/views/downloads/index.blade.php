@extends('layouts.app')

@section('content')
<div class="bg-primary text-white py-12">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold">Download</h1>
        <p class="text-white/70 mt-2"><a href="{{ route('home') }}" class="hover:underline">Home</a> / Download</p>
    </div>
</div>

<div class="container mx-auto px-4 py-12">
    @if($downloads->count() > 0)
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="divide-y divide-gray-200">
            @foreach($downloads as $download)
                <div class="flex items-center justify-between p-6 hover:bg-gray-50 transition-colors">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800">{{ $download->title }}</h3>
                            @if($download->description)
                                <p class="text-sm text-gray-600">{{ $download->description }}</p>
                            @endif
                            <p class="text-xs text-gray-500 mt-1">{{ $download->download_count }} unduhan</p>
                        </div>
                    </div>
                    <a href="{{ route('downloads.download', $download) }}" class="bg-accent text-white px-6 py-2 rounded-lg hover:bg-accent/90 transition-colors text-sm font-medium">
                        Download
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    @else
    <div class="text-center py-12 text-gray-500">
        <p>Belum ada file download.</p>
    </div>
    @endif
</div>
@endsection








