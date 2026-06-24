@php
    use App\Models\Setting;
    
    $siteName    = Setting::get('site_name', 'SMK Negeri 6 Yogyakarta');
    $logo        = Setting::get('logo', '');
    $address     = Setting::get('address', 'Jl. Kenari No.4, Semaki, Kec. Umbulharjo, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55166');
    $phone       = Setting::get('phone', '0274 512251');
    $instagram   = Setting::get('instagram', 'https://www.instagram.com/smkn6yogyakarta');
    $youtube     = Setting::get('youtube', 'https://youtube.com/@smkn6yogyakartaofficial');
    $schoolDesc  = Setting::get('school_description', 'Sekolah Menengah Kejuruan Negeri 6 Yogyakarta atau lebih dikenal dengan nama "Young Entrepreneur School" adalah sekolah unggulan yang berfokus pada industri kreatif dan jasa.');
@endphp

<footer class="bg-footer-dark text-gray-400 py-16">
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-16">
        {{-- School Intro --}}
        <div>
            @if($logo)
                <img src="{{ Storage::url($logo) }}" alt="{{ $siteName }}" class="h-16 mb-6 brightness-0 invert opacity-80">
            @else
                <div class="flex items-center gap-3 mb-6">
                    <div class="h-12 w-12 bg-primary rounded-full flex items-center justify-center text-white font-bold text-xl">6</div>
                    <span class="text-white font-bold text-sm">{{ $siteName }}</span>
                </div>
            @endif
            <p class="text-sm leading-relaxed mb-6">{{ $schoolDesc }}</p>
            <div class="flex space-x-4">
                @if($instagram)
                <a href="{{ $instagram }}" target="_blank" rel="noopener" aria-label="Instagram"
                   class="bg-zinc-800 p-2 rounded-full hover:bg-primary hover:text-white transition">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.332 3.608 1.308.975.975 1.247 2.242 1.308 3.607.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.061 1.365-.333 2.632-1.308 3.607-.975.975-2.242 1.247-3.607 1.308-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.366-.062-2.633-.332-3.608-1.308-.975-.975-1.247-2.242-1.308-3.607-.058-1.266-.07-1.646-.07-4.85s.012-3.584.07-4.85c.062-1.366.332-2.633 1.308-3.608.975-.975 2.242-1.247 3.607-1.308 1.266-.058 1.646-.07 4.85-.07m0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                    </svg>
                </a>
                @endif
                @if($youtube)
                <a href="{{ $youtube }}" target="_blank" rel="noopener" aria-label="YouTube"
                   class="bg-zinc-800 p-2 rounded-full hover:bg-primary hover:text-white transition">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
                    </svg>
                </a>
                @endif
            </div>
        </div>

        {{-- Address --}}
        <div class="space-y-6">
            <h4 class="text-white font-bold uppercase text-sm border-b border-zinc-800 pb-2">Lokasi Kami</h4>
            <ul class="space-y-4 text-sm">
                <li class="flex items-start">
                    <svg class="w-5 h-5 mr-3 text-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <span>{{ $address }}</span>
                </li>
                <li class="flex items-center">
                    <svg class="w-5 h-5 mr-3 text-primary flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    <a href="tel:{{ preg_replace('/[^0-9+]/', '', $phone) }}" class="hover:text-primary transition-colors">{{ $phone }}</a>
                </li>
            </ul>
        </div>

        {{-- Quick Links --}}
        <div class="space-y-6">
            <h4 class="text-white font-bold uppercase text-sm border-b border-zinc-800 pb-2">Tautan Penting</h4>
            <div class="grid grid-cols-2 gap-2 text-sm">
                <a href="{{ route('home') }}" class="hover:text-white transition">Profil Sekolah</a>
                <a href="#" class="hover:text-white transition">Dapodik</a>
                <a href="#" class="hover:text-white transition">Erapor</a>
                <a href="{{ route('gallery.index') }}" class="hover:text-white transition">Galeri</a>
                <a href="{{ route('extracurriculars.index') }}" class="hover:text-white transition">Ekstrakulikuler</a>
                <a href="#" class="hover:text-white transition">BKK</a>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 mt-16 pt-8 border-t border-zinc-800 text-center text-xs">
        <p>Copyright &copy; <span class="text-white">{{ $siteName }}</span>. All Rights Reserved.</p>
    </div>
</footer>
