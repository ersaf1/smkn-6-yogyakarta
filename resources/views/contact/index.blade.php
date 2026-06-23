@extends('layouts.app')

@section('content')
<div class="bg-primary text-white py-12">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold">Hubungi Kami</h1>
        <p class="text-white/70 mt-2"><a href="{{ route('home') }}" class="hover:underline">Home</a> / Hubungi Kami</p>
    </div>
</div>

<div class="container mx-auto px-4 py-12">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
        <!-- Contact Info -->
        <div>
            <h2 class="text-2xl font-bold text-primary mb-6">Informasi Kontak</h2>
            <div class="space-y-6">
                <div>
                    <h3 class="font-semibold text-gray-800 mb-2">Alamat</h3>
                    <p class="text-gray-600">{{ $address }}</p>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-800 mb-2">Kontak</h3>
                    <p class="text-gray-600">Telefon: {{ $phone }}</p>
                    <p class="text-gray-600">Email: {{ $email }}</p>
                    @if($email2)
                        <p class="text-gray-600">Email: {{ $email2 }}</p>
                    @endif
                </div>
                <div>
                    <h3 class="font-semibold text-gray-800 mb-2">Jam Kerja</h3>
                    <p class="text-gray-600">{!! nl2br(e($workHours)) !!}</p>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div>
            <h2 class="text-2xl font-bold text-primary mb-6">Kirim Pesan</h2>
            
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary @error('name') border-red-500 @enderror">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Telepon</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary">
                </div>
                <div>
                    <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Subjek</label>
                    <input type="text" name="subject" id="subject" value="{{ old('subject') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary">
                </div>
                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Pesan</label>
                    <textarea name="message" id="message" rows="5" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>
                    @error('message')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="w-full bg-accent text-white py-3 rounded-lg font-semibold hover:bg-accent/90 transition-colors">
                    Kirim Pesan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection








