@extends('layouts.app')

@section('content')
{{-- Banner --}}
<div class="relative bg-secondary text-white overflow-hidden">
    <img src="{{ asset('images/banner.jpg') }}" alt="" class="absolute inset-0 w-full h-full object-cover opacity-30">
    <div class="relative container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold">{{ $teacher->name }}</h1>
        <p class="text-white/70 mt-1 text-sm">
            <a href="{{ route('home') }}" class="hover:underline">Home</a>
            <span class="mx-1">/</span>
            <a href="{{ route('teachers.index') }}" class="hover:underline">Guru &amp; Karyawan</a>
            <span class="mx-1">/</span>
            {{ $teacher->name }}
        </p>
    </div>
</div>

<div class="container mx-auto px-4 py-10">
    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded shadow-sm overflow-hidden">
            <div class="flex flex-col md:flex-row">
                <div class="flex-shrink-0 p-6 flex justify-center md:justify-start">
                    @if($teacher->photo)
                    <img src="{{ Storage::url($teacher->photo) }}" alt="{{ $teacher->name }}"
                         class="w-48 h-48 object-cover rounded shadow">
                    @else
                    <div class="w-48 h-48 bg-gray-100 rounded flex items-center justify-center">
                        <svg class="w-20 h-20 text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/>
                        </svg>
                    </div>
                    @endif
                </div>
                <div class="p-6 flex-1">
                    <h2 class="text-xl font-bold text-secondary mb-4">{{ $teacher->name }}</h2>
                    <div class="space-y-2 text-sm">
                        @if($teacher->nip)
                        <div class="flex gap-3">
                            <span class="text-gray-400 w-24 flex-shrink-0">NIP</span>
                            <span class="text-gray-700">{{ $teacher->nip }}</span>
                        </div>
                        @endif
                        @if($teacher->position)
                        <div class="flex gap-3">
                            <span class="text-gray-400 w-24 flex-shrink-0">Jabatan</span>
                            <span class="text-gray-700">{{ $teacher->position }}</span>
                        </div>
                        @endif
                        @if($teacher->department)
                        <div class="flex gap-3">
                            <span class="text-gray-400 w-24 flex-shrink-0">Bidang</span>
                            <span class="text-gray-700">{{ $teacher->department }}</span>
                        </div>
                        @endif
                        @if($teacher->status)
                        <div class="flex gap-3">
                            <span class="text-gray-400 w-24 flex-shrink-0">Status</span>
                            <span class="text-gray-700">{{ $teacher->status }}</span>
                        </div>
                        @endif
                        @if($teacher->email)
                        <div class="flex gap-3">
                            <span class="text-gray-400 w-24 flex-shrink-0">Email</span>
                            <a href="mailto:{{ $teacher->email }}" class="text-primary hover:underline">{{ $teacher->email }}</a>
                        </div>
                        @endif
                        @if($teacher->phone)
                        <div class="flex gap-3">
                            <span class="text-gray-400 w-24 flex-shrink-0">Telepon</span>
                            <span class="text-gray-700">{{ $teacher->phone }}</span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @if($teacher->bio)
            <div class="px-6 pb-6">
                <h3 class="font-bold text-secondary mb-3">Biodata</h3>
                <div class="prose max-w-none text-gray-700">{!! $teacher->bio !!}</div>
            </div>
            @endif
        </div>
        <div class="mt-6">
            <a href="{{ route('teachers.index') }}" class="inline-flex items-center gap-2 text-primary font-semibold hover:underline text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Kembali
            </a>
        </div>
    </div>
</div>
@endsection
