<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGAP | Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-gray-100 to-indigo-50">

<div class="min-h-screen flex items-center justify-center px-6">

    <div class="w-full max-w-5xl grid lg:grid-cols-2 bg-white rounded-2xl shadow-xl overflow-hidden">

        <!-- KIRI (Branding) -->
        <div class="bg-indigo-600 flex flex-col justify-center p-12 text-white relative">

            <div class="absolute top-6 left-6 text-sm opacity-70">
                SIGAP • Inventaris Perangkat
            </div>

            <h1 class="text-5xl font-extrabold mb-4">SIGAP</h1>

            <p class="text-lg opacity-90 leading-relaxed">
                <span class="font-semibold">S</span>istem  
                <span class="font-semibold">I</span>dentifikasi dan  
                <span class="font-semibold">P</span>engawasan  
                <span class="font-semibold">A</span>set  
                <span class="font-semibold">P</span>erangkat.
            </p>

            <div class="mt-8 text-sm opacity-80">
                Kelola, pantau, dan amankan perangkat secara terstruktur.
            </div>
        </div>

        <!-- KANAN (Form Login) -->
        <div class="flex items-center justify-center p-12 bg-white">
            <div class="w-full max-w-md">

                <h2 class="text-2xl font-bold text-gray-800 mb-2">
                    Masuk ke SIGAP
                </h2>
                <p class="text-gray-500 mb-6">
                    Gunakan email dan password yang terdaftar.
                </p>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" value="Email" />

                        <x-text-input 
                            id="email"
                            class="block mt-1 w-full rounded-xl border-gray-300 focus:ring-indigo-500 focus:border-indigo-500"
                            type="email"
                            name="email"
                            required
                            autofocus
                            placeholder="nama@email.com"
                        />

                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" value="Password" />

                        <x-text-input 
                            id="password"
                            class="block mt-1 w-full rounded-xl border-gray-300 focus:ring-indigo-500 focus:border-indigo-500"
                            type="password"
                            name="password"
                            required
                            placeholder="••••••••"
                        />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember & Forgot -->
                    <div class="flex items-center justify-between mt-4">
                        <label class="inline-flex items-center">
                            <input 
                                type="checkbox"
                                name="remember"
                                class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                            >
                            <span class="ms-2 text-sm text-gray-600">Ingat saya</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" 
                               class="text-sm text-indigo-600 hover:underline">
                                Lupa password?
                            </a>
                        @endif
                    </div>

                    <!-- Tombol Login -->
                    <div class="mt-6">
                        <x-primary-button 
                            class="w-full justify-center py-3 rounded-xl text-lg bg-indigo-600 hover:bg-indigo-700 transition">
                            Masuk
                        </x-primary-button>
                    </div>
                </form>

                <p class="text-center text-sm text-gray-500 mt-6">
                    © {{ date('Y') }} SIGAP • Inventaris Perangkat
                </p>

            </div>
        </div>
    </div>
</div>

</body>
</html>
