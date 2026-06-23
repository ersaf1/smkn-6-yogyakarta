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

<header class="bg-white shadow-md sticky top-0 z-50">
    <!-- Top Bar -->
    <div class="bg-dark text-white py-2 hidden md:block">
        <div class="container mx-auto px-4 flex justify-between items-center text-sm">
            <div class="flex items-center gap-4">
                <span class="flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    {{ $phone }}
                </span>
                <span class="flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    {{ $email }}
                </span>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <nav class="container mx-auto px-4 py-3">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                @if($logo)
                    <img src="{{ Storage::url($logo) }}" alt="{{ $siteName }}" class="h-12">
                @else
                    <div class="h-12 w-12 bg-primary rounded-full flex items-center justify-center text-white font-bold text-lg">6</div>
                @endif
                <div>
                    <h1 class="font-bold text-primary text-lg leading-tight">{{ $siteName }}</h1>
                    <p class="text-xs text-gray-600">Sekolah Menengah Kejuruan</p>
                </div>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center gap-1">
                @foreach($menuItems as $item)
                    @if($item->children->count() > 0)
                        <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                            <button class="px-3 py-2 text-sm font-medium text-gray-700 hover:text-primary flex items-center gap-1">
                                {{ $item->title }}
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                            <div x-show="open" x-cloak class="absolute left-0 mt-0 w-56 bg-white rounded-b-lg shadow-lg py-2 z-50">
                                @foreach($item->children as $child)
                                    @if($child->children->count() > 0)
                                        <div class="relative" x-data="{ subOpen: false }" @mouseenter="subOpen = true" @mouseleave="subOpen = false">
                                            <a href="{{ $child->link }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary/5 hover:text-primary flex items-center justify-between">
                                                {{ $child->title }}
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                                </svg>
                                            </a>
                                            <div x-show="subOpen" x-cloak class="absolute left-full top-0 w-56 bg-white rounded-r-lg shadow-lg py-2 z-50">
                                                @foreach($child->children as $subchild)
                                                    <a href="{{ $subchild->link }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary/5 hover:text-primary" @if($subchild->open_new_tab) target="_blank" @endif>
                                                        {{ $subchild->title }}
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    @else
                                        <a href="{{ $child->link }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary/5 hover:text-primary" @if($child->open_new_tab) target="_blank" @endif>
                                            {{ $child->title }}
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @else
                        <a href="{{ $item->link }}" class="px-3 py-2 text-sm font-medium text-gray-700 hover:text-primary" @if($item->open_new_tab) target="_blank" @endif>
                            {{ $item->title }}
                        </a>
                    @endif
                @endforeach
            </div>

            <!-- Mobile Menu Button -->
            <button @click="$dispatch('toggle-mobile-menu')" class="lg:hidden p-2 text-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div x-data="{ open: false }" @toggle-mobile-menu.window="open = !open" x-show="open" x-cloak class="lg:hidden bg-white border-t">
        <div class="container mx-auto px-4 py-4">
            @foreach($menuItems as $item)
                @if($item->children->count() > 0)
                    <div x-data="{ expanded: false }">
                        <button @click="expanded = !expanded" class="w-full text-left px-3 py-2 text-sm font-medium text-gray-700 hover:text-primary flex items-center justify-between">
                            {{ $item->title }}
                            <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': expanded }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="expanded" x-cloak class="pl-4">
                            @foreach($item->children as $child)
                                @if($child->children->count() > 0)
                                    <div x-data="{ subExpanded: false }">
                                        <button @click="subExpanded = !subExpanded" class="w-full text-left px-3 py-2 text-sm text-gray-600 hover:text-primary flex items-center justify-between">
                                            {{ $child->title }}
                                            <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': subExpanded }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                            </svg>
                                        </button>
                                        <div x-show="subExpanded" x-cloak class="pl-4">
                                            @foreach($child->children as $subchild)
                                                <a href="{{ $subchild->link }}" class="block px-3 py-2 text-sm text-gray-500 hover:text-primary" @if($subchild->open_new_tab) target="_blank" @endif>
                                                    {{ $subchild->title }}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                @else
                                    <a href="{{ $child->link }}" class="block px-3 py-2 text-sm text-gray-600 hover:text-primary" @if($child->open_new_tab) target="_blank" @endif>
                                        {{ $child->title }}
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @else
                    <a href="{{ $item->link }}" class="block px-3 py-2 text-sm font-medium text-gray-700 hover:text-primary" @if($item->open_new_tab) target="_blank" @endif>
                        {{ $item->title }}
                    </a>
                @endif
            @endforeach
        </div>
    </div>
</header>








