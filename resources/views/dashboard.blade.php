<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h2 class="font-bold text-2xl text-[#07213D] leading-tight">
                    {{ __('Dashboard Overview') }}
                </h2>
                <p class="text-gray-500 text-sm mt-1">Selamat datang kembali, {{ Auth::user()->name }}!</p>
            </div>
            <div class="hidden md:block">
                <span class="px-4 py-2 bg-white rounded-lg shadow-sm text-sm font-medium text-gray-600 border border-gray-100">
                    {{ now()->translatedFormat('l, d F Y') }}
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-[#E0E2E3] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- HERO KPI UTAMA -->
            <div class="relative overflow-hidden bg-gradient-to-br from-[#07213D] to-[#0A2E52] p-8 rounded-3xl shadow-xl text-[#E0E2E3]">
                <!-- Background Pattern -->
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-32 h-32 bg-[#EEBF63] rounded-full blur-3xl opacity-20"></div>
                <div class="absolute bottom-0 left-0 -mb-4 -ml-4 w-32 h-32 bg-blue-500 rounded-full blur-3xl opacity-20"></div>
                
                <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-6">
                    <div>
                        <div class="flex items-center gap-3 mb-2">
                            <div class="p-2 bg-white/10 rounded-lg backdrop-blur-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#EEBF63]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <span class="text-sm font-medium uppercase tracking-wider opacity-80 text-[#EEBF63]">Total Perangkat</span>
                        </div>
                        <h3 class="text-5xl font-extrabold text-white tracking-tight">
                            {{ \App\Models\Device::count() }}
                            <span class="text-2xl font-normal text-gray-400">Unit</span>
                        </h3>
                        <p class="mt-2 text-gray-400 text-sm max-w-md">
                            Total keseluruhan perangkat yang terdaftar dalam sistem SIGAP
                        </p>
                    </div>
                    
                    <div class="hidden md:block">
                         <!-- Decorative Chart/Graph could go here -->
                         <div class="bg-white/5 p-4 rounded-xl border border-white/10 backdrop-blur-sm">
                            <div class="text-center">
                                <span class="block text-xs text-gray-400 mb-1">Minggu Ini</span>
                                <span class="text-2xl font-bold text-[#EEBF63]">+{{ \App\Models\Device::where('created_at','>=', now()->subDays(7))->count() }}</span>
                            </div>
                         </div>
                    </div>
                </div>
            </div>

            <!-- MINI STATS GRID -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-start justify-between group hover:shadow-md transition-shadow">
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Input Hari Ini</p>
                        <h3 class="text-3xl font-bold text-[#07213D] group-hover:text-blue-900 transition-colors">
                            {{ \App\Models\Device::whereDate('created_at', today())->count() }}
                        </h3>
                    </div>
                    <div class="p-3 bg-blue-50 rounded-xl text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-start justify-between group hover:shadow-md transition-shadow">
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">7 Hari Terakhir</p>
                        <h3 class="text-3xl font-bold text-[#07213D] group-hover:text-blue-900 transition-colors">
                            {{ \App\Models\Device::where('created_at','>=', now()->subDays(7))->count() }}
                        </h3>
                    </div>
                    <div class="p-3 bg-indigo-50 rounded-xl text-indigo-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-start justify-between group hover:shadow-md transition-shadow">
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Total User</p>
                        <h3 class="text-3xl font-bold text-[#07213D] group-hover:text-blue-900 transition-colors">
                            {{ \App\Models\User::count() }}
                        </h3>
                    </div>
                    <div class="p-3 bg-amber-50 rounded-xl text-amber-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- QUICK ACTIONS -->
                <div class="lg:col-span-2 space-y-6">
                    <h3 class="font-bold text-xl text-[#07213D] flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#EEBF63]" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd" />
                        </svg>
                        Akses Cepat
                    </h3>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <!-- Action 1 -->
                        <a href="{{ route('devices.create') }}" class="group relative bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg hover:border-[#EEBF63]/50 transition-all duration-300">
                            <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition-opacity">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-[#07213D]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="w-12 h-12 rounded-xl bg-[#07213D] text-white flex items-center justify-center mb-4 shadow-lg shadow-blue-900/20 group-hover:scale-110 transition-transform">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </div>
                            <h4 class="font-bold text-lg text-[#07213D] group-hover:text-blue-700">Input Data</h4>
                            <p class="text-sm text-gray-500 mt-1">Tambah perangkat baru ke database</p>
                        </a>

                        <!-- Action 2 -->
                        <a href="{{ route('devices.index') }}" class="group relative bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg hover:border-[#EEBF63]/50 transition-all duration-300">
                            <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition-opacity">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-[#07213D]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                </svg>
                            </div>
                            <div class="w-12 h-12 rounded-xl bg-white border-2 border-[#07213D] text-[#07213D] flex items-center justify-center mb-4 group-hover:bg-[#07213D] group-hover:text-white transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                </svg>
                            </div>
                            <h4 class="font-bold text-lg text-[#07213D] group-hover:text-blue-700">Data Perangkat</h4>
                            <p class="text-sm text-gray-500 mt-1">Lihat dan kelola database</p>
                        </a>

                        <!-- Action 3 -->
                        <a href="{{ route('devices.qr.list') }}" class="group relative bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg hover:border-[#EEBF63]/50 transition-all duration-300">
                            <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition-opacity">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-[#07213D]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                                </svg>
                            </div>
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#EEBF63] to-amber-600 text-white flex items-center justify-center mb-4 shadow-lg shadow-amber-500/20 group-hover:scale-110 transition-transform">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                                </svg>
                            </div>
                            <h4 class="font-bold text-lg text-[#07213D] group-hover:text-amber-700">QR Generator</h4>
                            <p class="text-sm text-gray-500 mt-1">Buat QR code untuk aset</p>
                        </a>
                    </div>
                </div>

                <!-- RECENT ACTIVITY FEED -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="p-4 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                        <h3 class="font-bold text-[#07213D]">Aktivitas Terbaru</h3>
                        <a href="{{ route('devices.index') }}" class="text-xs font-semibold text-blue-600 hover:text-blue-800">Lihat Semua</a>
                    </div>
                    
                    <div class="p-4">
                        <div class="space-y-4">
                            @forelse(\App\Models\Device::latest()->take(5)->get() as $d)
                            <div class="flex items-start gap-3 relative pb-4 border-l-2 border-gray-200 last:border-0 pl-4 last:pb-0">
                                <div class="absolute -left-[9px] top-0 w-4 h-4 rounded-full bg-white border-2 border-[#07213D]"></div>
                                
                                <div class="flex-1">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="font-semibold text-sm text-[#07213D]">{{ $d->nama_pemilik }}</p>
                                            <p class="text-xs text-gray-500">{{ $d->merek_hp }} - {{ $d->imei }}</p>
                                        </div>
                                        <span class="text-[10px] font-medium bg-gray-100 text-gray-500 px-2 py-1 rounded-full whitespace-nowrap">
                                            {{ $d->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="text-center py-6 text-gray-400 text-sm">
                                Belum ada aktivitas perangkat.
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
