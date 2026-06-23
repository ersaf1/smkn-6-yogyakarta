@extends('layouts.app')

@section('content')
<div class="bg-primary text-white py-12">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold">Guru & Karyawan</h1>
        <p class="text-white/70 mt-2"><a href="{{ route('home') }}" class="hover:underline">Home</a> / Guru & Karyawan</p>
    </div>
</div>

<div class="container mx-auto px-4 py-12">
    @if($teachers->count() > 0)
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($teachers as $teacher)
            <div class="bg-white rounded-lg shadow-md overflow-hidden text-center p-6 hover:shadow-lg transition-shadow">
                @if($teacher->photo)
                    <img src="{{ Storage::url($teacher->photo) }}" alt="{{ $teacher->name }}" class="w-32 h-32 object-cover rounded-full mx-auto mb-4">
                @else
                    <div class="w-32 h-32 bg-gray-200 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                @endif
                <h3 class="font-bold text-gray-800">{{ $teacher->name }}</h3>
                @if($teacher->position)
                    <p class="text-sm text-gray-600">{{ $teacher->position }}</p>
                @endif
                @if($teacher->department)
                    <p class="text-xs text-gray-500 mt-1">{{ $teacher->department }}</p>
                @endif
            </div>
        @endforeach
    </div>
    @else
    <div class="text-center py-12 text-gray-500">
        <p>Belum ada data guru dan karyawan.</p>
    </div>
    @endif
</div>
@endsection








