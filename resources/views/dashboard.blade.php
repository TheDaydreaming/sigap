<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard SIGAP') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- HERO / WELCOME CARD -->
            <div class="bg-indigo-600 text-white p-6 rounded-xl shadow">
                <h3 class="text-xl font-bold">
                    👋 Selamat Datang, {{ auth()->user()->name }}
                </h3>
                <p class="mt-1 text-indigo-100">
                    Sistem Identifikasi dan Pengawasan Handphone (SIGAP)
                </p>
            </div>

            <!-- STATISTIC GRID -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                <!-- TOTAL PERANGKAT -->
                <div class="bg-white p-5 rounded-xl shadow border-l-4 border-indigo-600">
                    <p class="text-sm text-gray-500">Total Perangkat</p>
                    <h3 class="text-2xl font-bold text-gray-800">
                        {{ \App\Models\Device::count() }}
                    </h3>
                </div>

                <!-- PERANGKAT HARI INI -->
                <div class="bg-white p-5 rounded-xl shadow border-l-4 border-green-500">
                    <p class="text-sm text-gray-500">Ditambahkan Hari Ini</p>
                    <h3 class="text-2xl font-bold text-gray-800">
                        {{ \App\Models\Device::whereDate('created_at', today())->count() }}
                    </h3>
                </div>

                <!-- TOTAL USER -->
                <div class="bg-white p-5 rounded-xl shadow border-l-4 border-yellow-500">
                    <p class="text-sm text-gray-500">Total User</p>
                    <h3 class="text-2xl font-bold text-gray-800">
                        {{ \App\Models\User::count() }}
                    </h3>
                </div>

            </div>

            <!-- QUICK MENU -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <a href="{{ route('devices.create') }}" class="block">
                    <div class="bg-white p-6 rounded-xl shadow hover:bg-gray-50 transition">
                        <h3 class="font-bold text-lg">📥 Input Perangkat</h3>
                        <p class="text-gray-600 text-sm">
                            Tambah data pemilik dan perangkat baru.
                        </p>
                    </div>
                </a>

                <a href="{{ route('devices.index') }}" class="block">
                    <div class="bg-white p-6 rounded-xl shadow hover:bg-gray-50 transition">
                        <h3 class="font-bold text-lg">📋 Data Perangkat</h3>
                        <p class="text-gray-600 text-sm">
                            Lihat dan kelola seluruh perangkat terdaftar.
                        </p>
                    </div>
                </a>

            </div>

            <!-- RECENT DEVICES (5 TERBARU) -->
            <div class="bg-white p-6 rounded-xl shadow">
                <h3 class="font-bold mb-3">Perangkat Terbaru</h3>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm border">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="p-2 border">Nama Pemilik</th>
                                <th class="p-2 border">IMEI</th>
                                <th class="p-2 border">Merek</th>
                                <th class="p-2 border">Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(\App\Models\Device::latest()->take(5)->get() as $d)
                            <tr>
                                <td class="p-2 border">{{ $d->nama_pemilik }}</td>
                                <td class="p-2 border">{{ $d->imei }}</td>
                                <td class="p-2 border">{{ $d->merek_hp }}</td>
                                <td class="p-2 border text-gray-600">
                                    {{ $d->created_at->diffForHumans() }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- STATUS SISTEM -->
            <div class="bg-white p-6 rounded-xl shadow">
                <h3 class="font-bold mb-2">Status Sistem</h3>
                <ul class="list-disc ml-5 text-gray-700">
                    <li>Login: Aktif</li>
                    <li>Database: Terhubung</li>
                    <li>Modul Perangkat: Berjalan</li>
                    <li>Waktu Server: {{ now()->format('H:i:s') }}</li>
                </ul>
            </div>

        </div>
    </div>
</x-app-layout>
