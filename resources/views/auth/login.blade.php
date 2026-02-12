<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGAP | Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#E0E2E3]">

<div class="min-h-screen flex items-center justify-center px-6">

    <div class="w-full max-w-5xl grid lg:grid-cols-2 bg-white rounded-2xl shadow-xl overflow-hidden">

        <!-- =========================
             KIRI (BRANDING + PATTERN)
        ========================== -->
        <div class="bg-[#07213D] flex flex-col justify-center p-12 text-[#E0E2E3] relative overflow-hidden">

            <!-- PATTERN / ILUSTRASI HALUS -->
            <div class="absolute -top-20 -right-20 w-64 h-64 bg-[#EEBF63] opacity-10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 -left-10 w-48 h-48 bg-white opacity-5 rounded-full blur-2xl"></div>

            <div class="absolute top-6 left-6 text-sm opacity-70">
                SIGAP
            </div>

            <div class="flex items-center gap-3 mb-4">
                <div class="w-12 h-12 bg-[#EEBF63] text-[#07213D] flex items-center justify-center rounded-lg font-bold text-xl">
                    S
                </div>
                <h1 class="text-4xl font-extrabold text-[#EEBF63]">
                    SIGAP
                </h1>
            </div>

            <p class="text-lg opacity-90 leading-relaxed max-w-sm">
                Sistem Identifikasi dan Pengelolaan Perangkat.
            </p>

            <!-- DECORATIVE LINE -->
            <div class="mt-8 w-20 h-1 bg-[#EEBF63] rounded-full"></div>
        </div>

        <!-- =========================
             KANAN (FORM LOGIN)
        ========================== -->
        <div class="flex items-center justify-center p-12 bg-white">
            <div class="w-full max-w-md">

                <h2 class="text-2xl font-bold text-[#07213D] mb-2">
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
                            class="block mt-1 w-full rounded-xl border-gray-300 
                                   focus:ring-[#EEBF63] focus:border-[#EEBF63]
                                   transition-all duration-300"
                            type="email"
                            name="email"
                            required
                            autofocus
                            placeholder="nama@email.com"
                        />

                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password (DENGAN ICON MATA) -->
                    <div class="mt-4">
                        <x-input-label for="password" value="Password" />

                        <div class="relative">
                            <x-text-input 
                                id="password"
                                class="block mt-1 w-full rounded-xl border-gray-300 
                                       focus:ring-[#EEBF63] focus:border-[#EEBF63]
                                       transition-all duration-300 pr-10"
                                type="password"
                                name="password"
                                required
                                placeholder="••••••••"
                            />

                            <!-- Tombol Mata -->
                            <button 
                                type="button"
                                onclick="togglePassword()"
                                class="absolute inset-y-0 right-3 flex items-center text-gray-500 hover:text-[#07213D] transition"
                            >
                                <svg id="eye-open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>

                                <svg id="eye-closed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.964 9.964 0 011.563-3.029m5.858-.908A3 3 0 0115 12m4.122 4.122A9.964 9.964 0 0121.542 12c-1.274-4.057-5.064-7-9.542-7-1.042 0-2.052.135-3.008.388M3 3l18 18" />
                                </svg>
                            </button>
                        </div>

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Tombol Login -->
                    <div class="mt-6">
                        <x-primary-button 
                            class="w-full justify-center py-3 rounded-xl text-lg 
                                   bg-[#07213D] hover:bg-[#0A2F52]
                                   transform hover:scale-[1.02] 
                                   hover:shadow-lg
                                   transition-all duration-300">
                            Masuk
                        </x-primary-button>
                    </div>
                </form>

                <p class="text-center text-sm text-gray-500 mt-6">
                    © {{ date('Y') }} SIGAP
                </p>

            </div>
        </div>
    </div>
</div>

<!-- SCRIPT UNTUK TOGGLE PASSWORD -->
<script>
function togglePassword() {
    const passwordInput = document.getElementById("password");
    const eyeOpen = document.getElementById("eye-open");
    const eyeClosed = document.getElementById("eye-closed");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eyeOpen.classList.add("hidden");
        eyeClosed.classList.remove("hidden");
    } else {
        passwordInput.type = "password";
        eyeOpen.classList.remove("hidden");
        eyeClosed.classList.add("hidden");
    }
}
</script>

</body>
</html>
