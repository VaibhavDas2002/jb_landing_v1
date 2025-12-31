@php
    $menuPath = storage_path('app/menu/dashboard/menu.json');
    $menuData = json_decode(file_get_contents($menuPath), true);
    $sidebar = $menuData['sidebar'];
@endphp


<div id="application-sidebar"
    class="sidebar hs-overlay [--auto-close:lg] hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform fixed top-0 start-0 bottom-0 z-[60] w-64 border-e border-gray-700 pt-7 pb-10 overflow-y-auto lg:block lg:translate-x-0 lg:end-auto lg:bottom-0">

    <!-- Logo Section -->
    <div class="px-6 mb-8">
        <div class="flex items-center gap-3">
            <div class="w-12 h-12 rounded-xl flex items-center justify-center shadow-lg">
                <img src="{{ asset('images/biswo_logo.png') }}" alt="Logo" class="w-12 h-12">
            </div>
            <div>
                <h1 class="text-lg font-bold text-white">{{ $sidebar['title'] }}</h1>
                <p class="text-xs text-gray-400">{{ $sidebar['subtitle'] }}</p>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="px-4 w-full flex flex-col">
        <ul class="space-y-2 hs-accordion-group" data-hs-accordion-always-open>

            @foreach ($sidebar['menus'] as $item)

                {{-- SINGLE MENU --}}
                @if ($item['type'] === 'single')
                    <li>
                        <a href="{{ $item['route'] }}"
                            class="sidebar-link flex items-center gap-x-3 py-3 px-4 text-sm text-gray-300 rounded-lg hover:bg-gray-800">
                            <i class="{{ $item['icon'] }} w-5"></i>
                            <span>{{ $item['label'] }}</span>

                            @if (!empty($item['badge']))
                                <span class="ml-auto bg-purple-500 text-white text-xs px-2 py-0.5 rounded-full">
                                    {{ $item['badge'] }}
                                </span>
                            @endif
                        </a>
                    </li>
                @endif

                {{-- PARENT MENU (SCHEMES) --}}
                @if ($item['type'] === 'parent' && !empty($item['children']))
                    {{-- 1. Ensure the ID on the container is unique --}}
                    <li class="hs-accordion" id="accordion-{{ $item['key'] }}">
                        <button type="button"
                            class="hs-accordion-toggle w-full flex items-center gap-x-3 py-3 px-4 text-sm text-gray-300 rounded-lg hover:bg-gray-800 hs-accordion-active:bg-gray-800 hs-accordion-active:text-white"
                            aria-expanded="false" aria-controls="content-{{ $item['key'] }}"> {{-- 2. This must match the div ID
                            below --}}

                            <i class="{{ $item['icon'] }} w-5"></i>
                            <span>{{ $item['label'] }}</span>

                            <span class="ml-auto flex items-center gap-x-2">
                                @if (!empty($item['badge']))
                                    <span class="bg-purple-500 text-white text-xs px-2 py-0.5 rounded-full">
                                        {{ $item['badge'] }}
                                    </span>
                                @endif

                                <svg class="hs-accordion-active:rotate-180 size-4 transition-transform text-gray-400"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m6 9 6 6 6-6" />
                                </svg>
                            </span>
                        </button>

                        {{-- 3. The content div must have 'overflow-hidden' and 'hidden' by default --}}
                        <div id="content-{{ $item['key'] }}"
                            class="hs-accordion-content w-full overflow-hidden hidden transition-[height] duration-300"
                            role="region" aria-labelledby="accordion-{{ $item['key'] }}">
                            <ul class="pt-2 ps-8 space-y-1 text-sm">
                                @foreach ($item['children'] as $child)
                                    <li>
                                        <a href="{{ $child['route'] }}"
                                            class="block py-2 px-3 text-gray-400 rounded-lg hover:bg-gray-800 hover:text-white">
                                            {{ $child['label'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                @endif






            @endforeach

        </ul>

        <!-- Divider -->
        <div class="my-6 border-t border-gray-700"></div>

        <!-- Categories -->
        <div class="px-2">
            <h3 class="text-xs font-semibold text-gray-500 uppercase mb-3">Categories</h3>
            <ul class="space-y-2">
                @foreach ($sidebar['categories'] as $cat)
                    <li>
                        <a href="#"
                            class="flex items-center gap-x-3 py-2 px-3 text-sm text-gray-300 rounded-lg hover:bg-gray-800">
                            <div class="w-8 h-8 bg-{{ $cat['color'] }}-500/20 rounded-lg flex items-center justify-center">
                                <i class="{{ $cat['icon'] }} text-{{ $cat['color'] }}-400 text-sm"></i>
                            </div>
                            <span>{{ $cat['label'] }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

    </nav>
</div>