<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- KARTU SELAMAT DATANG -->
            <div class="bg-white p-6 mb-6 shadow-sm sm:rounded-lg">
                <h3 class="text-lg font-bold mb-2">
                    👋 Selamat Datang, {{ auth()->user()->name }}
                </h3>
                <p class="text-gray-600">
                    Gunakan menu di sebelah kiri untuk mengelola data perangkat.
                </p>
            </div>

            <!-- GRID MENU CEPAT -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <!-- CARD INPUT DATA -->
                <a href="{{ route('devices.create') }}">
                    <div class="bg-white p-6 shadow-sm sm:rounded-lg hover:bg-gray-50">
                        <h3 class="font-bold text-lg">📥 Input Data</h3>
                        <p class="text-gray-600">Tambah data pemilik dan perangkat baru.</p>
                    </div>
                </a>

                <!-- CARD LIHAT DATA -->
                <a href="{{ route('devices.index') }}">
                    <div class="bg-white p-6 shadow-sm sm:rounded-lg hover:bg-gray-50">
                        <h3 class="font-bold text-lg">📋 Lihat Data</h3>
                        <p class="text-gray-600">Lihat daftar seluruh data perangkat.</p>
                    </div>
                </a>

            </div>

            <!-- INFO TAMBAHAN (OPSIONAL) -->
            <div class="bg-white p-6 mt-6 shadow-sm sm:rounded-lg">
                <h3 class="font-bold mb-2">Status Sistem</h3>
                <ul class="text-gray-700 list-disc ml-5">
                    <li>Login: Aktif</li>
                    <li>Database: Terhubung</li>
                    <li>Modul Perangkat: Siap Digunakan</li>
                </ul>
            </div>

        </div>
    </div>
</x-app-layout>
