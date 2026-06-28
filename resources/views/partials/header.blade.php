@php
    use App\Models\Menu;
    use App\Models\Setting;
    
    $mainMenu = Menu::where('slug', 'main-menu')->first();
    $menuItems = $mainMenu ? $mainMenu->items()->where('is_active', true)->get() : collect();
    $logo = Setting::get('logo', '');
    $siteName = Setting::get('site_name', 'SMK Negeri 6 Yogyakarta');
    $phone = Setting::get('phone', '0274 512251');
    $email = Setting::get('email', 'smkn6yk@gmail.com');
@endphp

<!-- Top Contact Bar -->
<div class="bg-dark text-white text-sm py-2 px-4 hidden md:block">
    <div class="max-w-[1400px] mx-auto flex items-center gap-6">
        <span class="text-gray-400">Kontak:</span>
        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $phone) }}" class="flex items-center gap-2 hover:text-primary transition-colors">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
            </svg>
            {{ $phone }}
        </a>
        <a href="mailto:{{ $email }}" class="flex items-center gap-2 hover:text-primary transition-colors">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            {{ $email }}
        </a>
    </div>
</div>

<!-- Main Header -->
<header class="w-full shadow-md sticky top-0 z-50" x-data="{ searchOpen: false, mobileOpen: false }">

    <!-- Navigation Bar -->
    <nav class="bg-primary w-full">
        <div class="max-w-[1400px] mx-auto px-4 flex items-center justify-between py-3">

            <!-- Logo -->
            <div class="flex-shrink-0">
                @if($logo)
                    <a href="{{ route('home') }}">
                        <img src="{{ Storage::url($logo) }}" alt="{{ $siteName }}" class="h-14 w-auto">
                    </a>
                @else
                    <a href="{{ route('home') }}" class="flex items-center gap-2">
                        <div class="h-10 w-10 bg-white rounded-full flex items-center justify-center text-primary font-bold">6</div>
                        <span class="font-bold text-white text-sm leading-tight">{{ $siteName }}</span>
                    </a>
                @endif
            </div>

            <!-- Desktop Menu -->
            <ul class="hidden lg:flex items-center gap-5 text-white ml-auto">
                @foreach($menuItems as $item)
                    @if($item->children->count() > 0)
                        <li class="relative group">
                            <button class="flex items-center text-[13px] font-bold uppercase tracking-wide hover:opacity-80 transition whitespace-nowrap py-1">
                                {{ $item->title }}
                                <svg class="w-3 h-3 ml-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                            <div class="absolute left-0 top-full mt-0 w-52 bg-white shadow-xl py-2 z-50 hidden group-hover:block border-t-2 border-primary">
                                @foreach($item->children as $child)
                                    @if($child->children->count() > 0)
                                        <div class="relative group/sub">
                                            <a href="{{ $child->link }}" class="flex items-center justify-between px-4 py-2 text-xs text-gray-700 hover:bg-primary/10 hover:text-primary transition normal-case" @if($child->open_new_tab) target="_blank" @endif>
                                                {{ $child->title }}
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                                </svg>
                                            </a>
                                            <div class="absolute left-full top-0 w-52 bg-white shadow-xl py-2 z-50 hidden group-hover/sub:block border-t-2 border-primary">
                                                @foreach($child->children as $subchild)
                                                    <a href="{{ $subchild->link }}" class="block px-4 py-2 text-xs text-gray-700 hover:bg-primary/10 hover:text-primary transition normal-case" @if($subchild->open_new_tab) target="_blank" @endif>
                                                        {{ $subchild->title }}
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    @else
                                        <a href="{{ $child->link }}" class="block px-4 py-2 text-xs text-gray-700 hover:bg-primary/10 hover:text-primary transition normal-case" @if($child->open_new_tab) target="_blank" @endif>
                                            {{ $child->title }}
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </li>
                    @else
                        <li>
                            <a href="{{ $item->link }}" class="text-[13px] font-bold uppercase tracking-wide hover:opacity-80 transition whitespace-nowrap" @if($item->open_new_tab) target="_blank" @endif>
                                {{ $item->title }}
                            </a>
                        </li>
                    @endif
                @endforeach
                <li>
                    <button @click="searchOpen = !searchOpen" class="ml-2 hover:opacity-70 transition">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </button>
                </li>
            </ul>

            <!-- Mobile Hamburger -->
            <button @click="mobileOpen = !mobileOpen" class="lg:hidden text-white p-2" aria-label="Menu">
                <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
                </svg>
            </button>
        </div>
    </nav>

    <!-- Search Bar -->
    <div x-show="searchOpen" x-cloak
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-1"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="bg-white border-b border-gray-200 px-4 py-3">
        <form action="{{ route('news.index') }}" method="GET" class="flex gap-2 max-w-md mx-auto">
            <input type="text" name="search" placeholder="Cari..." autofocus
                   class="flex-1 border border-gray-300 rounded px-4 py-2 text-sm focus:outline-none focus:border-primary">
            <button type="submit" class="bg-primary text-white px-4 py-2 rounded text-sm hover:bg-primary-dark transition-colors">Cari</button>
        </form>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileOpen" x-cloak
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="lg:hidden bg-white border-t border-gray-200">
        <div class="px-4 py-2">
            @foreach($menuItems as $item)
                @if($item->children->count() > 0)
                    <div x-data="{ expanded: false }">
                        <button @click="expanded = !expanded"
                                class="w-full text-left px-3 py-3 text-sm font-bold text-gray-700 hover:text-primary flex items-center justify-between border-b border-gray-100 transition-colors uppercase">
                            {{ $item->title }}
                            <svg class="w-4 h-4 transition-transform flex-shrink-0" :class="{ 'rotate-180': expanded }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="expanded" x-cloak class="pl-4 bg-gray-50">
                            @foreach($item->children as $child)
                                @if($child->children->count() > 0)
                                    <div x-data="{ subExpanded: false }">
                                        <button @click="subExpanded = !subExpanded"
                                                class="w-full text-left px-3 py-2.5 text-sm text-gray-600 hover:text-primary flex items-center justify-between border-b border-gray-100 transition-colors">
                                            {{ $child->title }}
                                            <svg class="w-3.5 h-3.5 transition-transform flex-shrink-0" :class="{ 'rotate-180': subExpanded }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                            </svg>
                                        </button>
                                        <div x-show="subExpanded" x-cloak class="pl-4">
                                            @foreach($child->children as $subchild)
                                                <a href="{{ $subchild->link }}" class="block px-3 py-2 text-sm text-gray-500 hover:text-primary border-b border-gray-100" @if($subchild->open_new_tab) target="_blank" @endif>
                                                    {{ $subchild->title }}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                @else
                                    <a href="{{ $child->link }}" class="block px-3 py-2.5 text-sm text-gray-600 hover:text-primary border-b border-gray-100 transition-colors" @if($child->open_new_tab) target="_blank" @endif>
                                        {{ $child->title }}
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @else
                    <a href="{{ $item->link }}" class="block px-3 py-3 text-sm font-bold text-gray-700 hover:text-primary border-b border-gray-100 transition-colors uppercase" @if($item->open_new_tab) target="_blank" @endif>
                        {{ $item->title }}
                    </a>
                @endif
            @endforeach
        </div>
    </div>

</header>
