<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800">
        Input Data Perangkat
    </h2>
</x-slot>

<div class="py-12 bg-gray-50">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white p-8 shadow-lg rounded-xl border border-gray-100">

            <h3 class="text-lg font-semibold text-gray-800 mb-2">
                Form Registrasi Perangkat
            </h3>
            <p class="text-gray-500 mb-6">
                Isi data perangkat dan pemilik dengan benar.
            </p>

            <form action="{{ route('devices.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Nama Pemilik -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Nama Pemilik
                        </label>
                        <input 
                            type="text" 
                            name="nama_pemilik" 
                            class="w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Masukkan nama pemilik"
                            required>
                    </div>

                    <!-- IMEI -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            IMEI
                        </label>
                        <input 
                            type="text" 
                            name="imei" 
                            class="w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Masukkan nomor IMEI"
                            required>
                    </div>

                    <!-- Merek HP -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Merek HP
                        </label>
                        <input 
                            type="text" 
                            name="merek_hp" 
                            class="w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Contoh: Samsung, Xiaomi, iPhone"
                            required>
                    </div>

                    <!-- Warna HP -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Warna HP
                        </label>
                        <input 
                            type="text" 
                            name="warna_hp" 
                            class="w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Contoh: Hitam, Biru, Putih"
                            required>
                    </div>

                    <!-- Foto Pemilik -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Foto Pemilik
                        </label>
                        <input 
                            type="file" 
                            name="foto_pemilik" 
                            class="w-full rounded-lg border border-gray-300 p-2"
                            accept="image/*"
                            required>
                        <p class="text-xs text-gray-400 mt-1">
                            Format: JPG, PNG. Maks 2MB.
                        </p>
                    </div>

                    <!-- Foto HP -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Foto HP
                        </label>
                        <input 
                            type="file" 
                            name="foto_hp" 
                            class="w-full rounded-lg border border-gray-300 p-2"
                            accept="image/*"
                            required>
                        <p class="text-xs text-gray-400 mt-1">
                            Format: JPG, PNG. Maks 2MB.
                        </p>
                    </div>

                </div>

                <!-- Tombol -->
                <div class="mt-8 flex justify-end">
                    <button 
                        type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg transition shadow">
                        Simpan Data
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
</x-app-layout>
