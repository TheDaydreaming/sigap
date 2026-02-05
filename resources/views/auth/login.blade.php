<x-guest-layout>
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-100">

    <div class="w-full max-w-md">
        <div class="bg-white shadow-xl rounded-2xl p-8 border border-gray-100">

            <!-- LOGO / HEADER -->
            <div class="text-center mb-6">
                <div class="mx-auto w-16 h-16 bg-indigo-600 rounded-full flex items-center justify-center mb-3">
                    <span class="text-white font-bold text-2xl">S</span>
                </div>
                <h2 class="text-2xl font-bold text-gray-800">Selamat Datang</h2>
                <p class="text-sm text-gray-500 mt-1">
                    Silakan login untuk melanjutkan
                </p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input 
                        id="email"
                        class="block mt-1 w-full rounded-lg"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus
                        autocomplete="username"
                        placeholder="contoh@email.com"
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input 
                        id="password"
                        class="block mt-1 w-full rounded-lg"
                        type="password"
                        name="password"
                        required 
                        autocomplete="current-password"
                        placeholder="••••••••"
                    />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input 
                            id="remember_me" 
                            type="checkbox" 
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" 
                            name="remember"
                        >
                        <span class="ms-2 text-sm text-gray-600">Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a 
                            class="text-sm text-indigo-600 hover:text-indigo-800"
                            href="{{ route('password.request') }}"
                        >
                            Forgot password?
                        </a>
                    @endif
                </div>

                <!-- Login Button -->
                <div class="mt-6">
                    <x-primary-button class="w-full justify-center rounded-lg py-3">
                        Log in
                    </x-primary-button>
                </div>
            </form>

            <div class="text-center text-sm text-gray-500 mt-6">
                © {{ date('Y') }} SIGAP • Sistem Inventaris
            </div>

        </div>
    </div>

</div>
</x-guest-layout>
