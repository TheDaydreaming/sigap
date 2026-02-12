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
<body class="font-sans antialiased bg-gray-100">

<div class="min-h-screen grid lg:grid-cols-2">

    <!-- LEFT SIDE (BRANDING) -->
    <div class="hidden lg:flex flex-col justify-center px-16 bg-gradient-to-br from-indigo-600 to-indigo-800 text-white">
        <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 bg-white text-indigo-700 flex items-center justify-center rounded-xl font-bold text-lg">
                S
            </div>
            <span class="text-2xl font-bold tracking-wide">SIGAP</span>
        </div>

        <h1 class="text-3xl font-bold leading-tight mb-4">
            Sistem Integrasi & <br>
            Pengelolaan Aset Perangkat
        </h1>

        <p class="text-indigo-100 max-w-md">
            Kelola perangkat, generate QR, dan pantau data aset secara lebih terstruktur, aman, dan modern.
        </p>
    </div>

    <!-- RIGHT SIDE (FORM AREA) -->
    <div class="flex flex-col justify-center items-center px-6 py-12">
        <div class="w-full max-w-md">

            <!-- LOGO MOBILE (HANYA TAMPIL DI HP) -->
            <div class="lg:hidden flex justify-center mb-6">
                <div class="w-12 h-12 bg-indigo-600 text-white flex items-center justify-center rounded-xl font-bold text-lg">
                    S
                </div>
            </div>

            <!-- CARD FORM -->
            <div class="bg-white shadow-xl rounded-2xl p-8 border border-gray-100">
                {{ $slot }}
            </div>

            <div class="text-center text-sm text-gray-500 mt-6">
                SIGAP © {{ date('Y') }}
            </div>
        </div>
    </div>

</div>

</body>
</html>
