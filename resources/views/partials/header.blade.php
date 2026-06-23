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

<header class="bg-white shadow-sm sticky top-0 z-50">
    <!-- Top Bar (dark, kontak info) -->
    <div class="bg-dark text-white hidden md:block">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between py-1.5">
                <!-- Left: label + phone + email -->
                <div class="flex items-center gap-4 text-xs">
                    <span class="font-medium">Kontak: &nbsp;</span>
                    <span class="flex items-center gap-1.5">
                        <img src="https://test.resolusiindonesia.com/wp-content/uploads/2025/12/telephone_-1.png"
                             alt="" class="w-4 h-4 object-contain"
                             onerror="this.style.display='none'">
                        {{ $phone }}
                    </span>
                    <span class="flex items-center gap-1.5">
                        <img src="https://test.resolusiindonesia.com/wp-content/uploads/2025/12/email_-1.png"
                             alt="" class="w-4 h-4 object-contain"
                             onerror="this.style.display='none'">
                        {{ $email }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Nav -->
    <nav class="container mx-auto px-4" x-data="{ searchOpen: false }">
        <div class="flex items-center justify-between py-3">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-3 flex-shrink-0">
                @if($logo)
                    <img src="{{ Storage::url($logo) }}" alt="{{ $siteName }}" class="h-10 w-auto">
                @else
                    <div class="h-10 w-10 bg-primary rounded-full flex items-center justify-center text-white font-bold flex-shrink-0">6</div>
                    <span class="font-bold text-secondary text-sm leading-tight">{{ $siteName }}</span>
                @endif
            </a>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center gap-0">
                @foreach($menuItems as $item)
                    @if($item->children->count() > 0)
                        <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                            <button class="px-3 py-4 text-sm font-medium text-gray-700 hover:text-primary flex items-center gap-0.5 whitespace-nowrap transition-colors">
                                {{ $item->title }}
                                <svg class="w-3.5 h-3.5 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                            <div x-show="open" x-cloak
                                 x-transition:enter="transition ease-out duration-150"
                                 x-transition:enter-start="opacity-0 translate-y-1"
                                 x-transition:enter-end="opacity-100 translate-y-0"
                                 class="absolute left-0 top-full w-56 bg-white rounded-b-lg shadow-lg py-1 z-50 border-t-2 border-primary">
                                @foreach($item->children as $child)
                                    @if($child->children->count() > 0)
                                        <div class="relative" x-data="{ subOpen: false }" @mouseenter="subOpen = true" @mouseleave="subOpen = false">
                                            <a href="{{ $child->link }}" class="flex items-center justify-between px-4 py-2 text-sm text-gray-700 hover:bg-primary/5 hover:text-primary transition-colors">
                                                {{ $child->title }}
                                                <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                                </svg>
                                            </a>
                                            <div x-show="subOpen" x-cloak class="absolute left-full top-0 w-56 bg-white rounded-r-lg shadow-lg py-1 z-50 border-t-2 border-primary">
                                                @foreach($child->children as $subchild)
                                                    <a href="{{ $subchild->link }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary/5 hover:text-primary transition-colors" @if($subchild->open_new_tab) target="_blank" @endif>
                                                        {{ $subchild->title }}
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    @else
                                        <a href="{{ $child->link }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary/5 hover:text-primary transition-colors" @if($child->open_new_tab) target="_blank" @endif>
                                            {{ $child->title }}
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @else
                        <a href="{{ $item->link }}" class="px-3 py-4 text-sm font-medium text-gray-700 hover:text-primary whitespace-nowrap transition-colors" @if($item->open_new_tab) target="_blank" @endif>
                            {{ $item->title }}
                        </a>
                    @endif
                @endforeach

                <!-- Search -->
                <button @click="searchOpen = !searchOpen" class="ml-2 p-2 text-gray-500 hover:text-primary transition-colors" aria-label="Cari">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0"/>
                    </svg>
                </button>
            </div>

            <!-- Mobile Hamburger -->
            <button @click="$dispatch('toggle-mobile-menu')" class="lg:hidden p-2 text-gray-700" aria-label="Menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        <!-- Search Bar -->
        <div x-show="searchOpen" x-cloak
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-1"
             x-transition:enter-end="opacity-100 translate-y-0"
             class="hidden lg:block pb-3">
            <form action="{{ route('news.index') }}" method="GET" class="flex gap-2">
                <input type="text" name="search" placeholder="Cari..." autofocus
                       class="flex-1 border border-gray-200 rounded px-4 py-2 text-sm focus:outline-none focus:border-primary">
                <button type="submit" class="bg-primary text-white px-4 py-2 rounded text-sm hover:bg-primary-dark transition-colors">Cari</button>
            </form>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div x-data="{ open: false }" @toggle-mobile-menu.window="open = !open"
         x-show="open" x-cloak
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="lg:hidden bg-white border-t border-gray-100">
        <div class="container mx-auto px-4 py-2">
            @foreach($menuItems as $item)
                @if($item->children->count() > 0)
                    <div x-data="{ expanded: false }">
                        <button @click="expanded = !expanded"
                                class="w-full text-left px-3 py-3 text-sm font-medium text-gray-700 hover:text-primary flex items-center justify-between border-b border-gray-50 transition-colors">
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
                    <a href="{{ $item->link }}" class="block px-3 py-3 text-sm font-medium text-gray-700 hover:text-primary border-b border-gray-50 transition-colors" @if($item->open_new_tab) target="_blank" @endif>
                        {{ $item->title }}
                    </a>
                @endif
            @endforeach
        </div>
    </div>
</header>
