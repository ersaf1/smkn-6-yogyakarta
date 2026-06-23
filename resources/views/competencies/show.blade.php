@extends('layouts.app')

@section('content')
<div class="bg-primary text-white py-12">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold">{{ $competency->name }}</h1>
        <p class="text-white/70 mt-2">
            <a href="{{ route('home') }}" class="hover:underline">Home</a> / 
            <a href="{{ route('competencies.index') }}" class="hover:underline">Kompetensi Keahlian</a> / 
            {{ $competency->name }}
        </p>
    </div>
</div>

<div class="container mx-auto px-4 py-12">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            @if($competency->image)
                <img src="{{ Storage::url($competency->image) }}" alt="{{ $competency->name }}" class="w-full h-auto max-h-[400px] object-cover">
            @endif
            <div class="p-8">
                @if($competency->description)
                    <p class="text-lg text-gray-700 mb-6">{{ $competency->description }}</p>
                @endif
                @if($competency->content)
                    <div class="prose prose-lg max-w-none">
                        {!! $competency->content !!}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection








