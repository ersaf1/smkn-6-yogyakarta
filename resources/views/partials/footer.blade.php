@php
    use App\Models\Partner;
    use App\Models\Setting;
    
    $partners = Partner::where('is_active', true)->orderBy('order')->get();
    $siteName = Setting::get('site_name', 'SMK Negeri 6 Yogyakarta');
    $logo = Setting::get('logo', '');
    $address = Setting::get('address', 'Jl. Kenari No.4, Semaki, Kec. Umbulharjo, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55166');
    $phone = Setting::get('phone', '0274 512251');
    $email = Setting::get('email', 'smkn6yk@gmail.com');
    $instagram = Setting::get('instagram', 'https://www.instagram.com/smkn6yogyakarta');
    $youtube = Setting::get('youtube', 'https://youtube.com/@smkn6yogyakartaofficial');
@endphp

<footer class="bg-primary text-white">
    <!-- Partners Section -->
    @if($partners->count() > 0)
    <div class="bg-white py-8">
        <div class="container mx-auto px-4">
            <h3 class="text-center text-gray-800 font-bold text-lg mb-6">Mitra Kerja</h3>
            <div class="flex flex-wrap justify-center items-center gap-8">
                @foreach($partners as $partner)
                    <div class="flex-shrink-0">
                        @if($partner->url)
                            <a href="{{ $partner->url }}" target="_blank">
                                <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}" class="h-12 grayscale hover:grayscale-0 transition-all">
                            </a>
                        @else
                            <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}" class="h-12 grayscale hover:grayscale-0 transition-all">
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    <!-- Footer Content -->
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- School Info -->
            <div>
                <div class="flex items-center gap-3 mb-4">
                    @if($logo)
                        <img src="{{ Storage::url($logo) }}" alt="{{ $siteName }}" class="h-16">
                    @else
                        <div class="h-16 w-16 bg-white rounded-full flex items-center justify-center text-primary font-bold text-2xl">6</div>
                    @endif
                    <div>
                        <h3 class="font-bold text-xl">{{ $siteName }}</h3>
                    </div>
                </div>
                <div class="space-y-3 text-sm text-blue-100">
                    <p class="flex items-start gap-2">
                        <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        {{ $address }}
                    </p>
                    <p class="flex items-center gap-2">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        ({{ $phone }})
                    </p>
                </div>

                <!-- Social Media -->
                <div class="flex gap-3 mt-6">
                    @if($instagram)
                        <a href="{{ $instagram }}" target="_blank" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-white/20 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                    @endif
                    @if($youtube)
                        <a href="{{ $youtube }}" target="_blank" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-white/20 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            </svg>
                        </a>
                    @endif
                </div>
            </div>

            <!-- Copyright -->
            <div class="flex items-end justify-end">
                <p class="text-sm text-white/70">
                    Copyright &copy; {{ date('Y') }} <a href="{{ route('home') }}" class="underline">{{ $siteName }}</a>
                </p>
            </div>
        </div>
    </div>
</footer>








