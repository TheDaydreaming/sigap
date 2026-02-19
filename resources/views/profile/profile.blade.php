<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h2 class="font-bold text-2xl text-[#07213D] leading-tight">
                    {{ __('Profile') }}
                </h2>
                <p class="text-gray-500 text-sm mt-1">Kelola informasi profil dan keamanan akun Anda</p>
            </div>
            <div class="h-1 w-16 mt-3 rounded-full bg-gradient-to-r from-[#07213D] to-[#EEBF63] md:hidden"></div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- ID CARD / COOL INFO -->
            <div class="relative overflow-hidden bg-gradient-to-br from-[#07213D] to-[#0A2E52] p-8 rounded-3xl shadow-xl text-white">
                 <!-- Background Elements -->
                 <div class="absolute top-0 right-0 -mt-10 -mr-10 w-64 h-64 bg-[#EEBF63] rounded-full blur-3xl opacity-10"></div>
                 <div class="absolute bottom-0 left-0 -mb-10 -ml-10 w-48 h-48 bg-blue-500 rounded-full blur-3xl opacity-10"></div>
                 
                 <div class="relative z-10 flex flex-col md:flex-row items-center gap-8">
                    <!-- Avatar -->
                    <div class="relative group">
                        <div class="absolute -inset-1 bg-gradient-to-r from-[#EEBF63] via-yellow-400 to-[#EEBF63] rounded-full blur opacity-25 group-hover:opacity-75 transition duration-1000 group-hover:duration-200"></div>
                        <div class="relative w-28 h-28 rounded-full bg-[#051829] flex items-center justify-center border-4 border-[#0A2E52] shadow-2xl">
                            <span class="text-4xl font-bold text-[#EEBF63]">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </span>
                        </div>
                        <!-- Status Dot -->
                        <div class="absolute bottom-1 right-1 w-6 h-6 bg-green-500 border-4 border-[#07213D] rounded-full" title="Online"></div>
                    </div>

                    <!-- Info -->
                    <div class="flex-1 text-center md:text-left">
                        <div class="flex flex-col md:flex-row md:items-center gap-2 mb-2 justify-center md:justify-start">
                            <h3 class="text-3xl font-bold tracking-tight">{{ $user->name }}</h3>
                            <span class="px-3 py-1 bg-[#EEBF63]/20 text-[#EEBF63] text-xs font-bold uppercase tracking-wider rounded-full border border-[#EEBF63]/20">
                                Verified Officer
                            </span>
                        </div>
                        
                        <p class="text-gray-400 text-sm mb-6 flex items-center justify-center md:justify-start gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            {{ $user->email }}
                        </p>

                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 border-t border-white/10 pt-6">
                            <div>
                                <span class="block text-xs text-gray-500 uppercase tracking-wider mb-1">ID Anggota</span>
                                <span class="font-mono text-[#EEBF63]">usr-{{ str_pad($user->id, 4, '0', STR_PAD_LEFT) }}</span>
                            </div>
                            <div>
                                <span class="block text-xs text-gray-500 uppercase tracking-wider mb-1">Bergabung</span>
                                <span class="font-medium text-white">{{ $user->created_at->format('d M Y') }}</span>
                            </div>
                            <div>
                                <span class="block text-xs text-gray-500 uppercase tracking-wider mb-1">Status</span>
                                <span class="flex items-center gap-1.5 font-medium text-green-400">
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-400 animate-pulse"></span>
                                    Active
                                </span>
                            </div>
                            <div>
                                <span class="block text-xs text-gray-500 uppercase tracking-wider mb-1">Peran</span>
                                <span class="font-medium text-white">Administrator</span> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-6 sm:p-8 bg-white shadow-xl sm:rounded-3xl border border-gray-100">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-bold text-[#07213D]">
                                {{ __('Informasi Profil') }}
                            </h2>
                    
                            <p class="mt-1 text-sm text-gray-500">
                                {{ __("Update informasi profil akun dan alamat email Anda.") }}
                            </p>
                        </header>
                    
                        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                            @csrf
                        </form>
                    
                        <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('patch')
                    
                            <div>
                                <x-input-label for="name" :value="__('Nama')" class="text-[#07213D]" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full rounded-xl border-gray-300 focus:border-[#EEBF63] focus:ring focus:ring-[#EEBF63]/20" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>
                    
                            <div>
                                <x-input-label for="email" :value="__('Email')" class="text-[#07213D]" />
                                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full rounded-xl border-gray-300 focus:border-[#EEBF63] focus:ring focus:ring-[#EEBF63]/20" :value="old('email', $user->email)" required autocomplete="username" />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    
                                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                    <div>
                                        <p class="text-sm mt-2 text-gray-800">
                                            {{ __('Alamat email Anda belum diverifikasi.') }}
                    
                                            <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                {{ __('Klik di sini untuk mengirim ulang email verifikasi.') }}
                                            </button>
                                        </p>
                    
                                        @if (session('status') === 'verification-link-sent')
                                            <p class="mt-2 font-medium text-sm text-green-600">
                                                {{ __('Link verifikasi baru telah dikirim ke alamat email Anda.') }}
                                            </p>
                                        @endif
                                    </div>
                                @endif
                            </div>
                    
                            <div class="flex items-center gap-4">
                                <x-primary-button class="bg-[#07213D] hover:bg-[#0A2F52] focus:bg-[#0A2F52] active:bg-[#051829] rounded-xl px-6 py-2.5">{{ __('Simpan') }}</x-primary-button>
                    
                                @if (session('status') === 'profile-updated')
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600"
                                    >{{ __('Tersimpan.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>
                </div>
            </div>

            <!-- Update Password -->
            <div class="p-6 sm:p-8 bg-white shadow-xl sm:rounded-3xl border border-gray-100">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-bold text-[#07213D]">
                                {{ __('Update Password') }}
                            </h2>
                    
                            <p class="mt-1 text-sm text-gray-500">
                                {{ __('Pastikan akun Anda menggunakan password yang panjang dan acak agar tetap aman.') }}
                            </p>
                        </header>
                    
                        <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('put')
                    
                            <div>
                                <x-input-label for="update_password_current_password" :value="__('Password Saat Ini')" class="text-[#07213D]" />
                                <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full rounded-xl border-gray-300 focus:border-[#EEBF63] focus:ring focus:ring-[#EEBF63]/20" autocomplete="current-password" />
                                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                            </div>
                    
                            <div>
                                <x-input-label for="update_password_password" :value="__('Password Baru')" class="text-[#07213D]" />
                                <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full rounded-xl border-gray-300 focus:border-[#EEBF63] focus:ring focus:ring-[#EEBF63]/20" autocomplete="new-password" />
                                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                            </div>
                    
                            <div>
                                <x-input-label for="update_password_password_confirmation" :value="__('Konfirmasi Password')" class="text-[#07213D]" />
                                <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full rounded-xl border-gray-300 focus:border-[#EEBF63] focus:ring focus:ring-[#EEBF63]/20" autocomplete="new-password" />
                                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                            </div>
                    
                            <div class="flex items-center gap-4">
                                <x-primary-button class="bg-[#07213D] hover:bg-[#0A2F52] focus:bg-[#0A2F52] active:bg-[#051829] rounded-xl px-6 py-2.5">{{ __('Simpan') }}</x-primary-button>
                    
                                @if (session('status') === 'password-updated')
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600"
                                    >{{ __('Tersimpan.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>
                </div>
            </div>

            <!-- Delete User -->
            <div class="p-6 sm:p-8 bg-white shadow-xl sm:rounded-3xl border border-gray-100">
                <div class="max-w-xl">
                    <section class="space-y-6">
                        <header>
                            <h2 class="text-lg font-bold text-red-600">
                                {{ __('Hapus Akun') }}
                            </h2>
                    
                            <p class="mt-1 text-sm text-gray-500">
                                {{ __('Setelah akun dihapus, semua data dan sumber daya akan dihapus secara permanen. Sebelum menghapus akun, silakan unduh data atau informasi apa pun yang ingin Anda simpan.') }}
                            </p>
                        </header>
                    
                        <x-danger-button
                            x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                            class="rounded-xl px-6 py-2.5"
                        >{{ __('Hapus Akun') }}</x-danger-button>
                    
                        <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                            <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                                @csrf
                                @method('delete')
                    
                                <h2 class="text-lg font-medium text-gray-900">
                                    {{ __('Apakah Anda yakin ingin menghapus akun Anda?') }}
                                </h2>
                    
                                <p class="mt-1 text-sm text-gray-600">
                                    {{ __('Setelah akun dihapus, semua data dan sumber daya akan dihapus secara permanen. Silakan masukkan password Anda untuk mengonfirmasi bahwa Anda ingin menghapus akun Anda secara permanen.') }}
                                </p>
                    
                                <div class="mt-6">
                                    <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />
                    
                                    <x-text-input
                                        id="password"
                                        name="password"
                                        type="password"
                                        class="mt-1 block w-3/4 rounded-xl"
                                        placeholder="{{ __('Password') }}"
                                    />
                    
                                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                                </div>
                    
                                <div class="mt-6 flex justify-end">
                                    <x-secondary-button x-on:click="$dispatch('close')" class="rounded-xl">
                                        {{ __('Batal') }}
                                    </x-secondary-button>
                    
                                    <x-danger-button class="ml-3 rounded-xl">
                                        {{ __('Hapus Akun') }}
                                    </x-danger-button>
                                </div>
                            </form>
                        </x-modal>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
