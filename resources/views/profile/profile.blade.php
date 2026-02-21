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
                                <span class="font-mono text-[#EEBF63]">sigap-{{ str_pad($user->id, 3, '0', STR_PAD_LEFT) }}</span>
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
            <!-- Edit Profil -->
            <div class="bg-white shadow-xl sm:rounded-3xl border border-gray-100 overflow-hidden">
                <!-- Card Header -->
                <div class="bg-gradient-to-r from-[#07213D] to-[#0A2E52] px-6 sm:px-8 py-5 flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-[#EEBF63]/20 flex items-center justify-center flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#EEBF63]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-lg font-bold text-white">{{ __('Edit Profil') }}</h2>
                        <p class="text-xs text-gray-400 mt-0.5">{{ __("Update informasi profil akun dan alamat email Anda.") }}</p>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="p-6 sm:p-8">
                    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                        @csrf
                    </form>

                    <form method="post" action="{{ route('profile.update') }}" class="space-y-5" id="profile-form">
                        @csrf
                        @method('patch')

                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                            <!-- Nama -->
                            <div class="sm:col-span-2">
                                <x-input-label for="name" :value="__('Nama Lengkap')" class="text-[#07213D] font-semibold text-sm mb-1.5" />
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <x-text-input id="name" name="name" type="text" class="pl-10 block w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-[#EEBF63] focus:ring focus:ring-[#EEBF63]/20 transition-all" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                                </div>
                                <x-input-error class="mt-1.5" :messages="$errors->get('name')" />
                            </div>

                            <!-- Email -->
                            <div class="sm:col-span-2">
                                <x-input-label for="email" :value="__('Alamat Email')" class="text-[#07213D] font-semibold text-sm mb-1.5" />
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <x-text-input id="email" name="email" type="email" class="pl-10 block w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-[#EEBF63] focus:ring focus:ring-[#EEBF63]/20 transition-all" :value="old('email', $user->email)" required autocomplete="username" />
                                </div>
                                <x-input-error class="mt-1.5" :messages="$errors->get('email')" />

                                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                    <div class="mt-2 p-3 bg-amber-50 border border-amber-200 rounded-lg">
                                        <p class="text-sm text-amber-700 flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                            </svg>
                                            {{ __('Email belum diverifikasi.') }}
                                            <button form="send-verification" class="underline font-medium hover:text-amber-900">
                                                {{ __('Kirim ulang verifikasi') }}
                                            </button>
                                        </p>
                                        @if (session('status') === 'verification-link-sent')
                                            <p class="mt-1 text-sm text-green-600 font-medium">{{ __('Link verifikasi telah dikirim!') }}</p>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Footer Action -->
                        <div class="flex items-center justify-end pt-4 border-t border-gray-100">
                            <button type="submit"
                                class="inline-flex items-center gap-2 bg-gradient-to-r from-[#07213D] to-[#0A2E52] hover:from-[#0A2E52] hover:to-[#0d3b65] text-white font-semibold px-6 py-2.5 rounded-xl transition-all duration-200 shadow-md hover:shadow-lg active:scale-95">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                {{ __('Simpan Perubahan') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Update Password -->
            <div class="bg-white shadow-xl sm:rounded-3xl border border-gray-100 overflow-hidden">
                <!-- Card Header -->
                <div class="bg-gradient-to-r from-[#07213D] to-[#0A2E52] px-6 sm:px-8 py-5 flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-[#EEBF63]/20 flex items-center justify-center flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#EEBF63]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-lg font-bold text-white">{{ __('Update Password') }}</h2>
                        <p class="text-xs text-gray-400 mt-0.5">{{ __('Pastikan akun Anda menggunakan password yang kuat dan aman.') }}</p>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="p-6 sm:p-8">
                    <form method="post" action="{{ route('password.update') }}" class="space-y-5" id="password-form">
                        @csrf
                        @method('put')

                        <div>
                            <x-input-label for="update_password_current_password" :value="__('Password Saat Ini')" class="text-[#07213D] font-semibold text-sm mb-1.5" />
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <x-text-input id="update_password_current_password" name="current_password" type="password" class="pl-10 pr-10 block w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-[#EEBF63] focus:ring focus:ring-[#EEBF63]/20 transition-all" autocomplete="current-password" />
                                <button type="button" onclick="togglePassword('update_password_current_password', this)" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-[#07213D] transition-colors duration-200">
                                    <svg id="eye-icon-current" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-1.5" />
                        </div>

                        <div>
                            <x-input-label for="update_password_password" :value="__('Password Baru')" class="text-[#07213D] font-semibold text-sm mb-1.5" />
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                                    </svg>
                                </div>
                                <x-text-input id="update_password_password" name="password" type="password" class="pl-10 pr-10 block w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-[#EEBF63] focus:ring focus:ring-[#EEBF63]/20 transition-all" autocomplete="new-password" />
                                <button type="button" onclick="togglePassword('update_password_password', this)" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-[#07213D] transition-colors duration-200">
                                    <svg id="eye-icon-new" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-1.5" />
                        </div>

                        <div>
                            <x-input-label for="update_password_password_confirmation" :value="__('Konfirmasi Password Baru')" class="text-[#07213D] font-semibold text-sm mb-1.5" />
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                </div>
                                <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="pl-10 pr-10 block w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-[#EEBF63] focus:ring focus:ring-[#EEBF63]/20 transition-all" autocomplete="new-password" />
                                <button type="button" onclick="togglePassword('update_password_password_confirmation', this)" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-[#07213D] transition-colors duration-200">
                                    <svg id="eye-icon-confirm" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-1.5" />
                        </div>

                        <!-- Footer Action -->
                        <div class="flex items-center justify-end pt-4 border-t border-gray-100">
                            <button type="submit"
                                class="inline-flex items-center gap-2 bg-gradient-to-r from-[#07213D] to-[#0A2E52] hover:from-[#0A2E52] hover:to-[#0d3b65] text-white font-semibold px-6 py-2.5 rounded-xl transition-all duration-200 shadow-md hover:shadow-lg active:scale-95">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                {{ __('Simpan Password') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Delete User -->
            <div class="bg-white shadow-xl sm:rounded-3xl border border-red-100 overflow-hidden">
                <!-- Card Header -->
                <div class="bg-gradient-to-r from-red-600 to-red-700 px-6 sm:px-8 py-5 flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-lg font-bold text-white">{{ __('Hapus Akun') }}</h2>
                        <p class="text-xs text-red-200 mt-0.5">{{ __('Tindakan ini tidak dapat dibatalkan.') }}</p>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="p-6 sm:p-8">
                    <!-- Warning Box -->
                    <div class="flex gap-4 p-4 bg-red-50 border border-red-200 rounded-2xl mb-6">
                        <div class="flex-shrink-0 w-10 h-10 rounded-xl bg-red-100 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-red-700 mb-1">Perhatian!</p>
                            <p class="text-sm text-red-600">{{ __('Setelah akun dihapus, semua data dan sumber daya akan dihapus secara permanen. Sebelum menghapus akun, pastikan Anda sudah membackup data penting Anda.') }}</p>
                        </div>
                    </div>

                    <!-- Checklist -->
                    <ul class="space-y-2 mb-6">
                        @foreach([
                            'Semua data profil akan dihapus',
                            'Riwayat aktivitas tidak dapat dipulihkan',
                            'Akses ke sistem akan dicabut sepenuhnya',
                        ] as $item)
                        <li class="flex items-center gap-2 text-sm text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            {{ $item }}
                        </li>
                        @endforeach
                    </ul>

                    <div class="flex items-center justify-end pt-4 border-t border-red-100">
                        <button type="button" onclick="confirmDeleteStep1()"
                            class="inline-flex items-center gap-2 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold px-6 py-2.5 rounded-xl transition-all duration-200 shadow-md hover:shadow-lg active:scale-95">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            {{ __('Hapus Akun Saya') }}
                        </button>
                    </div>
                </div>
            </div>

            {{-- Modal Password untuk konfirmasi hapus akun --}}
            <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                <div class="overflow-hidden rounded-2xl">
                    {{-- Modal Header --}}
                    <div class="bg-gradient-to-r from-red-600 to-red-700 px-6 py-5 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-base font-bold text-white">Konfirmasi Penghapusan Akun</h2>
                            <p class="text-xs text-red-200 mt-0.5">Masukkan password untuk melanjutkan</p>
                        </div>
                    </div>

                    {{-- Modal Body --}}
                    <form method="post" action="{{ route('profile.destroy') }}" class="p-6 bg-white">
                        @csrf
                        @method('delete')

                        <p class="text-sm text-gray-600 mb-5">
                            Untuk memastikan ini bukan tindakan yang tidak disengaja, masukkan password akun Anda di bawah ini. Akun Anda akan <span class="font-semibold text-red-600">dihapus secara permanen</span>.
                        </p>

                        <div class="mb-5">
                            <label for="delete_password" class="block text-sm font-semibold text-gray-700 mb-1.5">Password Anda</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <x-text-input
                                    id="delete_password"
                                    name="password"
                                    type="password"
                                    class="pl-10 pr-10 block w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-red-400 focus:ring focus:ring-red-200 transition-all"
                                    placeholder="Masukkan password Anda"
                                    autofocus
                                />
                                <button type="button" onclick="togglePassword('delete_password', this)"
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-red-600 transition-colors duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-100">
                            <button type="button" x-on:click="$dispatch('close')"
                                class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl border border-gray-200 bg-white text-gray-700 font-semibold text-sm hover:bg-gray-50 transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Batal
                            </button>
                            <button type="submit"
                                class="inline-flex items-center gap-2 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold px-5 py-2.5 rounded-xl transition-all duration-200 shadow-md hover:shadow-lg active:scale-95 text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Ya, Hapus Akun Saya
                            </button>
                        </div>
                    </form>
                </div>
            </x-modal>
        </div>
    </div>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* Custom SweetAlert2 Theme */
        .swal-custom-popup {
            border-radius: 24px !important;
            padding: 0 !important;
            overflow: hidden !important;
            border: none !important;
            box-shadow: 0 25px 60px rgba(7, 33, 61, 0.25) !important;
            max-width: 400px !important;
        }
        .swal-custom-header {
            background: linear-gradient(135deg, #07213D 0%, #0A2E52 100%);
            padding: 32px 32px 24px;
            position: relative;
            overflow: hidden;
        }
        .swal-custom-header::before {
            content: '';
            position: absolute;
            top: -30px; right: -30px;
            width: 120px; height: 120px;
            background: rgba(238,191,99,0.15);
            border-radius: 50%;
        }
        .swal-custom-header::after {
            content: '';
            position: absolute;
            bottom: -20px; left: -20px;
            width: 80px; height: 80px;
            background: rgba(59,130,246,0.1);
            border-radius: 50%;
        }
        .swal-icon-ring {
            width: 72px; height: 72px;
            border-radius: 50%;
            background: rgba(238,191,99,0.15);
            border: 2px solid rgba(238,191,99,0.3);
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 16px;
            position: relative; z-index: 1;
            animation: pulse-ring 2s infinite;
        }
        @keyframes pulse-ring {
            0%, 100% { box-shadow: 0 0 0 0 rgba(238,191,99,0.3); }
            50% { box-shadow: 0 0 0 10px rgba(238,191,99,0); }
        }
        .swal-icon-svg { color: #EEBF63; }
        .swal-badge {
            display: inline-flex; align-items: center; gap: 6px;
            background: rgba(34,197,94,0.15);
            border: 1px solid rgba(34,197,94,0.3);
            color: #4ade80;
            font-size: 11px; font-weight: 700;
            letter-spacing: 0.05em; text-transform: uppercase;
            padding: 4px 12px; border-radius: 999px;
            margin-bottom: 10px;
        }
        .swal-badge-dot {
            width: 6px; height: 6px;
            background: #4ade80; border-radius: 50%;
            animation: blink 1s infinite;
        }
        @keyframes blink {
            0%, 100% { opacity: 1; } 50% { opacity: 0.3; }
        }
        .swal-custom-title {
            color: #ffffff;
            font-size: 20px; font-weight: 700;
            letter-spacing: -0.02em; margin: 0;
        }
        .swal-custom-body {
            padding: 24px 32px 28px;
            background: #ffffff;
        }
        .swal-custom-text {
            color: #6b7280;
            font-size: 14px; line-height: 1.6;
            margin: 0 0 20px;
        }
        .swal-custom-divider {
            height: 1px; background: #f3f4f6; margin: 0 0 20px;
        }
        .swal-custom-meta {
            display: flex; align-items: center; gap: 8px;
            background: #f9fafb; border: 1px solid #f3f4f6;
            border-radius: 12px; padding: 10px 14px;
            margin-bottom: 20px;
        }
        .swal-custom-meta-icon { color: #EEBF63; flex-shrink: 0; }
        .swal-custom-meta-text { font-size: 12px; color: #9ca3af; }
        .swal-custom-meta-text strong { color: #374151; display: block; font-size: 13px; }
        .swal-custom-btn {
            width: 100%;
            background: linear-gradient(135deg, #07213D 0%, #0A2E52 100%) !important;
            color: #ffffff !important;
            border: none !important;
            border-radius: 14px !important;
            padding: 13px 24px !important;
            font-size: 14px !important;
            font-weight: 600 !important;
            letter-spacing: 0.01em !important;
            cursor: pointer;
            transition: all 0.2s ease !important;
            box-shadow: 0 4px 15px rgba(7,33,61,0.3) !important;
        }
        .swal-custom-btn:hover {
            background: linear-gradient(135deg, #0A2E52 0%, #0d3b65 100%) !important;
            box-shadow: 0 6px 20px rgba(7,33,61,0.4) !important;
            transform: translateY(-1px);
        }
        .swal2-timer-progress-bar {
            background: linear-gradient(90deg, #EEBF63, #f5d07a) !important;
            height: 3px !important;
        }
        /* Delete confirmation buttons */
        .swal-delete-actions {
            display: flex !important;
            gap: 10px !important;
            padding: 0 32px 28px !important;
            justify-content: stretch !important;
        }
        .swal-delete-confirm-btn {
            flex: 1;
            background: linear-gradient(135deg, #dc2626, #b91c1c) !important;
            color: #fff !important;
            border: none !important;
            border-radius: 14px !important;
            padding: 13px 20px !important;
            font-size: 14px !important;
            font-weight: 600 !important;
            cursor: pointer !important;
            transition: all 0.2s !important;
            box-shadow: 0 4px 15px rgba(185,28,28,0.35) !important;
        }
        .swal-delete-confirm-btn:hover {
            background: linear-gradient(135deg, #b91c1c, #991b1b) !important;
            box-shadow: 0 6px 20px rgba(185,28,28,0.5) !important;
            transform: translateY(-1px) !important;
        }
        .swal-delete-cancel-btn {
            flex: 1;
            background: #fff !important;
            color: #374151 !important;
            border: 1.5px solid #e5e7eb !important;
            border-radius: 14px !important;
            padding: 13px 20px !important;
            font-size: 14px !important;
            font-weight: 600 !important;
            cursor: pointer !important;
            transition: all 0.2s !important;
        }
        .swal-delete-cancel-btn:hover {
            background: #f9fafb !important;
            border-color: #d1d5db !important;
        }
        /* Animations */
        .swal2-show { animation: swal-slide-in 0.4s cubic-bezier(0.34,1.56,0.64,1) !important; }
        .swal2-hide { animation: swal-slide-out 0.25s ease-in !important; }
        @keyframes swal-slide-in {
            from { opacity: 0; transform: scale(0.85) translateY(-20px); }
            to   { opacity: 1; transform: scale(1) translateY(0); }
        }
        @keyframes swal-slide-out {
            from { opacity: 1; transform: scale(1); }
            to   { opacity: 0; transform: scale(0.9) translateY(10px); }
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            @if (session('status') === 'profile-updated')
            Swal.fire({
                html: `
                    <div class="swal-custom-header">
                        <div class="swal-icon-ring">
                            <svg class="swal-icon-svg" width="32" height="32" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </div>
                        <div class="swal-badge">
                            <span class="swal-badge-dot"></span> Berhasil
                        </div>
                        <h2 class="swal-custom-title">Profil Diperbarui!</h2>
                    </div>
                    <div class="swal-custom-body">
                        <p class="swal-custom-text">Informasi profil Anda telah berhasil disimpan dan diperbarui.</p>
                        <div class="swal-custom-meta">
                            <svg class="swal-custom-meta-icon" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <div class="swal-custom-meta-text">
                                <strong>Tersimpan otomatis</strong>
                                Perubahan aktif sekarang
                            </div>
                        </div>
                        <button class="swal-custom-btn" onclick="Swal.close()">
                            Oke, Mengerti!
                        </button>
                    </div>`,
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                customClass: { popup: 'swal-custom-popup' },
                backdrop: 'rgba(7,33,61,0.4)',
            });
            @endif

            @if (session('status') === 'password-updated')
            Swal.fire({
                html: `
                    <div class="swal-custom-header">
                        <div class="swal-icon-ring">
                            <svg class="swal-icon-svg" width="32" height="32" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <div class="swal-badge">
                            <span class="swal-badge-dot"></span> Berhasil
                        </div>
                        <h2 class="swal-custom-title">Password Diperbarui!</h2>
                    </div>
                    <div class="swal-custom-body">
                        <p class="swal-custom-text">Password akun Anda telah berhasil diperbarui. Tetap jaga kerahasiaan password Anda.</p>
                        <div class="swal-custom-meta">
                            <svg class="swal-custom-meta-icon" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                            <div class="swal-custom-meta-text">
                                <strong>Keamanan Terjaga</strong>
                                Password baru aktif sekarang
                            </div>
                        </div>
                        <button class="swal-custom-btn" onclick="Swal.close()">
                            Oke, Mengerti!
                        </button>
                    </div>`,
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                customClass: { popup: 'swal-custom-popup' },
                backdrop: 'rgba(7,33,61,0.4)',
            });
            @endif

        });

        // Eye icon paths
        const eyeOpen = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>`;
        const eyeClosed = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>`;

        function togglePassword(inputId, btn) {
            const input = document.getElementById(inputId);
            const svg = btn.querySelector('svg');
            const isHidden = input.type === 'password';

            // Toggle input type
            input.type = isHidden ? 'text' : 'password';

            // Animate icon swap
            svg.style.transition = 'transform 0.15s ease, opacity 0.15s ease';
            svg.style.transform = 'scale(0)';
            svg.style.opacity = '0';

            setTimeout(() => {
                svg.innerHTML = isHidden ? eyeClosed : eyeOpen;
                svg.style.transform = 'scale(1)';
                svg.style.opacity = '1';
                // Change color when visible
                btn.style.color = isHidden ? '#07213D' : '';
            }, 150);
        }

        // Step 1: SweetAlert warning → Step 2: buka modal password
        function confirmDeleteStep1() {
            Swal.fire({
                html: `
                    <div style="background:linear-gradient(135deg,#dc2626,#b91c1c);padding:32px 32px 24px;position:relative;overflow:hidden;margin:-20px -20px 0;border-radius:0;">
                        <div style="position:absolute;top:-30px;right:-30px;width:120px;height:120px;background:rgba(255,255,255,0.07);border-radius:50%;"></div>
                        <div style="width:72px;height:72px;border-radius:50%;background:rgba(255,255,255,0.12);border:2px solid rgba(255,255,255,0.25);display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
                            <svg width="32" height="32" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        </div>
                        <div style="display:inline-flex;align-items:center;gap:6px;background:rgba(255,255,255,0.15);border:1px solid rgba(255,255,255,0.2);color:#fecaca;font-size:11px;font-weight:700;letter-spacing:0.05em;text-transform:uppercase;padding:4px 12px;border-radius:999px;margin-bottom:10px;">
                            <span style="width:6px;height:6px;background:#fca5a5;border-radius:50%;display:inline-block;"></span>
                            Tindakan Berbahaya
                        </div>
                        <h2 style="color:#fff;font-size:20px;font-weight:700;margin:0;">Hapus Akun?</h2>
                    </div>
                    <div style="padding:24px 8px 8px;">
                        <p style="color:#6b7280;font-size:14px;line-height:1.6;margin:0 0 16px;">Apakah Anda benar-benar ingin menghapus akun ini? Semua data Anda akan <strong style="color:#dc2626;">lenyap selamanya</strong> dan tidak dapat dipulihkan.</p>
                        <div style="background:#fef2f2;border:1px solid #fecaca;border-radius:12px;padding:12px 14px;margin-bottom:20px;display:flex;gap:10px;align-items:flex-start;">
                            <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#dc2626" stroke-width="2" style="flex-shrink:0;margin-top:1px;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span style="font-size:12px;color:#b91c1c;">Anda masih perlu memasukkan password untuk mengkonfirmasi tindakan ini.</span>
                        </div>
                    </div>`,
                showCancelButton: true,
                confirmButtonText: 'Ya, Lanjutkan →',
                cancelButtonText: 'Batal, Kembali',
                customClass: {
                    popup: 'swal-custom-popup',
                    confirmButton: 'swal-delete-confirm-btn',
                    cancelButton: 'swal-delete-cancel-btn',
                    actions: 'swal-delete-actions',
                },
                buttonsStyling: false,
                backdrop: 'rgba(185,28,28,0.35)',
                reverseButtons: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    // Buka modal Alpine.js untuk input password
                    window.dispatchEvent(new CustomEvent('open-modal', { detail: 'confirm-user-deletion' }));
                }
            });
        }
    </script>
</x-app-layout>
