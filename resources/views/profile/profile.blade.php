<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="text-2xl font-bold tracking-wide text-[#07213D]">
                Profil Pengguna
            </h2>
            <p class="text-sm mt-1 text-[#07213D]/70">
                Informasi pribadi akun Anda
            </p>
            <div class="h-1 w-16 mt-3 rounded-full bg-gradient-to-r from-[#07213D] to-[#EEBF63]"></div>
        </div>
    </x-slot>

    <div class="py-16">
        <div class="max-w-3xl mx-auto px-6">

            <section class="rounded-3xl bg-white
                            border border-gray-100
                            shadow-xl
                            px-12 py-14 text-center">

                <!-- Avatar -->
                <div class="relative mx-auto w-fit group">
                    <div class="absolute inset-0 rounded-full 
                                bg-gradient-to-tr from-[#07213D] to-[#EEBF63] 
                                blur-md opacity-40 group-hover:opacity-60 transition"></div>

                    <div class="relative w-32 h-32 rounded-full 
                                bg-[#07213D] text-white
                                flex items-center justify-center
                                text-5xl font-semibold
                                ring-4 ring-white shadow-lg
                                transition duration-500 group-hover:scale-105">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                </div>

                <!-- Nama -->
                <h3 class="mt-8 text-3xl font-semibold text-[#07213D] tracking-wide">
                    {{ $user->name }}
                </h3>

                <!-- Email -->
                <div class="flex items-center justify-center gap-2 mt-4 text-gray-600">
                    <!-- Icon Email -->
                    <svg xmlns="http://www.w3.org/2000/svg" 
                         class="w-5 h-5 text-[#EEBF63]" 
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M21 8l-9 6-9-6m18 0v8a2 2 0 01-2 2H5a2 2 0 01-2-2V8m18 0L12 14 3 8"/>
                    </svg>
                    <span>{{ $user->email }}</span>
                </div>

                <!-- Role -->
                @if(isset($user->role))
                    <div class="mt-6">
                        <span class="inline-flex items-center gap-2 px-5 py-2 text-sm rounded-full 
                                     bg-[#EEBF63]/20 text-[#07213D] font-medium 
                                     border border-[#EEBF63]/30">

                            <!-- Icon Role -->
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                 class="w-4 h-4" 
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M9 12l2 2l4 -4m6 2a9 9 0 11-18 0a9 9 0 0118 0z"/>
                            </svg>

                            {{ ucfirst($user->role) }}
                        </span>
                    </div>
                @endif

                <!-- Divider -->
                <div class="my-10 h-px bg-gradient-to-r from-transparent via-gray-200 to-transparent"></div>

                <!-- Info Section -->
                <div class="space-y-6 text-left">

                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-2 text-gray-500 text-sm uppercase tracking-wide">
                            <!-- Calendar Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                 class="w-4 h-4 text-[#EEBF63]" 
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            Tanggal Bergabung
                        </div>

                        <span class="text-base font-semibold text-[#07213D]">
                            {{ $user->created_at->translatedFormat('d F Y') }}
                        </span>
                    </div>

                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-2 text-gray-500 text-sm uppercase tracking-wide">
                            <!-- Status Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                 class="w-4 h-4 text-green-600" 
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M9 12l2 2l4 -4m6 2a9 9 0 11-18 0a9 9 0 0118 0z"/>
                            </svg>
                            Status Akun
                        </div>

                        <span class="text-base font-semibold text-green-600">
                            Aktif
                        </span>
                    </div>

                </div>

            </section>

        </div>
    </div>
</x-app-layout>
