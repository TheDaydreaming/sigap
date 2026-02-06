<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">

<div class="min-h-screen bg-gray-100">

    <!-- ✅ NAVBAR ATAS -->
    <div class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">

                <div class="font-bold text-lg">
                    SIGAP
                </div>

                <!-- DROPDOWN PROFILE -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center gap-2 focus:outline-none">
                        <!-- AVATAR KECIL -->
                        <div class="w-8 h-8 rounded-full bg-gray-300 flex items-center justify-center text-sm font-bold text-gray-700">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>

                        <span class="text-gray-700">
                            {{ auth()->user()->name }}
                        </span>

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- MENU DROPDOWN -->
                    <div x-show="open" @click.away="open = false"
                         class="absolute right-0 mt-2 w-40 bg-white border rounded shadow-md">
                        <a href="{{ route('profile.edit') }}"
                           class="block px-4 py-2 hover:bg-gray-100">
                            Profile
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                    class="w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="flex">
        <!-- ✅ SIDEBAR KIRI -->
        <div class="w-64 bg-white shadow p-5 min-h-screen">
            <h3 class="font-bold mb-4">Menu</h3>

            <a href="/dashboard" class="block p-2 hover:bg-gray-100">Dashboard</a>
            <a href="/devices/create" class="block p-2 hover:bg-gray-100">Input Data</a>
            <a href="/devices" class="block p-2 hover:bg-gray-100">Lihat Data</a>
            <a href="/devices/qr" class="block p-2 hover:bg-gray-100">Generate QR</a>
        </div>

        <!-- ✅ KONTEN UTAMA -->
        <div class="flex-1 p-6">
            {{ $slot }}
        </div>
    </div>

</div>

</body>
</html>
