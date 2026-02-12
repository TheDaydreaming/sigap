<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#07213D] leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-[#E0E2E3] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- HERO KPI UTAMA -->
            <div class="bg-[#07213D] p-6 rounded-2xl shadow-lg text-[#E0E2E3]">
                <p class="text-sm opacity-80">Total Perangkat Terdaftar</p>
                <h3 class="text-4xl font-bold text-[#EEBF63] mt-1">
                    {{ \App\Models\Device::count() }}
                </h3>
            </div>

            <!-- MINI STATS (RINGKAS & BERGUNA) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-white p-4 rounded-xl shadow border-l-4 border-[#EEBF63]">
                    <p class="text-sm text-gray-500">Hari Ini</p>
                    <h3 class="text-xl font-bold text-[#07213D]">
                        {{ \App\Models\Device::whereDate('created_at', today())->count() }}
                    </h3>
                </div>

                <div class="bg-white p-4 rounded-xl shadow border-l-4 border-[#EEBF63]">
                    <p class="text-sm text-gray-500">7 Hari Terakhir</p>
                    <h3 class="text-xl font-bold text-[#07213D]">
                        {{ \App\Models\Device::where('created_at','>=', now()->subDays(7))->count() }}
                    </h3>
                </div>

                <div class="bg-white p-4 rounded-xl shadow border-l-4 border-[#EEBF63]">
                    <p class="text-sm text-gray-500">Total User</p>
                    <h3 class="text-xl font-bold text-[#07213D]">
                        {{ \App\Models\User::count() }}
                    </h3>
                </div>
            </div>

            <!-- BIG ACTION SHORTCUT -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <a href="{{ route('devices.create') }}" class="block group">
                    <div class="bg-white p-6 rounded-xl shadow border-l-4 border-[#EEBF63] 
                                hover:shadow-lg transition-all duration-200 hover:-translate-y-1">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-[#07213D] flex items-center justify-center text-[#EEBF63] text-xl">
                                ➕
                            </div>
                            <div>
                                <h3 class="font-bold text-lg text-[#07213D]">Input Data HP</h3>
                                <p class="text-gray-600 text-sm">Tambah perangkat baru</p>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="{{ route('devices.index') }}" class="block group">
                    <div class="bg-white p-6 rounded-xl shadow border-l-4 border-[#EEBF63]
                                hover:shadow-lg transition-all duration-200 hover:-translate-y-1">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-[#07213D] flex items-center justify-center text-[#EEBF63] text-xl">
                                📋
                            </div>
                            <div>
                                <h3 class="font-bold text-lg text-[#07213D]">Data HP</h3>
                                <p class="text-gray-600 text-sm">Kelola perangkat</p>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="{{ route('devices.index') }}" class="block group">
                    <div class="bg-white p-6 rounded-xl shadow border-l-4 border-[#EEBF63]
                                hover:shadow-lg transition-all duration-200 hover:-translate-y-1">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-[#07213D] flex items-center justify-center text-[#EEBF63] text-xl">
                                🔳
                            </div>
                            <div>
                                <h3 class="font-bold text-lg text-[#07213D]">Generate QR</h3>
                                <p class="text-gray-600 text-sm">Buat QR perangkat</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- RECENT ACTIVITY (MODERN LIST, BUKAN TABEL) -->
            <div class="bg-white p-6 rounded-xl shadow">
                <h3 class="font-bold text-[#07213D] mb-3">Aktivitas Terbaru</h3>

                <div class="space-y-3">
                    @foreach(\App\Models\Device::latest()->take(5)->get() as $d)
                    <div class="flex items-center justify-between p-3 bg-[#E0E2E3]/40 rounded-lg">
                        <div>
                            <p class="font-medium text-[#07213D]">{{ $d->nama_pemilik }}</p>
                            <p class="text-xs text-gray-600">{{ $d->merek_hp }} • {{ $d->imei }}</p>
                        </div>
                        <span class="text-xs text-gray-500">
                            {{ $d->created_at->diffForHumans() }}
                        </span>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
