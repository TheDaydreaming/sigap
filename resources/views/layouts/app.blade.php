<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SIGAP') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-[#E0E2E3]">

<div class="min-h-screen flex flex-col" x-data="{ sidebarOpen: true }">

<!-- ================= NAVBAR (UPDATED) ================= -->
<header class="bg-[#07213D] border-b border-[#0A2F52] shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">

            <!-- LOGO -->
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-[#EEBF63] text-[#07213D] flex items-center justify-center rounded-lg font-bold">
                    S
                </div>
                <span class="font-bold text-lg text-white tracking-wide">
                    SIGAP
                </span>
            </div>

            <!-- PROFILE DROPDOWN -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open"
                    class="flex items-center gap-3 focus:outline-none 
                           bg-white/10 backdrop-blur-md border border-white/20
                           hover:bg-white/20 px-3 py-2 rounded-lg transition-all">

                    <div class="w-8 h-8 rounded-full bg-[#EEBF63] flex items-center justify-center text-sm font-bold text-[#07213D]">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>

                    <span class="text-white font-medium">
                        {{ auth()->user()->name }}
                    </span>

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="open" @click.away="open = false"
                     class="absolute right-0 mt-2 w-44 bg-white/90 backdrop-blur-md 
                            border border-white/20 rounded-xl shadow-lg overflow-hidden">

                    <a href="{{ route('profile.edit') }}"
                       class="block px-4 py-2.5 hover:bg-gray-100 text-gray-700">
                        Profile
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="w-full text-left px-4 py-2.5 text-red-600 hover:bg-red-50">
                            Logout
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</header>

<div class="flex flex-1">

<!-- ============== SIDEBAR (GLASS + ACTIVE STRIP) ============== -->
<aside :class="sidebarOpen ? 'w-64' : 'w-20'"
       class="bg-[#07213D] p-4 flex flex-col gap-3 transition-all duration-400 ease-in-out">

    <!-- HEADER SIDEBAR -->
    <div class="flex items-center justify-between mb-2">
        <h3 x-show="sidebarOpen"
            class="font-semibold text-[#EEBF63] tracking-wide transition-opacity">
            Menu
        </h3>

        <button @click="sidebarOpen = !sidebarOpen"
                class="p-1.5 rounded-lg hover:bg-[#0A2F52] transition">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="h-5 w-5 text-[#EEBF63]"
                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
            </svg>
        </button>
    </div>

    @php
    $menus = [
        ['url' => 'dashboard', 'label' => 'Dashboard', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
        ['url' => 'devices/create', 'label' => 'Input Data', 'icon' => 'M12 4v16m8-8H4'],
        ['url' => 'devices', 'label' => 'List Data', 'icon' => 'M4 6h16M4 12h16M4 18h16'],
        ['url' => 'devices/qr', 'label' => 'Generate QR', 'icon' => 'M3 7v4h4V7H3zm0 10h4v-4H3v4zM13 7v4h4V7h-4zm0 10h4v-4h-4v4z']
    ];
@endphp

@foreach ($menus as $menu)
@php
    // ✅ ACTIVE LOGIC YANG BENAR (TIDAK SALING TABRAK)
    $isActive = request()->is($menu['url']) ||
                (Str::contains($menu['url'], '/') && request()->is($menu['url'].'/*'));
@endphp

<div class="relative group">

    <a href="/{{ $menu['url'] }}"
       class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-all
              {{ $isActive ? 'bg-white/10' : '' }}
              hover:bg-white/10 hover:backdrop-blur-md hover:shadow-lg
              text-[#E0E2E3] relative z-10">

        <svg xmlns="http://www.w3.org/2000/svg"
             class="h-6 w-6 text-[#EEBF63] min-w-[24px]"
             fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="{{ $menu['icon'] }}" />
        </svg>

        <span x-show="sidebarOpen" class="whitespace-nowrap">
            {{ $menu['label'] }}
        </span>
    </a>

    <!-- TOOLTIP (LEBIH RAPI, TIDAK NUTUPI ITEM) -->
    <div x-show="!sidebarOpen"
         class="absolute left-full ml-3 top-1/2 -translate-y-1/2
                bg-[#0A2F52]/95 backdrop-blur-md text-[#E0E2E3]
                px-3 py-1.5 rounded-lg text-sm
                opacity-0 group-hover:opacity-100
                transform translate-x-2 group-hover:translate-x-0
                transition-all duration-300 shadow-lg
                z-50 pointer-events-none">
        {{ $menu['label'] }}
    </div>
</div>
@endforeach


    <div class="mt-auto text-xs text-[#E0E2E3] text-center">
        SIGAP © {{ date('Y') }}
    </div>

</aside>

<!-- ============== KONTEN UTAMA ============== -->
<main class="flex-1 p-6">
    <div class="max-w-7xl mx-auto">
        {{ $slot }}
    </div>
</main>

</div>
</div>
</body>
</html>
